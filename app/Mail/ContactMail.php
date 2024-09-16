<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public string $company,
        public string $phone_no,
        public string $subject_mail,
        public string $mail_subject,
        public string $mail_message
    )
    {
        //
    }

    public function build()
    {
        return $this->subject($this->mail_subject)->view('mails.generate', [
            'subject'=> $this->mail_subject,
            'phone'=> $this->phone_no,
            'company'=> $this->company,
            'subject_mail'=> $this->subject_mail,
            'mail_message'=> $this->mail_message

        ]);
    }
}
