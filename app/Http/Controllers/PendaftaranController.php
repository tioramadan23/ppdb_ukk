<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    public function create()
    {
        return view('pendaftaran');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        // Simpan pendaftaran
        $pendaftaran = $user->pendaftaran()->create($request->only([
            'nama_lengkap', 'nisn', 'nik', 'no_kk', 'tempat_lahir', 'tanggal_lahir',
            'jenis_kelamin', 'agama', 'kewarganegaraan', 'berkebutuhan_khusus',
            'alamat_lengkap', 'asal_sekolah', 'jurusan', 'foto_siswa'
        ]));

        // Simpan data orang tua
        $pendaftaran->orangTua()->create($request->only([
            'nama_ayah', 'nik_ayah', 'pendidikan_ayah', 'pekerjaan_ayah', 'no_hp_ayah',
            'nama_ibu', 'nik_ibu', 'pendidikan_ibu', 'pekerjaan_ibu', 'no_hp_ibu'
        ]));

        return redirect()->back()->with('success', 'Data pendaftaran berhasil disimpan!');
    }
}
