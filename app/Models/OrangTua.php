<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;

    protected $fillable = [
        'pendaftaran_id',
        'nama_ayah',
        'nik_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'no_hp_ayah',
        'nama_ibu',
        'nik_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'no_hp_ibu',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
