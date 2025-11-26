<?php
namespace App\Policies;

use App\Models\User;
use App\Models\ForumThread;

class ThreadPolicy
{
    public function update(User $user, ForumThread $thread)
    {
        return $user->id === $thread->user_id || $user->is_admin;
    }

    public function delete(User $user, ForumThread $thread)
    {
        return $user->id === $thread->user_id || $user->is_admin;
    }

    public function pin(User $user) { return $user->is_admin; }
    public function lock(User $user) { return $user->is_admin; }
}
