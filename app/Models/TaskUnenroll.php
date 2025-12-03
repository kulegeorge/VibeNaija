<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserTaskSubmission;
use App\Models\UserAnswer;

class TaskUnenroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'user_id',
        'reason',
    ];

    protected static function booted()
    {
        static::created(function ($unenroll) {

            $taskId = $unenroll->task_id;
            $userId = $unenroll->user_id;

            // Delete all submissions by this user for this task
            UserTaskSubmission::where('task_id', $taskId)
                ->where('user_id', $userId)->where('status','pending')
                ->delete();

            // Delete all user answers tied to this task
            UserAnswer::where('taskId', $taskId)
                ->where('user_id', $userId)
                ->delete();

  // Unjoin Task Table for this task
            JoinTask::where('taskID', $taskId)
                ->where('userID', $userId)
                ->delete();


                 // Remove result table records
            Result::where('taskId', $taskId)
                ->where('user_id', $userId)
                ->delete();


            

        });
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
