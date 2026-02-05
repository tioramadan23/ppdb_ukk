<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

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
        'kewarganegaraan',
        'berkebutuhan_khusus',
        'alamat_lengkap',
        'asal_sekolah',
        'jurusan',
        'foto_siswa',
        'status_pendaftaran',
    ];

    // Relasi: Pendaftaran -> User (Many to 1)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }


    // Relasi 1 to 1 / 1 to many
    public function orangTua()
    {
        return $this->hasOne(OrangTua::class);
    }

    public function wali()
    {
        return $this->hasOne(Wali::class);
    }

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }

    public function pengumuman()
    {
        return $this->hasOne(Pengumuman::class);
    }
    
}
