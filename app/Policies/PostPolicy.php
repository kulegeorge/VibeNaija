<?php
namespace App\Policies;

use App\Models\User;
use App\Models\ForumPost;

class PostPolicy
{
    public function update(User $user, ForumPost $post)
    {
        // allow edit within 30 minutes or admin
        $editable = now()->diffInMinutes($post->created_at) <= 30;
        return $user->id === $post->user_id && $editable || $user->is_admin;
    }

    public function delete(User $user, ForumPost $post)
    {
        return $user->id === $post->user_id || $user->is_admin;
    }
}
