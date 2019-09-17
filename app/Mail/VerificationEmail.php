<?php

namespace App\Mail;

use App\EmailVerification;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmailVerification $emailVerification)
    {
        //
        $this->emailVerification = $emailVerification;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject("Confirmação de cadastro XPetx");
        return $this->view('emails.verify', ['emailVerification' => $this->emailVerification]);
    }
}
