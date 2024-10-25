<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrafischartModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'komponen',
        'satuan',
        'tahun',
        'tipe',
    ];
}
