<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Status Pendaftaran</title>
</head>
<body>
    <h1>Status Pendaftaran</h1>
    <p>Selamat datang, {{ auth()->user()->name }}</p>
    <h2>Status Pendaftaran</h2>

    @extends('layouts.app') 

    @section('content')
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            
            <!-- Header -->
            <div class="bg-gradient-to-r from-primary-800 to-primary-600 p-6 text-white text-center">
                <i class="fas fa-clipboard-check text-4xl mb-3"></i>
                <h1 class="text-2xl font-bold">Status Pendaftaran</h1>
                <p class="opacity-90">SMK BPM - Tahun Ajaran 2026/2027</p>
            </div>

            <!-- Content -->
            <div class="p-8">
                @if(session('success'))
                    <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-r mb-6">
                        <p class="text-green-700 font-medium">
                            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                        </p>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r mb-6">
                        <p class="text-red-700 font-medium">
                            <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                        </p>
                    </div>
                @endif

                @if(isset($pendaftaran) && $pendaftaran)
                    <!-- Data Ditemukan -->
                    <div class="space-y-4">
                        <div class="bg-primary-50 rounded-lg p-4 text-center">
                            <p class="text-sm text-primary-700">Nomor Pendaftaran</p>
                            <p class="text-2xl font-bold text-primary-800">{{ $pendaftaran->nomor_pendaftaran ?? '-' }}</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="text-gray-500">Nama</span>
                                <p class="font-medium">{{ $pendaftaran->nama_lengkap }}</p>
                            </div>
                            <div>
                                <span class="text-gray-500">NISN</span>
                                <p class="font-medium">{{ $pendaftaran->nisn }}</p>
                            </div>
                            <div>
                                <span class="text-gray-500">Jurusan</span>
                                <p class="font-medium">{{ $pendaftaran->jurusan }}</p>
                            </div>
                            <div>
                                <span class="text-gray-500">Status</span>
                                <p class="font-medium">
                                    @if($pendaftaran->status_pendaftaran == 'draft')
                                        <span class="text-yellow-600">📝 Draft</span>
                                    @elseif($pendaftaran->status_pendaftaran == 'submit')
                                        <span class="text-blue-600">⏳ Menunggu Verifikasi</span>
                                    @elseif($pendaftaran->status_pendaftaran == 'diverifikasi')
                                        <span class="text-green-600">✅ Diverifikasi</span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        @if($pendaftaran->status_hasil)
                            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                                <p class="font-medium text-yellow-800">
                                    <i class="fas fa-bell mr-2"></i>Pengumuman:
                                    {{ $pendaftaran->status_hasil == 'diterima' ? '✅ Diterima' : '❌ Tidak Diterima' }}
                                </p>
                                @if($pendaftaran->keterangan_hasil)
                                    <p class="text-sm text-yellow-700 mt-1">{{ $pendaftaran->keterangan_hasil }}</p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="mt-8 flex gap-3">
                        <a href="{{ route('home') }}" class="flex-1 text-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                            <i class="fas fa-home mr-1"></i> Home
                        </a>
                        @if($pendaftaran->status_pendaftaran == 'draft')
                            <a href="{{ route('pendaftaran.edit', $pendaftaran->id) }}" class="flex-1 text-center px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition">
                                <i class="fas fa-edit mr-1"></i> Lanjutkan
                            </a>
                        @endif
                    </div>

                @else
                    <!-- Data Tidak Ditemukan -->
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-search text-gray-400 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Belum Ada Pendaftaran</h3>
                        <p class="text-gray-600 mb-6">Anda belum melakukan pendaftaran atau data tidak ditemukan.</p>
                        <a href="{{ route('pendaftaran.create') }}" class="inline-flex items-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition">
                            <i class="fas fa-plus mr-2"></i>Daftar Sekarang
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endsection
</body>
</html>