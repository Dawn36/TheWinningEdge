<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Opportunities;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\EmailTemplate;
use App\Models\Company;
use App\Imports\ContactImport;
use App\Models\Task;
use Maatwebsite\Excel\Facades\Excel;
use App\Jobs\ContactJob;
use Carbon;
use Datatables;
use App\Exports\ExportContact;

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
        // $this->raw('phone_call','phone_call_count','phone_call_date');
        // $this->raw('live_conversation','live_conversation_count','live_conversation_date');
        // $this->raw('voice_mail','voice_mail_count','voice_mail_date');
        // $this->raw('email','email_count','email_date');
        // $this->raw('meeting','meeting_scheduled_count','meeting_scheduled_date');
        // dd('-- Updating ---');
        $tagsArr=DB::select(DB::raw("SELECT DISTINCT(t.`id`),t.`name` FROM `tags` t INNER JOIN `tags_contact` tc ON t.`id`=tc.`tags_id`"));
        return view('contact/contact_index',compact('tagsArr'));
    }
    public function getContact(Request $request)
    {
        $dbWhere='';
        $dbWhere1='';
        $dbWhere2='';
        $dbWhere3='';
        $distant='';
        if(isset($request->search_new))
        {
            $dbWhere=" and cc.`company_name` like '%$request->search_new%'";
        }
        if(isset($request->tags))
        {
            $tags=implode(',',$request->tags);
            $dbWhere1="INNER JOIN `tags_contact` tc ON c.id = tc.contact_id AND tc.`tags_id` IN ($tags)";
        }
        if(isset($request->contact_status))
        {
            $dbWhere3=" and c.`status` = '$request->contact_status'";
        }
        if(isset($request->company_id))
        {
            $companyId=$request->company_id;
            $companyId=implode(',',$companyId);
            $dbWhere2=" and c.`companies_id` IN ($companyId)";
        }
        $userId=Auth::user()->id;
       $contact= DB::select(DB::raw("SELECT DISTINCT(c.id),c.first_name,c.last_name,c.job,c.phone_number,c.mobile_phone,c.status,c.email as email_address,cc.company_name,
       c.email_count AS email,DATE_FORMAT(c.email_date, '%c/%d/%Y %h:%i:%s %p') AS last_email,c.live_conversation_count AS live_conversation ,DATE_FORMAT(c.live_conversation_date, '%c/%d/%Y %h:%i:%s %p') AS last_live_conversation,
       c.voice_mail_count AS voic_mail,DATE_FORMAT(c.voice_mail_date, '%c/%d/%Y %h:%i:%s %p') AS last_voic_mail,c.phone_call_count AS phone_call ,DATE_FORMAT(c.phone_call_date, '%c/%d/%Y %h:%i:%s %p') AS last_phone_call,
       c.meeting_scheduled_count AS meeting,DATE_FORMAT(c.meeting_scheduled_date, '%c/%d/%Y %h:%i:%s %p') AS last_meeting
         FROM `contacts` c left join companies cc on cc.id=c.companies_id $dbWhere1
         WHERE c.user_id='$userId' $dbWhere  $dbWhere2 $dbWhere3 order by c.id desc
        "));

        return Datatables::of($contact)
        ->addIndexColumn()
        ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $userId=Auth::user()->id;

        $company=Company::where('user_id',$userId)->get();
        $companyId=$request->company_id;
        return view('contact/contact_create',compact('company','companyId'));
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
        // $request->validate([
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:contacts'],
        // ]);
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
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
       
        
        $companyId=$request->company_id;
        if(is_numeric($request->company_id) == false)
        {
            $data = Company::create([
                'company_name' => $request->company_id,
                'user_id'=>Auth::user()->id,
                'created_at' => date("Y-m-d h:i:s"),
                'created_by' => Auth::user()->id,
            ]);
            $companyId=$data->id;
        }
        
        $contact = Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'status' => $request->status,
            'profile_img'=>$path,
            'job'=>$request->job,
            'phone_number'=>$request->phone_number,
            'email'=>$request->email,
            'mobile_phone'=>$request->mobile_phone,
            'companies_id'=>$companyId,
            'linked_in_url'=>$request->linked_in_url,
            'user_id'=>$userId,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        if(isset($request->tags))
        {
            $tags=json_decode($request->tags);
            for ($i=0; $i < count($tags); $i++) { 
                $tagsData=DB::table('tags')->where('user_id',$userId)->where('name',strtolower($tags[$i]->value))->get();
                if(count($tagsData) == 0)
                {
                    $newTagId = DB::table('tags')->insertGetId([
                        'user_id' => $userId,
                        'name' => strtolower($tags[$i]->value),
                        'created_at' => Date("Y-m-d"),
                    ]);
                    DB::table('tags_contact')->insertGetId([
                        'contact_id' => $contact->id,
                        'tags_id' => $newTagId,
                    ]);
                }
                else
                {
                    DB::table('tags_contact')->insertGetId([
                        'contact_id' => $contact->id,
                        'tags_id' => $tagsData[0]->id,
                    ]);
                }
            }
        }
        if(isset($request->note))
        {
            $contactId=$contact->id;
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
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $year=date("Y");
        $contactId=$contact->id;
        $companiesId=$contact->companies_id;
        $meeting= DB::select(DB::raw("SELECT * FROM `contact_history` WHERE `status`='meeting' AND contacts_id = '$contactId' ORDER BY id DESC"));
        $email= DB::select(DB::raw("SELECT * FROM `contact_history` WHERE `status`='email' AND contacts_id = '$contactId' ORDER BY id DESC"));
        $liveConversation= DB::select(DB::raw("SELECT * FROM `contact_history` WHERE `status`='live_conversation' AND contacts_id = '$contactId' ORDER BY id DESC"));
        $voiceMail= DB::select(DB::raw("SELECT * FROM `contact_history` WHERE `status`='voice_mail' AND contacts_id = '$contactId' ORDER BY id DESC"));
        $phoneCall= DB::select(DB::raw("SELECT * FROM `contact_history` WHERE `status`='phone_call' AND contacts_id = '$contactId' ORDER BY id DESC"));
        $note= DB::select(DB::raw("SELECT * FROM `contact_note` WHERE contact_id = '$contactId' ORDER BY id DESC"));
        $task= DB::select(DB::raw("SELECT * FROM `tasks` WHERE contact_id = '$contactId'  ORDER BY created_at DESC"));
        $opportunities= DB::select(DB::raw("SELECT * FROM `opportunities` WHERE YEAR(created_at) = '$year' AND contact_id='$contactId'  ORDER BY id DESC"));
        $company=Company::find($companiesId);
        return view('contact/contact_show',compact('contact','meeting','email','liveConversation','voiceMail','phoneCall','note','task','company','opportunities','companiesId'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $userId=Auth::user()->id;
        $latestNote=DB::table('contact_note')->where('contact_id',$contact->id)->orderByDesc('id')->limit('1')->get();
        $company=Company::where('user_id',$userId)->get();
        $tagsArr=DB::select(DB::raw("SELECT GROUP_CONCAT(t.`name`) as tags FROM `tags` t INNER JOIN `tags_contact` tc ON t.`id`=tc.`tags_id` WHERE tc.`contact_id`='$contact->id'"));
        return view('contact/contact_edit',compact('contact','company','latestNote','tagsArr'));
        
    }
    public function contactEditNotAjax(int $id)
    {
        $userId=Auth::user()->id;
        $latestNote=DB::table('contact_note')->where('contact_id',$id)->orderByDesc('id')->limit('1')->get();
        $company=Company::where('user_id',$userId)->get();
        $contact=Contact::find($id);
        $tagsArr=DB::select(DB::raw("SELECT GROUP_CONCAT(t.`name`) as tags FROM `tags` t INNER JOIN `tags_contact` tc ON t.`id`=tc.`tags_id` WHERE tc.`contact_id`='$contact->id'"));
        return view('contact/contact_edit_not_ajax',compact('contact','company','latestNote','tagsArr'));
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
        ]);
        // $request->validate([
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:contacts'],
        // ]);
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
        $tags=json_decode($request->tags);
        if(isset($tags))
        {
            DB::table('tags_contact')->where('contact_id',$id)->delete();
            for ($i=0; $i < count($tags); $i++) { 
                $tagsData=DB::table('tags')->where('user_id',$userId)->where('name',strtolower($tags[$i]->value))->get();
                if(count($tagsData) == 0)
                {
                    $newTagId = DB::table('tags')->insertGetId([
                        'user_id' => $userId,
                        'name' => strtolower($tags[$i]->value),
                        'created_at' => Date("Y-m-d"),
                    ]);
                    DB::table('tags_contact')->insertGetId([
                        'contact_id' => $id,
                        'tags_id' => $newTagId,
                    ]);
                }
                else
                {
                    DB::table('tags_contact')->insertGetId([
                        'contact_id' => $id,
                        'tags_id' => $tagsData[0]->id,
                    ]);
                }
            }
        }
        
        $contact['first_name'] = $request->first_name;
        $contact['last_name'] = $request->last_name;
        $contact['job'] = $request->job;
        $contact['status'] = $request->status;
        $contact['phone_number'] = $request->phone_number;
        $contact['note'] = $request->note;
        $contact['email'] = $request->email;
        $contact['mobile_phone'] = $request->mobile_phone;
        $contact['companies_id'] = $request->company_id;
        $contact['linked_in_url'] = $request->linked_in_url;
        $contact['updated_by'] = Auth::user()->id;
        $contact['updated_at'] = date("Y-m-d");
        $contact->save();
        $companiesId=$contact->companies_id;
        $companies=Company::find($companiesId);
        Opportunities::where('contact_id',$contact->id)->update(['company_id' => $contact->companies_id]);
        $contact['companies_id']=$companies->company_name;
         $status=explode('_',$contact['status']) ;
         $statusnew= ucwords($status[0]);
         $statusnew .=' ';
         $statusnew .=count($status) == "2" ? ucwords($status[1] ) : '';
         $contact['status'] =$statusnew;
         if($request->note_id == '0')
        {
            $contactId=$contact->id;
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
       
        for($i=0; $i < count($request->note_new); $i++)
        {
            if(isset($request->note_new[$i]))
            {
                $contactId=$contact->id;
                $note=$request->note_new[$i];
                $date=Date("Y-m-d H:i:s");
                $firstName=Auth::user()->first_name;
                $lastName=Auth::user()->last_name;
                $fullName=$firstName." ".$lastName;
                DB::insert('insert into contact_note (user_id,contact_id,user_name,note,created_at) values(?,?,?,?,?)',[$userId,$contactId,$fullName,$note,$date]);
            }
        
        }
         if(!$request->ajax())
         {
             return redirect()->back();
         }
        return $contact;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function contactDeleteBulk(Request $request)
    {
        $contactId=json_decode($request->contact_id);
        for ($i=0; $i < count($contactId); $i++) { 
            $data = Contact::find($contactId[$i]);
            DB::table('contact_history')->where('contacts_id',$contactId[$i])->delete();
            DB::table('tags_contact')->where('contact_id',$contactId[$i])->delete();
            DB::table('contact_note')->where('contact_id',$contactId[$i])->delete();
            Opportunities::where('contact_id',$contactId[$i])->delete();
            Task::where('contact_id',$contactId[$i])->delete();
            $data->delete();
        }
        return redirect()->back();
    }
    public function destroy(int $id,Request $request)
    {
        $url=explode("/",url()->previous());
        $data = Contact::find($id);
        DB::table('contact_history')->where('contacts_id',$id)->delete();
        DB::table('contact_note')->where('contact_id',$id)->delete();
        DB::table('tags_contact')->where('contact_id',$id)->delete();
        Task::where('contact_id',$id)->delete();
        Opportunities::where('contact_id',$id)->delete();
        $data->delete();
        if(!$request->ajax())
         {
            if($url[3] == "company")
            {
                return redirect()->back();
            }
            else
            {
                return redirect()->route('contact.index');
            }
         }
        return true;
    }
    public function contactCounter(Request $request)
    {
        $userId=Auth::user()->id;
        $status=$request->status;
       
        // $mytime = Carbon\Carbon::now();
        // $date=$mytime->toDateTimeString();
        $date=Date("Y-m-d H:i:s");
        $contactsId=$request->contacts_id;
        $count=$request->value;
        $this->contactCountUpdate($status,$contactsId,$count,$date);
        DB::insert('insert into contact_history (user_id,contacts_id,status,created_at) values(?,?,?,?)',[$userId,$contactsId,$status,$date]);
        return true;
    }
    public function contactCountUpdate($status,$contactsId,$count,$date)
    {
        if($status == 'phone_call')
        {
            contact::where('id', $contactsId)->update(['phone_call_count' => $count,'phone_call_date'=>$date]);
        }
        elseif($status == 'live_conversation')
        {
            contact::where('id', $contactsId)->update(['live_conversation_count' => $count,'live_conversation_date'=>$date]);
        }
        elseif($status == 'voice_mail')
        {
            contact::where('id', $contactsId)->update(['voice_mail_count' => $count,'voice_mail_date'=>$date]);
        }
        elseif($status == 'email')
        {
            contact::where('id', $contactsId)->update(['email_count' => $count,'email_date'=>$date]);
        }
        elseif($status == 'meeting')
        {
            contact::where('id', $contactsId)->update(['meeting_scheduled_count' => $count,'meeting_scheduled_date'=>$date]);
        }
        return true;
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
    public function contactNoteEdit(int $id)
    {
        $note=DB::table('contact_note')->where('id',$id)->get();
        return view('contact/contact_note_edit',compact('note'));
    }
    public function contactNoteEditSubmit(Request $request)
    {
        DB::table('contact_note')->where('id',$request->note_id)->update(['note' => $request->note]);
        return redirect()->back();

    }
    public function noteDestroy(int $id)
    {
        DB::table('contact_note')->where('id',$id)->delete();
        return redirect()->back();

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
        Excel::import(new ContactImport($request->tags,$request->status), $request->file);

            return redirect()->back();
    }
    public function contactTask(Request $request)
    {
        $contactId=$request->contacts_id;
        return view('contact/contact_task',compact('contactId'));
    }
    public function contactTaskEdit(Request $request)
    {
        $contactId=$request->contacts_id;
        $id=$request->id;
        $task=Task::find($id);
        return view('contact/contact_task_edit',compact('contactId','task'));
    }
    public function contactEmailTemplate(Request $request)
    {
        $userId=Auth::user()->id;
        $contactId=$request->contactId;
        $template=EmailTemplate::where('user_id',$userId)->get();
        return view('contact/contact_email_template',compact('template','contactId'));
    }
    public function getEmailTemplater(Request $request)
    {
        $templateId=$request->template_id;
        $template=EmailTemplate::find($templateId);
        return $template;
    }
    // public function contactStatusBulk(Request $request)
    // {
    //     $userId=Auth::user()->id;
    //     $contactId=$request->contactId;
    //     return view('contact/contact_status_bulk',compact('contactId'));
    // }
    public function contactStatusBulkUpdate(Request $request)
    {
        $userId=Auth::user()->id;
        $contactId=json_decode($request->contact_id);
        for ($i=0; $i < count($contactId); $i++) { 
            if($request->status != '0')
            {
                $contact=Contact::find($contactId[$i]);
                $contact->status=$request->status;
                $contact->save();
            }
            if($request->contact_history != '0')
            {
                $status=$request->contact_history;
                // $mytime = Carbon\Carbon::now();
                // $date=$mytime->toDateTimeString();
                $date=Date("Y-m-d H:i:s");
                $contactsId=$contactId[$i];
                if($status == 'phone_call')
                {
                    $contact=contact::find($contactsId);
                    $count=$contact->phone_call_count;
                }
                elseif($status == 'live_conversation')
                {
                    $contact=contact::find($contactsId);
                    $count=$contact->live_conversation_count;
                }
                elseif($status == 'voice_mail')
                {
                    $contact=contact::find($contactsId);
                    $count=$contact->voice_mail_count;
                }
                elseif($status == 'email')
                {
                    $contact=contact::find($contactsId);
                    $count=$contact->email_count;
                }
                elseif($status == 'meeting')
                {
                    $contact=contact::find($contactsId);
                    $count=$contact->meeting_scheduled_count;
                }
                $count++;
                $this->contactCountUpdate($status,$contactsId,$count,$date);
                DB::insert('insert into contact_history (user_id,contacts_id,status,created_at) values(?,?,?,?)',[$userId,$contactsId,$status,$date]);
            }
            
        }
        return redirect()->back();

    }
    public function contactEmailTemplateSend(Request $request)
    {
        $subject=$request->subject;
        $request->contact_id;
        $body=$request->body;
        $contactId=json_decode($request->contact_id);
        $userId=Auth::user()->id;
        dispatch(new ContactJob($body,$subject,$contactId,$userId))->delay(now()->addSecond(3));
        return redirect()->back();
    }
    public function contactExport(Request $request)
    {
        $contactId=json_decode($request->contact_id);
        return Excel::download(new ExportContact($contactId), 'contact.xlsx');
    }
    public function contactFilter()
    {
        $userId=Auth::user()->id;
        $company=Company::where('user_id',$userId)->get();
        $tagsArr=DB::select(DB::raw("SELECT DISTINCT(t.`id`),t.`name` FROM `tags` t INNER JOIN `tags_contact` tc ON t.`id`=tc.`tags_id` where t.user_id=$userId"));
        return view('contact/contact_filter',compact('company','tagsArr'));
    }
    public function contactOpportunitiesCreate(Request $request)
    {
        $companyId=$request->company_id;
        $contactId=$request->contact_id;
        return view('contact/contact_opportunities_create',compact('companyId','contactId'));

    }
    public function contactOpportunitiesEdit(int $id)
    {
        $userId=Auth::user()->id;
        $opportunities=Opportunities::find($id);
        $latestNote=DB::table('contact_note')->where('contact_id',$opportunities->contact_id)->orderByDesc('id')->limit('1')->get();

        return view('contact/contact_opportunities_edit',compact('opportunities','latestNote'));

    }
    public function contactStatusUpdate(Request $request)
    {
        $conatact=contact::find($request->contacts_id);
        $conatact->status=$request->status;
        $conatact->save();
        return true;
    }
    public function raw($status,$statusCount,$statusDate)
    {
        $contact=DB::select(DB::raw("SELECT 
        id,
          (SELECT 
            COUNT(contacts_id) 
          FROM
            `contact_history` 
          WHERE STATUS = '$status' AND contacts_id = c.id) AS contact_count, 
          (SELECT 
            created_at
          FROM
            `contact_history` 
          WHERE STATUS = '$status' AND contacts_id = c.id ORDER BY id DESC LIMIT 1) AS contact_date
        FROM
          `contacts` c HAVING contact_count != '0'"));
          for ($i=0; $i < count($contact) ; $i++) { 
              $new=contact::where('id', $contact[$i]->id)->update([$statusCount => $contact[$i]->contact_count,$statusDate=>$contact[$i]->contact_date]);
            }
    }
}
