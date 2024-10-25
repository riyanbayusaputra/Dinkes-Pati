<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class BeritaModel extends Model
{
    use SoftDeletes, Notifiable;
    protected $fillable = [
        'activity_title',
        'image',
        'description',
    ];
}
