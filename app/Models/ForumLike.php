<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ForumLike extends Model
{
    use HasFactory;
    protected $fillable = ['post_id','user_id'];

    public function post() { return $this->belongsTo(ForumPost::class, 'post_id'); }
    public function user() { return $this->belongsTo(\App\Models\User::class); }
}
