<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailContactanos extends Mailable
{
    use Queueable, SerializesModels;
    public $contactanosCall;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contactanosCall)
    {
        $this->contactanosCall = $contactanosCall;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //var_dump($this->contactanosCall['location']);
        return $this->view('mail.contactanos_mail')
            ->attach($this->contactanosCall['location']);
    }
}
