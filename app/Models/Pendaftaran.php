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
        'no_pendaftaran',
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

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_pengumuman' => 'date',
        'submitted_at' => 'datetime',
    ];

    // Boot method untuk auto-generate nomor pendaftaran
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pendaftaran) {
            if (empty($pendaftaran->no_pendaftaran)) {
                $lastPendaftaran = static::orderBy('id', 'desc')->first();
                $nextNumber = $lastPendaftaran ? intval(substr($lastPendaftaran->no_pendaftaran, -6)) + 1 : 1;
                $pendaftaran->no_pendaftaran = 'BPM-' . date('Y') . '-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
            }
        });
    }

    // Accessor untuk nomor_pendaftaran (untuk kompatibilitas)
    public function getNomorPendaftaranAttribute()
    {
        return $this->no_pendaftaran;
    }

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