<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $body;
    public $subject;
    public $userId;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body,$subject,$userId)
    {
        $this->body=$body;
        $this->subject=$subject;
        $this->userId=$userId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userDetails=User::find($this->userId);
        //->from('dawngill08@gmail.com','dawn gill')->replyTo('dawngill08@gmail.com')  
        $template=$this->body;
        $subject=$this->subject;
        return $this->subject($subject)        
        ->view('contact/template',compact('template'));
    }
}
