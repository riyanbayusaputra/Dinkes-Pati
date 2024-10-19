<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;


    // Tentukan atribut yang dapat diisi secara massal
    protected $fillable = [
        'title',
        'description',
        'file',
        'penyusun',
        'tahun'

    ];

    // Jika Anda ingin menambahkan relasi atau metode lain, tambahkan di sini
}
