<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Userregistered extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $name = $this->data['name'];
        $email = $this->data['email'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //
    }
}
