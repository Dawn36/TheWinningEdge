<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emailTemplate= DB::table('email_templates AS et')
      ->join('users AS u', 'et.user_id', '=', 'u.id')
      ->select(DB::raw('et.*,u.first_name,u.last_name'))
      ->whereNull('u.deleted_at')->where('et.user_id',Auth::user()->id)
      ->orderBy('et.id', 'desc')->get();
        // $emailTemplate=EmailTemplate::with('user')->get();
        return view('email-template/email_template_index',compact('emailTemplate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('email-template/email_template_create');
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
            'template_name' => ['required'],
            'subject' => ['required'],
            'body' => ['required'],
        ]);
        $data = EmailTemplate::create([
            'template_name' => $request->template_name,
            'subject' => $request->subject,
            'body' => $request->body,
            'user_id'=>Auth::user()->id,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(EmailTemplate $emailTemplate)
    {
        return view('email-template/email_template_show',compact('emailTemplate'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailTemplate $emailTemplate)
    {
        return view('email-template/email_template_edit',compact('emailTemplate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,int $id)
    {
        $request->validate([
            'template_name' => ['required'],
            'subject' => ['required'],
            'body' => ['required'],
        ]);
        $adds = EmailTemplate::find($id);
        $adds['template_name'] = $request->template_name;
        $adds['subject'] = $request->subject;
        $adds['body'] = $request->body;
        $adds['updated_by'] = Auth::user()->id;
        $adds['updated_at'] = date("Y-m-d");
        $adds->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = EmailTemplate::find($id);
        $data->delete();
        return redirect()->back();
    }
}
