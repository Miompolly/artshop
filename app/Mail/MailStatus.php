<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;

    public $body;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $body)
    {
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): MailStatus
    {
        return $this->subject($this->subject)
            ->view('mail-status');
    }
}
