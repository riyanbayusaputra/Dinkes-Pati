<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseAnswer extends Model
{
    protected $guarded = [];
    
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
    public function response()
    {
        return $this->belongsTo(Response::class);
    }
    
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}