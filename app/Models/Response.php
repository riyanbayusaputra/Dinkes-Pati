<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $guarded = [];
    
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
    
    public function answers()
    {
        return $this->hasMany(ResponseAnswer::class);
    }
    
}