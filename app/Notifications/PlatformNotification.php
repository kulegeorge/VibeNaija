<?php

// app/Notifications/PlatformNotification.php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class PlatformNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $title;
    public $message;
    public $url;
    public $type;      // e.g. task_approved, cbt_result
    public $meta;      // array for extra data
    public $emailOnly; // boolean to send only email (optional)

    public function __construct(string $title, string $message, ?string $url = null, string $type = 'general', array $meta = [], $emailOnly = false)
    {
        $this->title = $title;
        $this->message = $message;
        $this->url = $url;
        $this->type = $type;
        $this->meta = $meta;
        $this->emailOnly = $emailOnly;
    }

    public function via($notifiable)
    {
        // Determine channels per user preferences or $emailOnly flag
        if ($this->emailOnly) return ['mail'];

        // Example: check user preferences (if you created notification_preferences)
        $channels = ['database', 'broadcast']; // always in-app & broadcast
        if ($notifiable->notificationPreferences->email_task_updates ?? true) {
            $channels[] = 'mail';
        }
        return $channels;
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->title,
            'message' => $this->message,
            'url' => $this->url,
            'type' => $this->type,
            'meta' => $this->meta,
        ];
    }

    public function toMail($notifiable)
    {
        // Use MailMessage or Mailable for more complex templating
        return (new MailMessage)
            ->subject($this->title)
            ->markdown('emails.notifications.generic', [
                'title' => $this->title,
                'message' => $this->message,
                'url' => $this->url,
                'meta' => $this->meta,
            ]);
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage($this->toDatabase($notifiable));
    }
}
