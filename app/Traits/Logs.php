<?php

namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


trait Logs {
  
    public function SessionLoginLogs($fullName,$email, $status){
		$is_session_logs=env('IS_SESSION_LOGS');
		if($is_session_logs == "1"){
			$datetime = Date("Y-m-d H:i:s");
             DB::insert('insert into logs (full_name,email, status,created_at) 
            values (?,?,?,?)', [$fullName,$email, $status , $datetime]);
			return true;
		}else{
			return true;
		}
	}
	public function SendEmail($toEmail,$subject,$fileName,$data='')
    {
		$is_email_send=env('IS_EMAIL_SEND');
		if($is_email_send == "1"){
        $to_email=$toEmail;
        $from_email = env('MAIL_FROM_ADDRESS');
        $subject = $subject;
            Mail::send("mail-template/$fileName", ['data' => $data], function ($message) use ($to_email, $from_email, $subject) {
                $message->to($to_email)
                    ->subject($subject);
                $message->from($from_email);
        }); 
		return true;

	}
	else
	{
		return true;

	}
    }
	

}