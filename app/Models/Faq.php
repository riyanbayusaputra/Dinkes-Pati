<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'question']; // Tambahkan 'title' di sini

    // Relasi one-to-many dengan Answer
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
