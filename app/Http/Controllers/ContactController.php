<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use App\Imports\ContactImport;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId=Auth::user()->id;
       $contact= DB::select(DB::raw("SELECT *,
        (SELECT COUNT(`status`) FROM `contact_history` WHERE `status`='email' AND contacts_id = c.id ) AS email,
        (SELECT created_at FROM `contact_history` WHERE `status`='email' AND contacts_id = c.id ORDER BY id DESC LIMIT 1 ) AS last_email,
        (SELECT COUNT(`status`) FROM `contact_history` WHERE `status`='live_conversation' AND contacts_id = c.id ) AS live_conversation,
        (SELECT created_at FROM `contact_history` WHERE `status`='live_conversation' AND contacts_id = c.id ORDER BY id DESC LIMIT 1 ) AS last_live_conversation,
        (SELECT COUNT(`status`) FROM `contact_history` WHERE `status`='voice_mail' AND contacts_id = c.id ) AS voic_mail,
        (SELECT created_at FROM `contact_history` WHERE `status`='voice_mail' AND contacts_id = c.id ORDER BY id DESC LIMIT 1 ) AS last_voic_mail,
        
        (SELECT COUNT(`status`) FROM `contact_history` WHERE `status`='phone_call' AND contacts_id = c.id ) AS phone_call,
        (SELECT created_at FROM `contact_history` WHERE `status`='phone_call' AND contacts_id = c.id ORDER BY id DESC LIMIT 1 ) AS last_phone_call,
        
        (SELECT COUNT(`status`) FROM `contact_history` WHERE `status`='meeting' AND contacts_id = c.id ) AS meeting,
        (SELECT created_at FROM `contact_history` WHERE `status`='meeting' AND contacts_id = c.id ORDER BY id DESC LIMIT 1 ) AS last_meeting
         
         FROM `contacts` c
         WHERE user_id='$userId'
        "));
        return view('contact/contact_index' , compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('contact/contact_create');
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'job' => ['required'],
            'phone_number' => ['required'],
            'email' => ['required'],
            'mobile_phone' => ['required'],
            'company_name' => ['required'],
            'linked_in_url' => ['required'],
        ]);
        $path='';
        if ($request->hasFile('file')) {
            $destinationPath = base_path('public/uploads/contacts/' . $userId);
            $file = $request->file('file');
            $fileNameDb=$file->getClientOriginalName();
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $size = $file->getSize();
            $file->move($destinationPath, $filename);
            $path = "uploads/contacts/" .$userId . "/". $filename;
        }
        $user = Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'profile_img'=>$path,
            'job'=>$request->job,
            'phone_number'=>$request->phone_number,
            'email'=>$request->email,
            'mobile_phone'=>$request->mobile_phone,
            'company_name'=>$request->company_name,
            'linked_in_url'=>$request->linked_in_url,
            'user_id'=>$userId,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $contactId=$contact->id;
        $meeting= DB::select(DB::raw("SELECT * FROM `contact_history` WHERE `status`='meeting' AND contacts_id = '$contactId' ORDER BY id DESC"));
        $email= DB::select(DB::raw("SELECT * FROM `contact_history` WHERE `status`='email' AND contacts_id = '$contactId' ORDER BY id DESC"));
        $liveConversation= DB::select(DB::raw("SELECT * FROM `contact_history` WHERE `status`='live_conversation' AND contacts_id = '$contactId' ORDER BY id DESC"));
        $voiceMail= DB::select(DB::raw("SELECT * FROM `contact_history` WHERE `status`='voice_mail' AND contacts_id = '$contactId' ORDER BY id DESC"));
        $phoneCall= DB::select(DB::raw("SELECT * FROM `contact_history` WHERE `status`='phone_call' AND contacts_id = '$contactId' ORDER BY id DESC"));
        $note= DB::select(DB::raw("SELECT * FROM `contact_note` WHERE contact_id = '$contactId' ORDER BY id DESC"));
        return view('contact/contact_show',compact('contact','meeting','email','liveConversation','voiceMail','phoneCall','note'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contact/contact_edit',compact('contact'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $userId=Auth::user()->id;
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'job' => ['required'],
            'phone_number' => ['required'],
            'email' => ['required'],
            'mobile_phone' => ['required'],
            'company_name' => ['required'],
            'linked_in_url' => ['required'],
            'status' => ['required'],
        ]);
        $contact = Contact::find($id);
        if ($request->hasFile('file')) {
            $previousPic = $contact->profile_img;
            $previousPicDest =  $previousPic;
            File::delete($previousPicDest);
            $destinationPath = base_path('public/uploads/contacts/' . $userId);
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $size = $file->getSize();
            $file->move($destinationPath, $filename);
            $path = "uploads/contacts/" .$userId . "/". $filename;
         
            $contact['profile_img'] = $path;
        $contact->save();

        }

        $contact['first_name'] = $request->first_name;
        $contact['last_name'] = $request->last_name;
        $contact['job'] = $request->job;
        $contact['status'] = $request->status;
        $contact['phone_number'] = $request->phone_number;
        $contact['email'] = $request->email;
        $contact['mobile_phone'] = $request->mobile_phone;
        $contact['company_name'] = $request->company_name;
        $contact['linked_in_url'] = $request->linked_in_url;
        $contact['updated_by'] = Auth::user()->id;
        $contact['updated_at'] = date("Y-m-d");
        $contact->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Contact::find($id);
        DB::table('contact_history')->where('contacts_id',$id)->delete();
        $data->delete();
        return redirect()->back();
    }
    public function contactCounter(Request $request)
    {
        $userId=Auth::user()->id;
        $status=$request->status;
        $date=Date("Y-m-d H:i:s");
        $contactsId=$request->contacts_id;
        DB::insert('insert into contact_history (user_id,contacts_id,status,created_at) values(?,?,?,?)',[$userId,$contactsId,$status,$date]);
    }
    public function contactCounterDelete($id)
    {
        DB::table('contact_history')->where('id',$id)->delete();
        return redirect()->back();

    }
    public function contactNote(Request $request)
    {
        $contactId=$request->contactId;
        return view('contact/contact_note',compact('contactId'));
    }
    public function contactNoteSubmit(Request $request)
    {
        $userId=Auth::user()->id;
        $date=Date("Y-m-d H:i:s");
        $firstName=Auth::user()->first_name;
        $lastName=Auth::user()->last_name;
        $fullName=$firstName." ".$lastName;
        $note=$request->note;
        $contactId=$request->contact_id;
        DB::insert('insert into contact_note (user_id,contact_id,user_name,note,created_at) values(?,?,?,?,?)',[$userId,$contactId,$fullName,$note,$date]);
        return redirect()->back();
    }
    public function contactChangeStatus(Request $request)
    {
        $affected = DB::table('contact_note')
        ->where('id', $request->note_id)
        ->update(['status' => $request->task_status]);
        return redirect()->back();
    }
    public function uploadContact()
    {
        return view('contact/contact_uploader');

    }
    public function uploadContactSubmit(Request $request)
    {
            Excel::import(new ContactImport, $request->file);

            return redirect()->back();
    }
}
