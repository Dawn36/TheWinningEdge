<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId=Auth::user()->id;
        $company=Company::where('user_id',$userId)->orderby('id','desc')->get();
        return view('company/company_index' , compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company/company_create');
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
            'company_name' => ['required'],
            
        ]);
        // 'street_address' => ['required'],
        //     'city' => ['required'],
        //     'state' => ['required'],
        //     'zip_code' => ['required'],
        //     'country' => ['required'],
        $data = Company::create([
            'company_name' => $request->company_name,
            'street_address' => $request->street_address,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
            'user_id'=>Auth::user()->id,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $companyId=$company->id;
        $contact=Contact::where('companies_id',$companyId)->get();
        return view('company/company_show',compact('company','contact'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $company=Company::find($id);
        return view('company/company_edit',compact('company'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'company_name' => ['required'],
          
        ]);
        // 'street_address' => ['required'],
        // 'city' => ['required'],
        // 'state' => ['required'],
        // 'zip_code' => ['required'],
        // 'country' => ['required'],
        $company=Company::find($id);
        $company['company_name']=$request->company_name;
        $company['street_address']=$request->street_address;
        $company['city']=$request->city;
        $company['state']=$request->state;
        $company['zip_code']=$request->zip_code;
        $company['country']=$request->country;
        $company['updated_at']=date("Y-m-d h:i:s");
        $company['updated_by']=Auth::user()->id;
        $company->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Company::find($id);
        $data->delete();
        return redirect()->back();
    }
}
