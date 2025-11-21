<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTaskSubmission extends Model
{
    use HasFactory;

    protected $table = 'user_task_submissions';

    protected $fillable = [
        'user_id',
        'task_id',
        'user_text',
        'video_url',
        'images',        // JSON array
        'documents',     // JSON array
        'badges_earned',
        'points',     // integer
        'status',        // pending / approved / rejected
    ];

    protected $casts = [
        'images' => 'array',
        'documents' => 'array',
    ];

    // Relationship: A submission belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship: A submission belongs to a task
    public function task()
    {
        return $this->belongsTo(Tasks::class, 'task_id');
    }
}
