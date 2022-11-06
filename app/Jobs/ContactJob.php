<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\SendContactMailable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

class ContactJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected  $body;
    protected  $subject;
    protected  $contactId;
    /**body
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($body,$subject,$contactId)
    {
        $this->body=$body;
        $this->subject=$subject;
        $this->contactId=$contactId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $body=$this->body;
        $subject=$this->subject;
        $contactId=$this->contactId;
        $contact=Contact::whereIn('id',$contactId)->get();
        for ($i=0; $i < count($contact); $i++) { 
            $body=str_replace("[[FIRSTNAME]]",$contact[$i]->first_name,$body);
            $body=str_replace("[[LASTNAME]]",$contact[$i]->last_name,$body);
            $body=str_replace("[[EMAIL]]",$contact[$i]->email,$body);
            $body=str_replace("[[MOBILEPHONE]]",$contact[$i]->mobile_phone,$body);
            $body=str_replace("[[LINKINURL]]",$contact[$i]->linked_in_url,$body);
            Mail::to($contact[$i]->email)->send(new SendContactMailable($body,$subject));
        }

    }
}
