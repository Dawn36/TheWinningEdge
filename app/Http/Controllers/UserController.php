<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId=Auth::user()->id;
        $user=User::where('id','!=',$userId)->where('user_type','1')->get();
        return view('admin/admin_index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/admin_create');
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'contact_no' => ['required'],
            'password' => ['required'],
            'email' => ['required'],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email'=>$request->email,
            'contact_no'=>$request->contact_no,
            'user_type'=>$request->role_id,
            'company_name'=>$request->company_name,
            'password_show'=>$request->password,
            'password'=> Hash::make($request->password),
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        $user->attachRole($request->role_id);
        
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
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TalkTrack  $talkTrack
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin/admin_edit',compact('user'));
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'contact_no' => ['required'],
            'email' => ['required'],
        ]);

        $user = User::find($id);
        $user['first_name'] = $request->first_name;
        $user['last_name'] = $request->last_name;
        $user['contact_no'] = $request->contact_no;
        if($request->password != '')
        {
            $user['password'] = Hash::make($request->password);
            $user['password_show'] = $request->password;
        }
        
        $user['email'] = $request->email;
        $user['company_name'] = $request->company_name;
        $user['updated_by'] = Auth::user()->id;
        $user['updated_at'] = date("Y-m-d");
        $user->save();

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
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function userNote(Request $request)
    {
        $request->validate([
            'note' => ['required'],
        ]);
        $user = User::find(Auth::user()->id);
        $user['note'] = $request->note;
        $user->save();

        return redirect()->back();

    }
    public function userIndex()
    {
        $userId=Auth::user()->id;
        $users=User::where('id','!=',$userId)->where('user_type','2')->get();
        return view('user/users_index',compact('users'));
    }
    public function userCreate()
    {
        return view('user/users_create');

    }
}
