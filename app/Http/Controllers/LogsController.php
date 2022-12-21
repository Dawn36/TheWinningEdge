<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;

class LogsController extends Controller
{
     public function sessionLogs()
    {
        // $logs=DB::table('logs')->get();
        return view('log/session_logs');
    }
    public function getSessionLog()
    {
        $logs=DB::table('logs')->select(DB::raw('full_name,email,status,DATE_FORMAT(created_at, "%c/%d/%Y %h:%i:%s %p") as created_at'))->get();
        return Datatables::of($logs)
        ->addIndexColumn()
        ->make();
        // return view('log/session_logs',compact('logs'));
    }
}
