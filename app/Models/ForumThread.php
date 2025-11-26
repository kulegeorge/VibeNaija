<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumThread extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['category_id','user_id','title','slug','body','is_locked','is_pinned','views'];

    protected static function booted()
    {
        static::creating(function ($thread) {
            if (empty($thread->slug)) {
                $thread->slug = Str::slug($thread->title) . '-' . Str::random(6);
            }
        });
    }

    public function category() { return $this->belongsTo(ForumCategory::class); }
    public function user() { return $this->belongsTo(\App\Models\User::class); }
    public function posts() { return $this->hasMany(ForumPost::class)->orderBy('created_at','asc'); }
    public function latestPost() { return $this->hasOne(ForumPost::class)->latestOfMany(); }
}
