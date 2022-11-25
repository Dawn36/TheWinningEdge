<?php

namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

trait Logs {
  
    public function SessionLoginLogs($fullName,$email, $status){
		$is_session_logs=env('IS_SESSION_LOGS');
		if($is_session_logs == "1"){
			$datetime = Date("Y-m-d h:i:s");
             DB::insert('insert into logs (full_name,email, status,created_at) 
            values (?,?,?,?)', [$fullName,$email, $status , $datetime]);
			return true;
		}else{
			return true;
		}
		
	}
	

}