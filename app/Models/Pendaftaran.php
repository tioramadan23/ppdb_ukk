<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    // ✅ $fillable sesuai migration pendaftarans
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
        'no_hp',
        'alamat_lengkap',
        'jurusan',
        'asal_sekolah',
        'status_pendaftaran',
        'status_hasil',
        'keterangan_hasil',
        'tanggal_pengumuman',
    ];

    // ✅ Auto-cast untuk tipe data khusus
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_pengumuman' => 'date',
    ];

    // ✅ Relasi: Pendaftaran -> User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ✅ Relasi: Pendaftaran -> OrangTua (1 to 1)
    public function orangTua()
    {
        return $this->hasOne(OrangTua::class);
    }

    // ✅ Relasi: Pendaftaran -> Wali (1 to 1)
    public function wali()
    {
        return $this->hasOne(Wali::class);
    }

    // ✅ Relasi: Pendaftaran -> Dokumen (1 to Many)
    public function dokumens()
    {
        return $this->hasMany(Dokumen::class);
    }

    // ✅ Relasi: Pendaftaran -> Pembayaran (1 to 1)
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }

    // ✅ Helper: Cek apakah sudah submit (bukan draft)
    public function isSubmitted()
    {
        return $this->status_pendaftaran !== 'draft';
    }

    // ✅ Helper: Cek apakah sudah ada hasil pengumuman
    public function hasPengumuman()
    {
        return $this->status_hasil !== null;
    }
}