<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\ForumPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;

class ThreadReplied extends Notification implements ShouldQueue
{
    use Queueable;

    protected ForumPost $post;

    public function __construct(ForumPost $post) { $this->post = $post; }

    public function via($notifiable)
    {
        return ['database','mail'];
    }

    public function toMail($notifiable)
    {
        $thread = $this->post->thread;
        return (new MailMessage)
            ->subject('New reply to your thread')
            ->line($notifiable->name . ', your thread "'.$thread->title.'" just received a new reply.')
            ->action('View Reply', url(route('forum.threads.show', $thread->id)))
            ->line('Thanks for building the VibeNaija community!');
    }

    public function toDatabase($notifiable)
    {
        $thread = $this->post->thread;
        return [
            'thread_id' => $thread->id,
            'thread_title' => $thread->title,
            'post_id' => $this->post->id,
            'replier_id' => $this->post->user_id,
            'message' => substr($this->post->body,0,200),
        ];
    }
}
