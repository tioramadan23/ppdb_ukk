<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Dokumen extends Model
{
    use HasFactory;

    protected $fillable = [
        'pendaftaran_id',
        'jenis_dokumen',
        'file_path',
        'status_dokumen',
    ];

    protected $casts = [
        'status_dokumen' => 'string',
    ];

    // ✅ Relasi: Dokumen -> Pendaftaran
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    // ✅ Helper: Get URL file untuk ditampilkan di view
    public function getFileUrlAttribute()
    {
        return $this->file_path ? Storage::url($this->file_path) : null;
    }

    // ✅ Helper: Cek apakah file adalah gambar
    public function isImage()
    {
        return in_array(pathinfo($this->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']);
    }

    // ✅ Helper: Cek apakah file adalah PDF
    public function isPdf()
    {
        return pathinfo($this->file_path, PATHINFO_EXTENSION) === 'pdf';
    }
}