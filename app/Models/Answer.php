<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['faq_id', 'answer'];

    // Relasi many-to-one dengan Faq
    public function faq()
    {
        return $this->belongsTo(Faq::class);
    }
}
