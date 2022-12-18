<?php

namespace App\Http\Controllers;

use App\Models\CompanyNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyNoteController extends Controller
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
    public function create(Request $request)
    {
        $companyId= $request->companyId;
        return view('company-note/company_note_create',compact('companyId'));
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
            'note' => ['required'],
            
        ]);
       
        $data = CompanyNote::create([
            'note' => $request->note,
            'companies_id' => $request->company_id,
            'user_id'=>Auth::user()->id,
            'created_at' => date("Y-m-d h:i:s"),
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyNote  $companyNote
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyNote $companyNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyNote  $companyNote
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyNote $companyNote)
    {
        return view('company-note/company_note_edit',compact('companyNote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyNote  $companyNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'note' => ['required'],
            
        ]);
        $companyNote=CompanyNote::find($id);
        $companyNote['note']=$request->note;
        $companyNote->save();
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyNote  $companyNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = CompanyNote::find($id);
        $data->delete();
        return redirect()->back();
    }
}
