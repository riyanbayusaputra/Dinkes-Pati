<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengumumanModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "pengumuman";
    protected $fillable = [
        'mulai',
        'selesai',
        'image',
        'pdf',
        'judul',
        'keterangan'
    ];
}
