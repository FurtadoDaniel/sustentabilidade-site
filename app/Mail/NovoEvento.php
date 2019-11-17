<?php

namespace App\Mail;

use App\Evento;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovoEvento extends Mailable
{
    use Queueable, SerializesModels;

    public $evento;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Evento $evento)
    {
        $this->evento = $evento;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.eventos.novo');
    }
}
