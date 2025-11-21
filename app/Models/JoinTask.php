<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinTask extends Model
{
    use HasFactory;
     protected $fillable = [
        'userID',
        'taskID',
        'status'
        
    ];
}
