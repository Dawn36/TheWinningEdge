<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId=Auth::user()->id;
        $task=DB::select(DB::raw("SELECT t.*,cc.`company_name`,c.`first_name`,c.`last_name`,c.`job`,c.`email`,c.`phone_number`,c.`mobile_phone`,c.`status` AS contact_status,c.`id` AS contact_id FROM `tasks` t INNER JOIN `contacts` c ON t.`contact_id`=c.`id` LEFT JOIN `companies` cc ON cc.`id`=c.`companies_id` where t.user_id='$userId' AND t.task_status != 'completed' Order by c.`id` desc"));
        
        return view('task/task_index',compact('task'));
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
        return view('task/task_create',compact('contact'));
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
            'description' => ['required'],
        ]);
        $user = Task::create([
            'user_id' => Auth::user()->id,
            'contact_id' => $request->contact_id,
            'description'=>$request->description,
            'task_date'=>date('Y-m-d',strtotime($request->task_date)),
            'task_status'=>$request->task_status,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $userId=Auth::user()->id;
        $task=Task::find($id);
        $contact=Contact::where('user_id',$userId)->get();
        return view('task/task_edit',compact('contact','task'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'description' => ['required'],
        ]);
        $task=Task::find($id);
        $task['contact_id']=$request->contact_id;
        $task['description']=$request->description;
        $task['task_date']=date('Y-m-d',strtotime($request->task_date));
        $task['task_status']=$request->task_status;
        $task['updated_at']=date("Y-m-d h:i:s");
        $task['updated_by']=Auth::user()->id;
        $task->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Task::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function taskStatusUpdate(Request $request)
    {
        $status=$request->status;
        $id=$request->contacts_id;
        $task=Task::find($id);
        $task->task_status=strtolower($status);
        $task->save();
        return true;
    }
}
