<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];
    
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
    
    public function options()
    {
        return $this->hasMany(Option::class);
    }
    
    public function responses()
    {
        return $this->hasMany(ResponseAnswer::class);
    }
    public static function boot()
{
    parent::boot();

    // Hapus jawaban dan responden ketika pertanyaan dihapus
    static::deleting(function ($question) {
        // Hapus jawaban terkait dengan pertanyaan
        foreach ($question->responses as $responseAnswer) {
            // Hapus responden yang terkait dengan jawaban
            $responseAnswer->response->delete(); // Hapus responden
            $responseAnswer->delete(); // Hapus jawaban
        }
    });
}

    
    }
