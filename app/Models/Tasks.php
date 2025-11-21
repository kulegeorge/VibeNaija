<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'taskname',
        'task_description',
        'images',
        'url',
        'category',
        'duration',
        'task_points',
        'task_level',
        'submission_instruction',
        'badge_name',
        'badge_icon',
        'level_image',
        'status'
    ];
}
