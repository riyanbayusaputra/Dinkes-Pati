<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityGallery extends Model
{
    use HasFactory;

    // Menentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'activity_title',  // Judul kegiatan
        'image',           // Nama file gambar
        'description',     // Deskripsi kegiatan
    ];

    // Jika Anda ingin menambahkan hubungan dengan model lain, Anda bisa menambahkannya di sini
    // Misalnya, jika ada model User untuk kegiatan yang dibuat oleh pengguna tertentu
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
