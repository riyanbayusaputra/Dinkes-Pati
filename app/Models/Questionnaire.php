<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Questionnaire.php
class Questionnaire extends Model
{
    protected $guarded = [];
    
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    
    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}

// Buat model serupa untuk Question, Option, Response, dan ResponseAnswer