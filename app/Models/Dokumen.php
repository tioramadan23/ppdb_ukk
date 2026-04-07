<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Dokumen extends Model
{
    use HasFactory;
    protected $table = 'dokumen';

    protected $fillable = [
        'pendaftaran_id',
        'jenis_dokumen',
        'file_path',
        'status_dokumen',
    ];

    protected $casts = [
        'status_dokumen' => 'string',
    ];

    // Relasi: Dokumen -> Pendaftaran
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    // Accessor: Get URL file untuk ditampilkan di view
    // Cara pakai: $dokumen->file_url
    public function getFileUrlAttribute()
    {
        // Tambah null check untuk keamanan
        if (!$this->file_path) {
            return null;
        }
        
        // Pastikan path sudah ada di storage/public
        return Storage::disk('public')->exists($this->file_path) 
            ? Storage::url($this->file_path) 
            : null;
    }

    // Helper: Cek apakah file adalah gambar
    public function isImage()
    {
        if (!$this->file_path) return false;
        
        $extension = strtolower(pathinfo($this->file_path, PATHINFO_EXTENSION));
        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
    }

    // Helper: Cek apakah file adalah PDF
    public function isPdf()
    {
        if (!$this->file_path) return false;
        
        $extension = strtolower(pathinfo($this->file_path, PATHINFO_EXTENSION));
        return $extension === 'pdf';
    }

    // Bonus: Helper untuk format ukuran file (jika nanti tambah kolom file_size)
    public function getFormattedSizeAttribute()
    {
        if (!$this->file_size) return '-';
        
        $size = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $size > 1024 && $i < count($units) - 1; $i++) {
            $size /= 1024;
        }
        
        return round($size, 2) . ' ' . $units[$i];
    }
}