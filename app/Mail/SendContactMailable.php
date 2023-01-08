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
    public $firstName;
    public $lastName;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body,$subject,$userId,$firstName,$lastName,$email)
    {
        $this->body=$body;
        $this->subject=$subject;
        $this->userId=$userId;
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->email=$email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userDetails=User::find($this->userId);
        // $fullName=$this->firstName." ".$this->lastName; ->from('dawngill08@gmail.com','dawnn Gill')->sender('mail.softixs.com', 'sof') 
        $template=$this->body;
        $subject=$this->subject;
        return $this->subject($subject)->replyTo($this->email)->from('darwingill6@gmail.com','dawnn Gill')         
        ->markdown('contact/template',compact('template'));
    }
}
