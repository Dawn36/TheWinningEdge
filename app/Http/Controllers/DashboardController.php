<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Contact;
use App\Models\EmailTemplate;
use App\Models\Opportunities;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userId=Auth::user()->id;
        $rpaPercentage=0;
        $percentage=0;
        $year=date("Y");
        $month=Date("m");
        $userCount=User::count();
        $contactCount=Contact::where('user_id',$userId)->count();
        $emailTemplateCount=EmailTemplate::count();
        $opportunitiesTarget= DB::table('opportunities_target')->where('user_id',$userId)->whereYear('created_at', '=', $year)->get();
        $amount=DB::select(DB::raw("SELECT SUM(contract_amount) AS amount FROM `opportunities` WHERE user_id='$userId' AND YEAR(created_at)='$year'"));
        if(count($opportunitiesTarget) > 0)
        {
            $percentage=((count($amount) == 0 ? '0' : $amount[0]->amount) / (count($opportunitiesTarget) == 0 ? '0' : $opportunitiesTarget[0]->target))*100;
        }
        $opportunitiesTarget= DB::table('opportunities_target')->where('user_id',$userId)->whereYear('created_at', '=', $year)->get();

        $rpa= DB::table('rpa_target')->where('user_id',$userId)->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->get();
        if(count($rpa) > 0)
        {
            $rpaTarget=$rpa[0]->phone_call+$rpa[0]->live_conversation+$rpa[0]->voice_mail+$rpa[0]->email+$rpa[0]->meeting;
            $rpaCount= DB::table('contact_history')->where('user_id',$userId)->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->count();
            $rpaPercentage=($rpaCount / $rpaTarget)*100;
        }
        else
        {
            $rpaTarget=0;
        }
        return view('dashboard',compact('userCount','contactCount','emailTemplateCount','opportunitiesTarget','percentage','rpaPercentage'));
    }
    public function rpaTarget()
    {
        $userId=Auth::user()->id;
        $year=Date("Y");
        $month=Date("m");
        $rpa= DB::table('rpa_target')->where('user_id',$userId)->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->get();
        return view('dashboard/rpa_target',compact('rpa'));
    }
    public function rpaTargetSubmit(Request $request)
    {
        $userId=Auth::user()->id;
        $date=date("Y-m-d");
        if($request->rpa_target_id == '')
        {
            DB::insert('insert into rpa_target 
            (user_id,phone_call,live_conversation,voice_mail,email,meeting,created_at) values(?,?,?,?,?,?,?)',
            [$userId,$request->phone_call,$request->live_conversation,$request->voice_mail,$request->email,$request->meeting,$date]);
        }
        else
        {
            $affected = DB::table('opportunities_target')
              ->where('id', $request->rpa_target_id)
              ->update([
                'phone_call' => $request->phone_call,
                'live_conversation' => $request->live_conversation,
                'voice_mail' => $request->voice_mail,
                'email' => $request->email,
                'meeting' => $request->meeting,
            ]);
        }
        return redirect()->back();
   
    }
}
