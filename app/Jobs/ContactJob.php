<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\SendContactMailable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon;
use App\Models\Contact;

class ContactJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected  $body;
    protected  $subject;
    protected  $contactId;
    protected  $userId;
    /**body
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($body,$subject,$contactId,$userId)
    {
        $this->body=$body;
        $this->subject=$subject;
        $this->contactId=$contactId;
        $this->userId=$userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $subject=$this->subject;
        $contactId=$this->contactId;
        $contact=Contact::whereIn('id',$contactId)->get();
        $mytime = Carbon\Carbon::now();
        $date=$mytime->toDateTimeString();
        for ($i=0; $i < count($contact); $i++) { 
            $body=$this->body;
            $body=str_replace("[[FIRSTNAME]]",$contact[$i]->first_name,$body);
            $body=str_replace("[[LASTNAME]]",$contact[$i]->last_name,$body);
            $body=str_replace("[[EMAIL]]",$contact[$i]->email,$body);
            $body=str_replace("[[MOBILEPHONE]]",$contact[$i]->mobile_phone,$body);
            $body=str_replace("[[LINKINURL]]",$contact[$i]->linked_in_url,$body);
            //Log::info('Showing the user profile for user: '.$body);
            //Log::info('Showing the user profile for user: '.$contact[$i]->first_name);
            Mail::to($contact[$i]->email)->send(new SendContactMailable($body,$subject,$this->userId));
            DB::insert('insert into contact_history (user_id,contacts_id,status,created_at) values(?,?,?,?)',[$this->userId,$contact[$i]->id,'email',$date]);
        }

    }
}
