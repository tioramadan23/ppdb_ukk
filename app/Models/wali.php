<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    use HasFactory;

    protected $fillable = [
        'pendaftaran_id',
        'nama_wali',
        'nik_wali',
        'alamat_wali',
        'pendidikan_wali',
        'pekerjaan_wali',
        'no_hp_wali',
    ];

    // ✅ Relasi: Wali -> Pendaftaran
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}