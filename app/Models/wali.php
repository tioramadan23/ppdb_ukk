<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    use HasFactory;

    protected $table = 'wali';

    protected $fillable = [
        'pendaftaran_id',
        'nama_wali',
        'pekerjaan_wali',
        'no_hp_wali',
        'hubungan_wali',
        'alamat_wali',
    ];

    // ✅ Relasi: Wali -> Pendaftaran
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}