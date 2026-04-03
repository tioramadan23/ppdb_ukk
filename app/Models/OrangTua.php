<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;

    // ✅ Table name (karena tidak plural "orang_tuas")
    protected $table = 'orang_tua';

    // ✅ $fillable sesuai migration orang_tua
    protected $fillable = [
        'pendaftaran_id',
        // Data Ayah
        'nama_ayah',
        'nik_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'no_hp_ayah',
        // Data Ibu
        'nama_ibu',
        'nik_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'no_hp_ibu',
    ];

    // ✅ Relasi: OrangTua -> Pendaftaran
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    // ✅ Helper: Format nama orang tua
    public function getNamaLengkapAttribute()
    {
        return "Ayah: {$this->nama_ayah} | Ibu: {$this->nama_ibu}";
    }
}