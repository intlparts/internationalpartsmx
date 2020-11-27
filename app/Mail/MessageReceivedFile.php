<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceivedFile extends Mailable
{
    public $subject = 'Mensaje de contacto de zukapiezas.com';
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.messages-received')
            ->with([ 'data' => $this->data ])
            ->attach(storage_path('app/public/'.$this->data['file']), [
                'as' => $this->data['file'],
                'mime' => $this->data['mime'],

            ]);
    }
}
