<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomCampaignMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public string $subjectLine;
    public string $body;
    public ?string $unsubscribeUrl;

    /**
     * Create a new message instance.
     */
    public function __construct(string $subjectLine, string $body, ?string $unsubscribeUrl = null)
    {
        $this->subjectLine = $subjectLine;
        $this->body = $body;
        $this->unsubscribeUrl = $unsubscribeUrl;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject($this->subjectLine)
            ->markdown('emails.custom_campaign')
            ->with([
                'subject' => $this->subjectLine,
                'body' => $this->body,
                'unsubscribeUrl' => $this->unsubscribeUrl,
            ]);
    }
}
