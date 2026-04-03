<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    public function store(Request $request)
    {
        // ✅ 1. Cek apakah sudah submit sebelumnya
        if (Pendaftaran::where('user_id', auth()->id())->exists()) {
            return redirect()->route('pendaftaran.status')->with('error', 'Anda sudah melakukan pendaftaran.');
        }

        // ✅ 2. Validasi lengkap semua section + file
        $validated = $request->validate([
            // Section 1 - Data Diri
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|digits:10|unique:pendaftarans,nisn',
            'nik' => 'required|digits:16|unique:pendaftarans,nik',
            'no_kk' => 'required|digits:16',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'no_hp_siswa' => 'required|regex:/^08[0-9]{8,11}$/',
            'email' => 'required|email',
            'alamat_siswa' => 'required|string|max:500',
            'jurusan' => 'required|in:RPL,TKJ,DKV,BD,AK',
            'asal_sekolah' => 'required|string|max:255',
            
            // Section 2 - Orang Tua
            'nama_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|digits:16',
            'pekerjaan_ayah' => 'required|string|max:100',
            'pendidikan_ayah' => 'required|string|max:50',
            'no_hp_ayah' => 'required|regex:/^08[0-9]{8,11}$/',
            'alamat_ayah' => 'required|string|max:500',
            'nama_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|digits:16',
            'pekerjaan_ibu' => 'required|string|max:100',
            'pendidikan_ibu' => 'required|string|max:50',
            'no_hp_ibu' => 'required|regex:/^08[0-9]{8,11}$/',
            'alamat_ibu' => 'required|string|max:500',
            
            // Section 3 - File Upload
            'pas_foto' => 'required|image|mimes:jpeg,png|max:2048',
            'ijazah' => 'required|file|mimes:jpeg,png,pdf|max:2048',
            'skhun' => 'required|file|mimes:jpeg,png,pdf|max:2048',
            'akta_kelahiran' => 'required|file|mimes:jpeg,png,pdf|max:2048',
            'kartu_keluarga' => 'required|file|mimes:jpeg,png,pdf|max:2048',
            'ktp_orang_tua' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            
            // Section 4 - Pembayaran
            'bank_transfer' => 'required|in:BRI,Mandiri',
            'tanggal_transfer' => 'required|date|before_or_equal:today',
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nisn.unique' => 'NISN sudah terdaftar.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'pas_foto.image' => 'Pas foto harus berupa gambar.',
        ]);

        DB::beginTransaction();

        try {
            // ✅ 3. Proses upload file
            $uploadFields = [
                'pas_foto' => 'pas_foto_path',
                'ijazah' => 'ijazah_path',
                'skhun' => 'skhun_path',
                'akta_kelahiran' => 'akta_path',
                'kartu_keluarga' => 'kk_path',
                'ktp_orang_tua' => 'ktp_path',
                'bukti_transfer' => 'bukti_transfer_path',
            ];

            $filePaths = [];
            foreach ($uploadFields as $input => $column) {
                if ($request->hasFile($input)) {
                    $file = $request->file($input);
                    $filename = time() . '_' . bin2hex(random_bytes(4)) . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('pendaftaran/' . date('Y/m'), $filename, 'public');
                    $filePaths[$column] = $path;
                }
            }

            // ✅ 4. Generate nomor pendaftaran unik
            $nomorPendaftaran = 'BPM-' . date('Y') . '-' . str_pad(Pendaftaran::count() + 1, 6, '0', STR_PAD_LEFT);

            // ✅ 5. Simpan ke database
            $pendaftaran = Pendaftaran::create([
                'user_id' => auth()->id(),
                // Data Diri
                'nama_lengkap' => $validated['nama_lengkap'],
                'nisn' => $validated['nisn'],
                'nik' => $validated['nik'],
                'no_kk' => $validated['no_kk'],
                'tempat_lahir' => $validated['tempat_lahir'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'agama' => $validated['agama'],
                'no_hp' => $validated['no_hp_siswa'],
                'email' => $validated['email'],
                'alamat_lengkap' => $validated['alamat_siswa'],
                'jurusan' => $validated['jurusan'],
                'asal_sekolah' => $validated['asal_sekolah'],
                // Orang Tua
                'nama_ayah' => $validated['nama_ayah'],
                'nik_ayah' => $validated['nik_ayah'],
                'pekerjaan_ayah' => $validated['pekerjaan_ayah'],
                'pendidikan_ayah' => $validated['pendidikan_ayah'],
                'no_hp_ayah' => $validated['no_hp_ayah'],
                'alamat_ayah' => $validated['alamat_ayah'],
                'nama_ibu' => $validated['nama_ibu'],
                'nik_ibu' => $validated['nik_ibu'],
                'pekerjaan_ibu' => $validated['pekerjaan_ibu'],
                'pendidikan_ibu' => $validated['pendidikan_ibu'],
                'no_hp_ibu' => $validated['no_hp_ibu'],
                'alamat_ibu' => $validated['alamat_ibu'],
                // File Paths
                ...$filePaths,
                // Pembayaran
                'bank_transfer' => $validated['bank_transfer'],
                'tanggal_transfer' => $validated['tanggal_transfer'],
                // Metadata
                'nomor_pendaftaran' => $nomorPendaftaran,
                'status_pendaftaran' => 'pending',
                'submitted_at' => now(),
            ]);

            DB::commit();

            // ✅ 6. Redirect sukses (pakai route name)
            return redirect()->route('pendaftaran.status')->with('success', 'Pendaftaran berhasil! Nomor: ' . $nomorPendaftaran);

        } catch (\Exception $e) {
            DB::rollback();
            
            // ✅ 7. Cleanup file jika gagal
            foreach ($filePaths as $path) {
                if ($path && Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
            
            // ✅ 8. Log error
            Log::error('Pendaftaran Failed', [
                'user_id' => auth()->id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->with('error', 'Gagal menyimpan pendaftaran. Silakan coba lagi.')->withInput();
        }
    }

    public function status()
    {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->first();
        
        if (!$pendaftaran) {
            return redirect('/dashboard')->with('info', 'Anda belum melakukan pendaftaran.');
        }

        // ✅ View path sesuai lokasi file kamu
        return view('dashboard.status_pendaftaran', compact('pendaftaran'));
    }

    public function create()
    {
        // ✅ Cek sudah submit, redirect ke status
        if (Pendaftaran::where('user_id', auth()->id())->exists()) {
            return redirect()->route('pendaftaran.status');
        }
        return view('dashboard.siswa');
    }
}