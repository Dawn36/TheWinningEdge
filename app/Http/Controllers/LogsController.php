<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogsController extends Controller
{
     public function sessionLogs()
    {
        $logs=DB::table('logs')->get();
        return view('log/session_logs',compact('logs'));
    }
   
}
