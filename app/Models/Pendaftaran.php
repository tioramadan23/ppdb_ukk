<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    // ✅ $fillable sesuai kolom tabel pendaftarans
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nisn',
        'nik',
        'no_kk',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'no_hp',              // ✅ Sudah diperbaiki
        'alamat_lengkap',     // ✅ Sudah diperbaiki
        'jurusan',
        'asal_sekolah',
        'status_pendaftaran',
        'status_hasil',
        'keterangan_hasil',
        'tanggal_pengumuman',
        // 'email',           // ⚠️ Tambah ini HANYA jika kolom email ada di tabel pendaftarans
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_pengumuman' => 'date',
        'submitted_at' => 'datetime',
    ];

    // Relasi
    public function user() { return $this->belongsTo(User::class); }
    public function orangTua() { return $this->hasOne(OrangTua::class); }
    public function wali() { return $this->hasOne(Wali::class); }
    public function dokumens() { return $this->hasMany(Dokumen::class); }
    public function pembayaran() { return $this->hasOne(Pembayaran::class); }

    // Helper
    public function isSubmitted() { return $this->status_pendaftaran !== 'draft'; }
    public function hasPengumuman() { return $this->status_hasil !== null; }
}