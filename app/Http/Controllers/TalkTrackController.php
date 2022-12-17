<?php

namespace App\Http\Controllers;

use App\Models\TalkTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Datatables;
use Illuminate\Support\Facades\Log;

class TalkTrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $talkTrack=TalkTrack::with('user')->get();
        // $talkTrack= DB::table('talk_tracks AS tt')
        // ->join('users AS u', 'tt.user_id', '=', 'u.id')
        // ->select(DB::raw('tt.*,u.first_name,u.last_name'))
        // ->whereNull('u.deleted_at')
        // ->orderBy('tt.id', 'desc')->get();
        return view('talk-track/talk_track_index');
    }
    public function getTalkTrack(){

        $talkTrack= DB::table('talk_tracks AS tt')
        ->join('users AS u', 'tt.user_id', '=', 'u.id')
        ->select(DB::raw('tt.*,u.first_name,u.last_name,DATE_FORMAT(tt.created_at, "%c/%d/%Y") as created_at'))
        ->whereNull('u.deleted_at')
        ;
        return Datatables::of($talkTrack)
             ->addIndexColumn()
             ->make();
     }
    /**->addColumn('status', function($row){
 
                 if($row->status == 1){
                     return "Active";
                 }else{
                     return "Inactive";
                 }
 
             })
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('talk-track/talk_track_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'talk_track_name' => ['required'],
            'note' => ['required'],
        ]);
        $data = TalkTrack::create([
            'talk_track_name' => $request->talk_track_name,
            'note' => $request->note,
            'user_id'=>Auth::user()->id,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TalkTrack  $talkTrack
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        // $talkTrack=TalkTrack::with('user')->find($id)->get();
        $talkTrack= DB::table('talk_tracks AS tt')
        ->join('users AS u', 'tt.user_id', '=', 'u.id')
        ->select(DB::raw('tt.*,u.first_name,u.last_name'))
        ->where('tt.id',$id)
        ->whereNull('u.deleted_at')
        ->get();
        return view('talk-track/talk_track_show',compact('talkTrack'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TalkTrack  $talkTrack
     * @return \Illuminate\Http\Response
     */
    public function edit(TalkTrack $talkTrack)
    {
        return view('talk-track/talk_track_edit',compact('talkTrack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TalkTrack  $talkTrack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'talk_track_name' => ['required'],
            'note' => ['required'],
        ]);
        $adds = TalkTrack::find($id);
        $adds['talk_track_name'] = $request->talk_track_name;
        $adds['note'] = $request->note;
        $adds['updated_by'] = Auth::user()->id;
        $adds['updated_at'] = date("Y-m-d");
        $adds->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TalkTrack  $talkTrack
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = TalkTrack::find($id);
        $data->delete();
        return true;
    }
}
