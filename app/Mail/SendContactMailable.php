<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $body='';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body)
    {
        $this->body=$body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $template=$this->body;
        return $this->subject('Test Mail using Queue in Larvel 8')            
        ->view('contact/template',compact('template'));
    }
}
