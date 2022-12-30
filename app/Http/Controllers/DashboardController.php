<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Contact;
use App\Models\EmailTemplate;
use App\Models\Opportunities;
use App\Models\Task;
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
        $userCount=User::where('user_type','1')->count();
        $contactCount=Contact::where('user_id',$userId)->count();

        $phoneCallMonth= DB::table('contact_history')->where('user_id',$userId)->where('status','phone_call')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->count();
        $liveConversationMonth= DB::table('contact_history')->where('user_id',$userId)->where('status','live_conversation')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->count();
        $voiceMailCount= DB::table('contact_history')->where('user_id',$userId)->where('status','voice_mail')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->count();
        $emailCount= DB::table('contact_history')->where('user_id',$userId)->where('status','email')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->count();
        $meetingCount= DB::table('contact_history')->where('user_id',$userId)->where('status','meeting')->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->count();

        $emailTemplateCount=EmailTemplate::count();
        $opportunitiesCount=Opportunities::whereYear('created_at', '=', $year)->where('user_id',$userId)->count();
        $opportunitiesTarget= DB::table('opportunities_target')->where('user_id',$userId)->whereYear('created_at', '=', $year)->get();
        $amount=DB::select(DB::raw("SELECT SUM(contract_amount) AS amount FROM `opportunities` WHERE user_id='$userId' AND `status`='closed' AND YEAR(created_at)='$year'"));
        $amountAllOver=DB::select(DB::raw("SELECT SUM(contract_amount) AS amount FROM `opportunities` WHERE user_id='$userId' AND YEAR(created_at)='$year'"));
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
        // graph
        $phoneCallData=DB::select(DB::raw("SELECT MONTH(created_at) AS `month`,COUNT(`status`) AS phone_call
        FROM `contact_history` WHERE `status`='phone_call' AND user_id='$userId' AND YEAR(created_at)='$year' GROUP BY MONTH(created_at)"));
        $liveConversationData=DB::select(DB::raw("SELECT MONTH(created_at) AS `month`,COUNT(`status`) AS live_conversation
        FROM `contact_history` WHERE `status`='live_conversation' and user_id='$userId' AND YEAR(created_at)='$year' GROUP BY MONTH(created_at)"));
        $voiceMailData=DB::select(DB::raw("SELECT MONTH(created_at) AS `month`,COUNT(`status`) AS voice_mail
        FROM `contact_history` WHERE `status`='voice_mail' AND user_id='$userId' AND YEAR(created_at)='$year' GROUP BY MONTH(created_at)"));
        $emailData=DB::select(DB::raw("SELECT MONTH(created_at) AS `month`,COUNT(`status`) AS email
        FROM `contact_history` WHERE `status`='email' AND user_id='$userId' AND YEAR(created_at)='$year' GROUP BY MONTH(created_at)"));
        $meetingData=DB::select(DB::raw(" SELECT MONTH(created_at) AS `month`,COUNT(`status`) AS meeting
        FROM `contact_history` WHERE `status`='meeting' and user_id='$userId' AND YEAR(created_at)='$year' GROUP BY MONTH(created_at)"));
        
        $phoneCallArr=array();
        $liveConversationArr=array();
        $voiceMailArr=array();
        $emailArr=array();
        $meetingArr=array();
        for($i=1; $i <= 12; $i++)
        {
            $phoneCallArr[$i]=0;
            $liveConversationArr[$i]=0;
            $voiceMailArr[$i]=0;
            $emailArr[$i]=0;
            $meetingArr[$i]=0;
        }
        for($i=0; $i < count($phoneCallData); $i++)
        {
            $phoneCallArr[$phoneCallData[$i]->month]=$phoneCallData[$i]->phone_call;
        }
        for($i=0; $i < count($liveConversationData); $i++)
        {
            $liveConversationArr[$liveConversationData[$i]->month]=$liveConversationData[$i]->live_conversation;
        }
        for($i=0; $i < count($voiceMailData); $i++)
        {
            $voiceMailArr[$voiceMailData[$i]->month]=$voiceMailData[$i]->voice_mail;
        }
        for($i=0; $i < count($emailData); $i++)
        {
            $emailArr[$emailData[$i]->month]=$emailData[$i]->email;
        }
        for($i=0; $i < count($meetingData); $i++)
        {
            $meetingArr[$meetingData[$i]->month]=$meetingData[$i]->meeting;
        }
        $phoneCallArr=json_encode(array_values($phoneCallArr));
        $liveConversationArr=json_encode(array_values($liveConversationArr));
        $voiceMailArr=json_encode(array_values($voiceMailArr));
        $emailArr=json_encode(array_values($emailArr));
        $meetingArr=json_encode(array_values($meetingArr));
        // $task=Task::where('user_id',$userId)->where('task_status','open')->whereDate('task_date',date('Y-m-d'))->get();
        // AND date(t.task_date) <= '$date'
        $date=date('Y-m-d');
        $task=DB::select(DB::raw("SELECT t.*,cc.`company_name`,c.`first_name`,c.`last_name`,c.`job`,c.`email`,c.`phone_number`,c.`mobile_phone`,c.`status` AS contact_status,c.`id` AS contact_id FROM `tasks` t LEFT JOIN `contacts` c ON t.`contact_id`=c.`id` LEFT JOIN `companies` cc ON cc.`id`=c.`companies_id` where t.user_id='$userId' AND t.task_status = 'open' AND date(t.task_date) <= '$date'  Order by t.`task_date` ASC"));
        return view('dashboard',compact('phoneCallArr','liveConversationArr','task','voiceMailArr','emailArr','meetingArr','userCount','contactCount','opportunitiesCount','emailTemplateCount','opportunitiesTarget','percentage','rpaPercentage','amount','phoneCallMonth','liveConversationMonth','voiceMailCount','emailCount','meetingCount','amountAllOver'));
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
            $affected = DB::table('rpa_target')
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
