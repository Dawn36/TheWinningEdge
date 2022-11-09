<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $body;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body,$subject)
    {
        $this->body=$body;
        $this->subject=$subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $template=$this->body;
        $subject=$this->subject;
        return $this->subject($subject)            
        ->markdown('contact/template',compact('template'));
    }
}
