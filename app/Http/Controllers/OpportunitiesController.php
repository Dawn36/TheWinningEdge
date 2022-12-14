<?php

namespace App\Http\Controllers;

use App\Models\Opportunities;
use App\Models\Contact;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OpportunitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId=Auth::user()->id;
        $year=date("Y");
        $percentage=0;
       // $opportunities=Opportunities::where('user_id',$userId)->whereYear('created_at', '=', $year)->orderby('id','desc')->get();
        $opportunities=DB::select(DB::raw("SELECT o.*,c.`first_name`,c.`id` AS contact_id,c.`email`,c.`phone_number`,c.`mobile_phone`,c.`job`,c.`last_name`,cc.`company_name`,
        (SELECT note FROM `contact_note` WHERE contact_id= o.`contact_id` ORDER BY id DESC LIMIT 1 ) AS contact_note
         FROM `opportunities` o 
        LEFT JOIN `contacts` c ON o.`contact_id` = c.`id`
        LEFT JOIN `companies` cc ON cc.`id`=o.`company_id` 
        WHERE  o.`user_id` = $userId"));
        // YEAR(o.created_at) = '$year' AND
        $opportunitiesTarget= DB::table('opportunities_target')->where('user_id',$userId)->whereYear('created_at', '=', $year)->get();
        $amount=DB::select(DB::raw("SELECT SUM(contract_amount) AS amount FROM `opportunities` WHERE user_id='$userId' AND `status`='closed' AND YEAR(created_at)='$year'"));
        if(count($opportunitiesTarget) > 0)
        {
            $percentage=((count($amount) == 0 ? '0' : $amount[0]->amount) / (count($opportunitiesTarget) == 0 ? '0' : $opportunitiesTarget[0]->target))*100;
        }
        return view('opportunities/opportunities_index' ,compact('opportunities','opportunitiesTarget','amount','percentage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId=Auth::user()->id;
        $contact=Contact::where('user_id',$userId)->get();
        return view('opportunities/opportunities_create',compact('contact'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId=Auth::user()->id;
        $fileNameDb='';
        $size='';
        $path='';

        if ($request->hasFile('file')) {
            $destinationPath = base_path('public/uploads/opportunity/' . $userId);
            $file = $request->file('file');
            $fileNameDb=$file->getClientOriginalName();
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $size = $file->getSize();
            $file->move($destinationPath, $filename);
            $path = "uploads/opportunity/" .$userId . "/". $filename;
        }
        $user = Opportunities::create([
            'contact_id' => $request->contact_id,
            'company_id' => $request->company_id,
            'status' => $request->status,
            'contract_amount'=>$request->contract_amount,
            'note'=>$request->note,
            'duration'=>$request->duration,
            'file_name'=>$fileNameDb,
            'size'=>$size,
            'path'=>$path,
            'user_id'=>Auth::user()->id,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        if(isset($request->note))
        {
            $contactId=$request->contact_id;
            $note=$request->note;
            $date=Date("Y-m-d H:i:s");
            $firstName=Auth::user()->first_name;
            $lastName=Auth::user()->last_name;
            $fullName=$firstName." ".$lastName;
            DB::insert('insert into contact_note (user_id,contact_id,user_name,note,created_at) values(?,?,?,?,?)',[$userId,$contactId,$fullName,$note,$date]);
        }
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Opportunities  $opportunities
     * @return \Illuminate\Http\Response
     */
    public function show(Opportunities $opportunities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Opportunities  $opportunities
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $userId=Auth::user()->id;
        $opportunities=Opportunities::find($id);
        $latestNote=DB::table('contact_note')->where('contact_id',$opportunities->contact_id)->orderByDesc('id')->limit('1')->get();
        $contact=Contact::where('user_id',$userId)->get();
        return view('opportunities/opportunities_edit',compact('opportunities','contact','latestNote'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opportunities  $opportunities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        
        $userId=Auth::user()->id;
        $opportunities = Opportunities::find($id);
        if ($request->hasFile('file')) {
            $previousPic = $opportunities->path;
            $previousPicDest =  $previousPic;
            File::delete($previousPicDest);
            $destinationPath = base_path('public/uploads/opportunity/' . $userId);
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $size = $file->getSize();
            $file->move($destinationPath, $filename);
            $path = "uploads/opportunity/" .$userId . "/". $filename;
            $opportunities['file_name'] = $file->getClientOriginalName();
            $opportunities['size'] = $size;
            $opportunities['path'] = $path;
        }
       
        $opportunities['contact_id'] = $request->contact_id;
        $opportunities['status'] = $request->status;
        $opportunities['note'] = $request->note;
        $opportunities['company_id'] = $request->company_id;
        $opportunities['contract_amount'] = $request->contract_amount;
        $opportunities['duration'] = $request->duration;
        $opportunities['updated_at'] = date("Y-m-d");
        $opportunities->save();
        if($request->note_id == '0')
        {
            $contactId=$request->contact_id;
            $note=$request->note;
            $date=Date("Y-m-d H:i:s");
            $firstName=Auth::user()->first_name;
            $lastName=Auth::user()->last_name;
            $fullName=$firstName." ".$lastName;
            DB::insert('insert into contact_note (user_id,contact_id,user_name,note,created_at) values(?,?,?,?,?)',[$userId,$contactId,$fullName,$note,$date]);
        }
        else
        {
            DB::table('contact_note')
                ->where('id', $request->note_id)
                ->update(['note' => $request->note]);
        }
       
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opportunities  $opportunities
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Opportunities::find($id);
        $previousPic = $data->path;
        $previousPicDest =  $previousPic;
        File::delete($previousPicDest);
        $data->delete();
        return true;
    }

    public function opportunitiesTarget()
    {
        $userId=Auth::user()->id;
        $year=Date("Y");
       $opportunitiesTarget= DB::table('opportunities_target')->where('user_id',$userId)->whereYear('created_at', '=', $year)->get();
        return view('opportunities/opportunities_target',compact('opportunitiesTarget'));
    }
    public function opportunitiesTargetSubmit(Request $request)
    {
        $request->validate([
            'opportunities_target' => ['required','gt:0'],
        ]);
        $userId=Auth::user()->id;
        $date=date("Y-m-d");
        if($request->opportunities_target_id == '')
        {
            DB::insert('insert into opportunities_target (user_id,target,created_at) values(?,?,?)',[$userId,$request->opportunities_target,$date]);
        }
        else
        {
            $affected = DB::table('opportunities_target')
              ->where('id', $request->opportunities_target_id)
              ->update(['target' => $request->opportunities_target]);
        }
        return redirect()->back();
   
    }
    public function getContactCompany(Request $request)
    {
        $contactId=$request->contact_id;
        $contactData=Contact::find($contactId);
        $companyId=$contactData->companies_id;
        $companyData=Company::find($companyId);
        $companyName=$companyData->company_name;
        $data=array();
        $data['companies_id']=$companyId;
        $data['company_name']=$companyName;
        return $data;
    }
    public function opportunitiesStatusUpdate(Request $request)
    {
        $status=$request->status;
        $id=$request->opportunities_id;
        $opportunities=Opportunities::find($id);
        $opportunities->status=strtolower($status);
        $opportunities->save();
        return true;
    }
}
