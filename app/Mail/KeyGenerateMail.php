<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class KeyGenerateMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public string $mail_subject,
        public string $mail_body,
    )
    {
        //
    }

    public function build()
    {
        return $this->subject($this->mail_subject)->view('mails.generate', ['subject'=> $this->mail_subject, 'token'=> $this->mail_body]);
    }
}
