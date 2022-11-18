<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    public string $email;
    public mixed $message;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(

        string $email,
        string $message
    )
    {

        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Todays weather")
            ->html($this->message)
            ->from($this->email);
    }
}
