<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function create(Request $request)
    {
        // ambil data dari session
        $data = session('pendaftaran');

        return view('pendaftaran', compact('data'));
    }

    public function store(Request $request)
    {
        // validasi sederhana
        $request->validate([
            'nama_lengkap' => 'required',
            'nisn' => 'required',
            'nik' => 'required',
        ]);

        // simpan ke session
        session([
            'pendaftaran' => $request->all()
        ]);

        return redirect()->back()->with('success','Data berhasil disimpan sementara!');
    }
}