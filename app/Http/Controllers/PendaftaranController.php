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
            
            // Section 3 - Dokumen Upload
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
            // ========================================
            //  SECTION 1: DATA DIRI SISWA
            // ========================================
            'nama_lengkap.required' => 'Nama lengkap wajib diisi sesuai ijazah.',
            'nama_lengkap.max' => 'Nama lengkap terlalu panjang (maksimal 255 karakter).',
            
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.digits' => 'NISN harus terdiri dari 10 digit angka.',
            'nisn.unique' => 'NISN ini sudah terdaftar. Silakan periksa kembali.',
            
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus terdiri dari 16 digit angka.',
            'nik.unique' => 'NIK ini sudah terdaftar.',
            
            'no_kk.required' => 'Nomor KK wajib diisi.',
            'no_kk.digits' => 'Nomor KK harus terdiri dari 16 digit angka.',
            
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'tanggal_lahir.before' => 'Tanggal lahir tidak boleh di masa depan.',
            
            'jenis_kelamin.required' => 'Pilih jenis kelamin terlebih dahulu.',
            'jenis_kelamin.in' => 'Pilihan jenis kelamin tidak valid.',
            
            'agama.required' => 'Pilih agama terlebih dahulu.',
            'agama.in' => 'Pilihan agama tidak valid.',
            
            'no_hp_siswa.required' => 'Nomor HP wajib diisi.',
            'no_hp_siswa.regex' => 'Format nomor HP tidak valid (contoh: 081234567890).',
            
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            
            'alamat_siswa.required' => 'Alamat lengkap wajib diisi.',
            'alamat_siswa.max' => 'Alamat terlalu panjang (maksimal 500 karakter).',
            
            'jurusan.required' => 'Pilih program keahlian terlebih dahulu.',
            'jurusan.in' => 'Pilihan program keahlian tidak valid.',
            
            'asal_sekolah.required' => 'Asal sekolah wajib diisi.',

            // ========================================
            // ✅ SECTION 2: DATA ORANG TUA
            // ========================================
            'nama_ayah.required' => 'Nama ayah wajib diisi.',
            'nik_ayah.required' => 'NIK ayah wajib diisi.',
            'nik_ayah.digits' => 'NIK ayah harus 16 digit angka.',
            'pekerjaan_ayah.required' => 'Pekerjaan ayah wajib diisi.',
            'pendidikan_ayah.required' => 'Pendidikan ayah wajib dipilih.',
            'no_hp_ayah.required' => 'Nomor HP ayah wajib diisi.',
            'no_hp_ayah.regex' => 'Format nomor HP ayah tidak valid.',
            'alamat_ayah.required' => 'Alamat ayah wajib diisi.',
            
            'nama_ibu.required' => 'Nama ibu wajib diisi.',
            'nik_ibu.required' => 'NIK ibu wajib diisi.',
            'nik_ibu.digits' => 'NIK ibu harus 16 digit angka.',
            'pekerjaan_ibu.required' => 'Pekerjaan ibu wajib diisi.',
            'pendidikan_ibu.required' => 'Pendidikan ibu wajib dipilih.',
            'no_hp_ibu.required' => 'Nomor HP ibu wajib diisi.',
            'no_hp_ibu.regex' => 'Format nomor HP ibu tidak valid.',
            'alamat_ibu.required' => 'Alamat ibu wajib diisi.',

            // ========================================
            // ✅ SECTION 3: DOKUMEN UPLOAD
            // ========================================
            'pas_foto.required' => 'Pas foto wajib diupload.',
            'pas_foto.image' => 'File pas foto harus berupa gambar.',
            'pas_foto.mimes' => 'Format pas foto harus JPG atau PNG.',
            'pas_foto.max' => 'Ukuran pas foto maksimal 2MB.',
            
            'ijazah.required' => 'File ijazah wajib diupload.',
            'ijazah.file' => 'File ijazah tidak valid.',
            'ijazah.mimes' => 'Format ijazah harus JPG, PNG, atau PDF.',
            'ijazah.max' => 'Ukuran ijazah maksimal 2MB.',
            
            'skhun.required' => 'File SKHUN wajib diupload.',
            'skhun.file' => 'File SKHUN tidak valid.',
            'skhun.mimes' => 'Format SKHUN harus JPG, PNG, atau PDF.',
            'skhun.max' => 'Ukuran SKHUN maksimal 2MB.',
            
            'akta_kelahiran.required' => 'File akta kelahiran wajib diupload.',
            'akta_kelahiran.file' => 'File akta tidak valid.',
            'akta_kelahiran.mimes' => 'Format akta harus JPG, PNG, atau PDF.',
            'akta_kelahiran.max' => 'Ukuran akta maksimal 2MB.',
            
            'kartu_keluarga.required' => 'File KK wajib diupload.',
            'kartu_keluarga.file' => 'File KK tidak valid.',
            'kartu_keluarga.mimes' => 'Format KK harus JPG, PNG, atau PDF.',
            'kartu_keluarga.max' => 'Ukuran KK maksimal 2MB.',
            
            'ktp_orang_tua.file' => 'File KTP orang tua tidak valid.',
            'ktp_orang_tua.mimes' => 'Format KTP harus JPG, PNG, atau PDF.',
            'ktp_orang_tua.max' => 'Ukuran KTP maksimal 2MB.',

            // ========================================
            // ✅ SECTION 4: PEMBAYARAN
            // ========================================
            'bank_transfer.required' => 'Pilih bank tujuan transfer.',
            'bank_transfer.in' => 'Pilih bank yang tersedia (BRI atau Mandiri).',
            
            'tanggal_transfer.required' => 'Tanggal transfer wajib diisi.',
            'tanggal_transfer.date' => 'Format tanggal tidak valid.',
            'tanggal_transfer.before_or_equal' => 'Tanggal transfer tidak boleh lebih dari hari ini.',
            
            'bukti_transfer.required' => 'Bukti transfer wajib diupload.',
            'bukti_transfer.image' => 'Bukti transfer harus berupa gambar.',
            'bukti_transfer.mimes' => 'Format bukti transfer harus JPG atau PNG.',
            'bukti_transfer.max' => 'Ukuran bukti transfer maksimal 2MB.',
        ]);

        DB::beginTransaction();

        try {
            //  3. Proses upload file
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

            //  Generate nomor pendaftaran unik
            $nomorPendaftaran = 'BPM-' . date('Y') . '-' . str_pad(Pendaftaran::count() + 1, 6, '0', STR_PAD_LEFT);

            //  Simpan ke database
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

            //  Redirect sukses (pakai route name)
            return redirect()->route('pendaftaran.status')->with('success', 'Pendaftaran berhasil! Nomor: ' . $nomorPendaftaran);

        } catch (\Exception $e) {
            DB::rollback();
            
            //  Cleanup file jika gagal
            foreach ($filePaths as $path) {
                if ($path && Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
            
            //  Log error
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

        // View path sesuai lokasi file kamu
        return view('dashboard.status_pendaftaran', compact('pendaftaran'));
    }

    public function create()
    {
        // Cek sudah submit, redirect ke status
        if (Pendaftaran::where('user_id', auth()->id())->exists()) {
            return redirect()->route('pendaftaran.status');
        }
        return view('dashboard.siswa');
    }
}