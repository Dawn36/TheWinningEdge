<?php

namespace App\Http\Controllers;

use App\Models\Opportunities;
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
        $opportunities=Opportunities::where('user_id',$userId)->whereYear('created_at', '=', $year)->get();
        $opportunitiesTarget= DB::table('opportunities_target')->where('user_id',$userId)->whereYear('created_at', '=', $year)->get();
        $amount=DB::select(DB::raw("SELECT SUM(contract_amount) AS amount FROM `opportunities` WHERE user_id='$userId' AND YEAR(created_at)='$year'"));
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
        return view('opportunities/opportunities_create');
        
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
        $request->validate([
            'name' => ['required'],
            'company_name' => ['required'],
            'contract_amount' => ['required'],
            'duration' => ['required'],
            'file' => ['required'],
        ]);

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
            'name' => $request->name,
            'company_name' => $request->company_name,
            'contract_amount'=>$request->contract_amount,
            'duration'=>$request->duration,
            'file_name'=>$fileNameDb,
            'size'=>$size,
            'path'=>$path,
            'user_id'=>Auth::user()->id,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => Auth::user()->id,
        ]);
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
        $opportunities=Opportunities::find($id);
        return view('opportunities/opportunities_edit',compact('opportunities'));
        
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
        $request->validate([
            'name' => ['required'],
            'company_name' => ['required'],
            'contract_amount' => ['required'],
            'duration' => ['required'],
        ]);
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
        $opportunities['name'] = $request->name;
        $opportunities['company_name'] = $request->company_name;
        $opportunities['contract_amount'] = $request->contract_amount;
        $opportunities['duration'] = $request->duration;
        $opportunities['updated_at'] = date("Y-m-d");
        $opportunities->save();

       
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
        return redirect()->back();
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
}
