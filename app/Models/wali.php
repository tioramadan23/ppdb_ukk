<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wali extends Model
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
}
