<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'topic_id', 'question', 'option_a', 'option_b',
        'option_c', 'option_d', 'correct_option'
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}


