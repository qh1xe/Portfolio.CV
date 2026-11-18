<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactMessage extends Mailable
{
    public function __construct(public array $details)
    {
    }

    public function build()
    {
        return $this->subject('New message from your portfolio')
            ->replyTo($this->details['email'], $this->details['name'])
            ->text('emails.contact');
    }
}
