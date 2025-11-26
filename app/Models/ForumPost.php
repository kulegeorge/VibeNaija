<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumPost extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['thread_id','user_id','body','is_edited'];

    public function thread() { return $this->belongsTo(ForumThread::class, 'thread_id'); }
    public function user() { return $this->belongsTo(\App\Models\User::class); }
    public function likes() { return $this->hasMany(ForumLike::class, 'post_id'); }
}
