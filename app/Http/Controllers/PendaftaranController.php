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
            return redirect()->route('pendaftaran.status')->with('info', 'Anda sudah melakukan pendaftaran. Silakan cek status pendaftaran Anda.');
        }

        // ✅ 2. Validasi (updated field names to match blade)
        $validated = $request->validate([
            // Section 1 - Data Diri (✅ field names updated)
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|digits:10|unique:pendaftarans,nisn',
            'nik' => 'required|digits:16|unique:pendaftarans,nik',
            'no_kk' => 'required|digits:16',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'no_hp' => 'required|digits_between:10,15',              // ✅ Updated from no_hp_siswa
            'alamat_lengkap' => 'required|string|max:500',              // ✅ Updated from alamat_siswa
            'jurusan' => 'required|in:RPL,TKJ,DKV,BD,AK',
            'asal_sekolah' => 'required|string|max:255',
            
            // Section 2 - Orang Tua
            'nama_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|digits:16',
            'pekerjaan_ayah' => 'required|string|max:100',
            'pendidikan_ayah' => 'required|string|max:50',
            'no_hp_ayah' => 'required|digits_between:10,15',
            'alamat_ayah' => 'required|string|max:500',
            'nama_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|digits:16',
            'pekerjaan_ibu' => 'required|string|max:100',
            'pendidikan_ibu' => 'required|string|max:50',
            'no_hp_ibu' => 'required|digits_between:10,15',
            'alamat_ibu' => 'required|string|max:500',
            
            // Section 3 - Dokumen Upload
            'pas_foto' => 'required|image|mimes:jpeg,png|max:5120',
            'ijazah' => 'required|file|mimes:jpeg,png,pdf|max:5120',
            'skhun' => 'required|file|mimes:jpeg,png,pdf|max:5120',
            'akta_kelahiran' => 'required|file|mimes:jpeg,png,pdf|max:5120',
            'kartu_keluarga' => 'required|file|mimes:jpeg,png,pdf|max:5120',
            'ktp_orang_tua' => 'nullable|file|mimes:jpeg,png,pdf|max:5120',
            
            // Section 4 - Pembayaran
            'bank_transfer' => 'required|in:BRI,Mandiri',
            'tanggal_transfer' => 'required|date|before_or_equal:today',
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ], [
            // ✅ Custom messages lengkap untuk semua field
            // Data Diri Siswa
            'nama_lengkap.required' => 'Nama lengkap siswa wajib diisi.',
            'nama_lengkap.string' => 'Nama lengkap harus berupa teks.',
            'nama_lengkap.max' => 'Nama lengkap maksimal 255 karakter.',
            
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.digits' => 'NISN harus terdiri dari 10 digit angka.',
            'nisn.unique' => 'NISN sudah terdaftar dalam sistem.',
            
            'nik.required' => 'NIK siswa wajib diisi.',
            'nik.digits' => 'NIK harus terdiri dari 16 digit angka.',
            'nik.unique' => 'NIK sudah terdaftar dalam sistem.',
            
            'no_kk.required' => 'Nomor KK wajib diisi.',
            'no_kk.digits' => 'Nomor KK harus terdiri dari 16 digit angka.',
            
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tempat_lahir.string' => 'Tempat lahir harus berupa teks.',
            'tempat_lahir.max' => 'Tempat lahir maksimal 100 karakter.',
            
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'tanggal_lahir.before' => 'Tanggal lahir tidak boleh hari ini atau di masa depan.',
            
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki (L) atau Perempuan (P).',
            
            'agama.required' => 'Agama wajib dipilih.',
            'agama.in' => 'Agama yang dipilih tidak valid.',
            
            'no_hp.required' => 'Nomor HP siswa wajib diisi.',
            'no_hp.digits_between' => 'Nomor HP harus 10-15 digit angka.',
            
            'alamat_lengkap.required' => 'Alamat lengkap wajib diisi.',
            'alamat_lengkap.string' => 'Alamat lengkap harus berupa teks.',
            'alamat_lengkap.max' => 'Alamat lengkap maksimal 500 karakter.',
            
            'jurusan.required' => 'Program keahlian wajib dipilih.',
            'jurusan.in' => 'Program keahlian yang dipilih tidak valid.',
            
            'asal_sekolah.required' => 'Asal sekolah wajib diisi.',
            'asal_sekolah.string' => 'Asal sekolah harus berupa teks.',
            'asal_sekolah.max' => 'Asal sekolah maksimal 255 karakter.',
            
            // Data Orang Tua - Ayah
            'nama_ayah.required' => 'Nama ayah wajib diisi.',
            'nama_ayah.string' => 'Nama ayah harus berupa teks.',
            'nama_ayah.max' => 'Nama ayah maksimal 255 karakter.',
            
            'nik_ayah.required' => 'NIK ayah wajib diisi.',
            'nik_ayah.digits' => 'NIK ayah harus terdiri dari 16 digit angka.',
            
            'pekerjaan_ayah.required' => 'Pekerjaan ayah wajib diisi.',
            'pekerjaan_ayah.string' => 'Pekerjaan ayah harus berupa teks.',
            'pekerjaan_ayah.max' => 'Pekerjaan ayah maksimal 100 karakter.',
            
            'pendidikan_ayah.required' => 'Pendidikan terakhir ayah wajib dipilih.',
            'pendidikan_ayah.string' => 'Pendidikan ayah harus berupa teks.',
            'pendidikan_ayah.max' => 'Pendidikan ayah maksimal 50 karakter.',
            
            'no_hp_ayah.required' => 'Nomor HP ayah wajib diisi.',
            'no_hp_ayah.digits_between' => 'Nomor HP ayah harus 10-15 digit angka.',
            
            'alamat_ayah.required' => 'Alamat ayah wajib diisi.',
            'alamat_ayah.string' => 'Alamat ayah harus berupa teks.',
            'alamat_ayah.max' => 'Alamat ayah maksimal 500 karakter.',
            
            // Data Orang Tua - Ibu
            'nama_ibu.required' => 'Nama ibu wajib diisi.',
            'nama_ibu.string' => 'Nama ibu harus berupa teks.',
            'nama_ibu.max' => 'Nama ibu maksimal 255 karakter.',
            
            'nik_ibu.required' => 'NIK ibu wajib diisi.',
            'nik_ibu.digits' => 'NIK ibu harus terdiri dari 16 digit angka.',
            
            'pekerjaan_ibu.required' => 'Pekerjaan ibu wajib diisi.',
            'pekerjaan_ibu.string' => 'Pekerjaan ibu harus berupa teks.',
            'pekerjaan_ibu.max' => 'Pekerjaan ibu maksimal 100 karakter.',
            
            'pendidikan_ibu.required' => 'Pendidikan terakhir ibu wajib dipilih.',
            'pendidikan_ibu.string' => 'Pendidikan ibu harus berupa teks.',
            'pendidikan_ibu.max' => 'Pendidikan ibu maksimal 50 karakter.',
            
            'no_hp_ibu.required' => 'Nomor HP ibu wajib diisi.',
            'no_hp_ibu.digits_between' => 'Nomor HP ibu harus 10-15 digit angka.',
            
            'alamat_ibu.required' => 'Alamat ibu wajib diisi.',
            'alamat_ibu.string' => 'Alamat ibu harus berupa teks.',
            'alamat_ibu.max' => 'Alamat ibu maksimal 500 karakter.',
            
            // Dokumen Upload
            'pas_foto.required' => 'Pas foto wajib diupload.',
            'pas_foto.image' => 'Pas foto harus berupa file gambar.',
            'pas_foto.mimes' => 'Pas foto harus format JPG, PNG.',
            'pas_foto.max' => 'Pas foto maksimal 5MB.',
            
            'ijazah.required' => 'Scan ijazah wajib diupload.',
            'ijazah.file' => 'Ijazah harus berupa file.',
            'ijazah.mimes' => 'Ijazah harus format JPG, PNG, atau PDF.',
            'ijazah.max' => 'Ijazah maksimal 5MB.',
            
            'skhun.required' => 'Scan SKHUN wajib diupload.',
            'skhun.file' => 'SKHUN harus berupa file.',
            'skhun.mimes' => 'SKHUN harus format JPG, PNG, atau PDF.',
            'skhun.max' => 'SKHUN maksimal 5MB.',
            
            'akta_kelahiran.required' => 'Scan akta kelahiran wajib diupload.',
            'akta_kelahiran.file' => 'Akta kelahiran harus berupa file.',
            'akta_kelahiran.mimes' => 'Akta kelahiran harus format JPG, PNG, atau PDF.',
            'akta_kelahiran.max' => 'Akta kelahiran maksimal 5MB.',
            
            'kartu_keluarga.required' => 'Scan kartu keluarga wajib diupload.',
            'kartu_keluarga.file' => 'Kartu keluarga harus berupa file.',
            'kartu_keluarga.mimes' => 'Kartu keluarga harus format JPG, PNG, atau PDF.',
            'kartu_keluarga.max' => 'Kartu keluarga maksimal 5MB.',
            
            'ktp_orang_tua.file' => 'KTP orang tua harus berupa file.',
            'ktp_orang_tua.mimes' => 'KTP orang tua harus format JPG, PNG, atau PDF.',
            'ktp_orang_tua.max' => 'KTP orang tua maksimal 5MB.',
            
            // Pembayaran
            'bank_transfer.required' => 'Bank tujuan transfer wajib dipilih.',
            'bank_transfer.in' => 'Bank yang dipilih tidak valid.',
            
            'tanggal_transfer.required' => 'Tanggal transfer wajib diisi.',
            'tanggal_transfer.date' => 'Format tanggal transfer tidak valid.',
            'tanggal_transfer.before_or_equal' => 'Tanggal transfer tidak boleh di masa depan.',
            
            'bukti_transfer.required' => 'Bukti transfer wajib diupload.',
            'bukti_transfer.image' => 'Bukti transfer harus berupa gambar.',
            'bukti_transfer.mimes' => 'Bukti transfer harus format JPG, PNG.',
            'bukti_transfer.max' => 'Bukti transfer maksimal 5MB.',
        ]);

        DB::beginTransaction();

        try {
            // ✅ 3. Upload file & simpan path untuk tabel dokumen
            $fileUploads = [];
            $uploadMap = [
                'pas_foto' => 'pas_foto',
                'ijazah' => 'ijazah', 
                'skhun' => 'skhun',
                'akta_kelahiran' => 'akta_kelahiran',
                'kartu_keluarga' => 'kartu_keluarga',
                'ktp_orang_tua' => 'ktp_orang_tua',
                'bukti_transfer' => 'bukti_transfer',
            ];

            foreach ($uploadMap as $inputName => $jenisDokumen) {
                if ($request->hasFile($inputName)) {
                    $file = $request->file($inputName);
                    $filename = time() . '_' . bin2hex(random_bytes(4)) . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('pendaftaran/' . date('Y/m'), $filename, 'public');
                    
                    $fileUploads[] = [
                        'jenis_dokumen' => $jenisDokumen,
                        'file_path' => $path,
                    ];
                }
            }

            // ✅ 4. Generate nomor pendaftaran unik
            $lastPendaftaran = Pendaftaran::orderBy('id', 'desc')->first();
            $nextNumber = $lastPendaftaran ? intval(substr($lastPendaftaran->nomor_pendaftaran, -6)) + 1 : 1;
            $nomorPendaftaran = 'BPM-' . date('Y') . '-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

            // ✅ 5. Simpan DATA SISWA ke tabel pendaftarans (hanya field yang ada di tabel)
            $pendaftaran = Pendaftaran::create([
                'user_id' => auth()->id(),
                'nama_lengkap' => $validated['nama_lengkap'],
                'nisn' => $validated['nisn'],
                'nik' => $validated['nik'],
                'no_kk' => $validated['no_kk'],
                'tempat_lahir' => $validated['tempat_lahir'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'agama' => $validated['agama'],
                'no_hp' => $validated['no_hp'],              // ✅ Updated
                'alamat_lengkap' => $validated['alamat_lengkap'], // ✅ Updated
                'jurusan' => $validated['jurusan'],
                'asal_sekolah' => $validated['asal_sekolah'],
                'nomor_pendaftaran' => $nomorPendaftaran,
                'status_pendaftaran' => 'submit',            // ✅ Match enum di DB
                'submitted_at' => now(),
            ]);

            // ✅ 6. Simpan DATA ORANG TUA ke tabel orang_tua via relasi
            $pendaftaran->orangTua()->create([
                'nama_ayah' => $validated['nama_ayah'],
                'nik_ayah' => $validated['nik_ayah'],
                'pendidikan_ayah' => $validated['pendidikan_ayah'],
                'pekerjaan_ayah' => $validated['pekerjaan_ayah'],
                'no_hp_ayah' => $validated['no_hp_ayah'],
                'alamat_ayah' => $validated['alamat_ayah'],
                'nama_ibu' => $validated['nama_ibu'],
                'nik_ibu' => $validated['nik_ibu'],
                'pendidikan_ibu' => $validated['pendidikan_ibu'],
                'pekerjaan_ibu' => $validated['pekerjaan_ibu'],
                'no_hp_ibu' => $validated['no_hp_ibu'],
                'alamat_ibu' => $validated['alamat_ibu'],
            ]);

            // ✅ 7. Simpan DATA WALI (jika diisi) ke tabel wali via relasi
            if (!empty($request->input('nama_wali'))) {
                $pendaftaran->wali()->create([
                    'nama_wali' => $request->input('nama_wali'),
                    'pekerjaan_wali' => $request->input('pekerjaan_wali'),
                    'no_hp_wali' => $request->input('no_hp_wali'),
                    'hubungan_wali' => $request->input('hubungan_wali'),
                    'alamat_wali' => $request->input('alamat_wali'),
                ]);
            }

            // ✅ 8. Simpan DOKUMEN ke tabel dokumen via relasi
            foreach ($fileUploads as $doc) {
                $pendaftaran->dokumens()->create([
                    'jenis_dokumen' => $doc['jenis_dokumen'],
                    'file_path' => $doc['file_path'],
                    'status_dokumen' => 'pending',
                ]);
            }

            // ✅ 9. Simpan PEMBAYARAN ke tabel pembayarans via relasi
            $buktiTransferPath = collect($fileUploads)->firstWhere('jenis_dokumen', 'bukti_transfer')['file_path'] ?? null;
            
            $pendaftaran->pembayaran()->create([
                'bank_transfer' => $validated['bank_transfer'],
                'tanggal_transfer' => $validated['tanggal_transfer'],
                'bukti_pembayaran_path' => $buktiTransferPath,
                'status_pembayaran' => 'pending',
                'tanggal_upload' => now(),
            ]);

            DB::commit();

            // ✅ 10. Redirect sukses
            return redirect()->route('pendaftaran.status')
                ->with('success', '🎉 Pendaftaran berhasil! Nomor pendaftaran Anda: <strong>' . $nomorPendaftaran . '</strong><br>Silakan simpan nomor ini untuk cek status kelulusan.');

        } catch (\Exception $e) {
            DB::rollback();
            
            // Cleanup file jika gagal
            foreach ($fileUploads as $doc) {
                if (!empty($doc['file_path']) && Storage::disk('public')->exists($doc['file_path'])) {
                    Storage::disk('public')->delete($doc['file_path']);
                }
            }
            
            // Log error untuk debugging
            Log::error('Pendaftaran Failed', [
                'user_id' => auth()->id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            
            return back()->with('error', 'Gagal menyimpan pendaftaran: ' . $e->getMessage())->withInput();
        }
    }

    public function status()
    {
        $pendaftaran = Pendaftaran::with(['orangTua', 'wali', 'dokumens', 'pembayaran'])
            ->where('user_id', auth()->id())
            ->first();
        
        if (!$pendaftaran) {
            return redirect('/dashboard')->with('info', 'Anda belum melakukan pendaftaran.');
        }

        return view('dashboard.status_saya', compact('pendaftaran'));
    }

    public function create()
    {
        if (Pendaftaran::where('user_id', auth()->id())->exists()) {
            return redirect()->route('pendaftaran.status');
        }
        return view('dashboard.siswa');
    }
}