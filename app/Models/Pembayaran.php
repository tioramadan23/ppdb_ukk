<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans'; // ✅ Karena migration pakai plural

    protected $fillable = [
        'pendaftaran_id',
        'bank_transfer',
        'tanggal_transfer',
        'bukti_pembayaran_path',
        'status_pembayaran',
        'tanggal_upload',
        'catatan_admin',
    ];

    protected $casts = [
    'tanggal_transfer' => 'datetime',
    'tanggal_upload' => 'datetime',
];

    // ✅ Relasi: Pembayaran -> Pendaftaran
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    // ✅ Helper: Get URL bukti pembayaran
    public function getBuktiUrlAttribute()
    {
        return $this->bukti_pembayaran_path 
            ? Storage::url($this->bukti_pembayaran_path) 
            : null;
    }

    // ✅ Helper: Cek apakah pembayaran sudah diterima
    public function isAccepted()
    {
        return $this->status_pembayaran === 'diterima';
    }

    // ✅ Helper: Cek apakah pembayaran masih pending
    public function isPending()
    {
        return $this->status_pembayaran === 'pending';
    }
}