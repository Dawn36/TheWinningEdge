<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\File;



class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // DB::enableQueryLog();

        // DB::enableQueryLog();

        // dd(DB::getQueryLog());


        $userId = Auth::user()->id;
        $user = User::find($userId);
        $data['id'] = ucwords($user->id);
        $data['first_name'] = ucwords($user->first_name);
        $data['last_name'] = ucwords($user->last_name);
        $data['email'] = $user->email;
        $data['contact_no'] = $user->contact_no;
        $data['company_name'] = $user->company_name;
        $data['profile_picture'] = $user->profile_picture;

        return view('user.settings', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        $userId = Auth::user()->id;
        $user = User::find($userId);
        // $request->validate([
        //     'nick_name' => ['required', 'max:255', 'unique:users', 'unique:users,deleted_at,NULL,id' . $user->id],
        // ]);

        $validatedData = $request->validate([
            'file' => 'png,jpg,jpeg|max:2048',

        ]);
        if ($request->hasFile('profile_picture')) {
            // $folderName = $userId;
            // $fileName = time();
            $previousPic = $user->profile_picture;
            if ($previousPic != 'blank.png') {
                $previousPicDest = "profile/" . $previousPic;
                File::delete($previousPicDest);
            }

            // $request->profile_picture->storeAs("profile/$folderName/", $fileName . '.jpg', 'public');
            // $user->profile_picture = $folderName . '/' . $fileName . '.jpg';
            $path = "profile/" . $userId;
            $file = $request->file('profile_picture');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $user['profile_picture'] = $userId . "/" . $filename;
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->contact_no = $request->contact_no;
        $user->company_name = $request->company_name;

        $user->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateEmail(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'confirmemailpassword' => ['required'],

        ]);

        if (Hash::check($request->confirmemailpassword, $user->password)) {

            $user->email = $request->email;
            $user->save();
            return redirect()->back();
        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect()->back();
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'confirmed|max:8|different:old_password',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->password),
                'password_show' => $request->password
            ])->save();

            $request->session()->flash('success', 'Password changed');
            return redirect()->back();
        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
