<?php

namespace App\Http\Controllers;

use App\Models\CompanyFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class CompanyFileController extends Controller
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
        return view('company-file/company_file_create',compact('companyId'));
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
        if ($request->hasFile('file')) {
            for ($i=0; $i < count($request->file('file')) ; $i++) { 
            $destinationPath = base_path('public/uploads/companyFile/' . $userId);
            $file = $request->file('file');
            $filename = date('YmdHi') . $file[$i]->getClientOriginalName();
            $size = $file[$i]->getSize();
            $file[$i]->move($destinationPath, $filename);
            $path = "uploads/companyFile/" .$userId . "/". $filename;
           
            CompanyFile::create([
                'path' => $path,
                'ext' => $file[$i]->getClientOriginalExtension(),
                'size' => $size,
                'file_name' => $file[$i]->getClientOriginalName(),
                'companies_id' => $request->company_id,
                'user_id'=>Auth::user()->id,
                'created_at' => date("Y-m-d h:i:s"),
            ]);
        }

        }
       
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyFile  $companyFile
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyFile $companyFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyFile  $companyFile
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyFile $companyFile)
    {
        return view('company-file/company_file_edit',compact('companyFile'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyFile  $companyFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $userId=Auth::user()->id;
        $companyFile=CompanyFile::find($id);
        if ($request->hasFile('file')) {
            File::delete($companyFile->path);
            $destinationPath = base_path('public/uploads/companyFile/' . $userId);
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $size = $file->getSize();
            $file->move($destinationPath, $filename);
            $path = "uploads/companyFile/" .$userId . "/". $filename;
            $companyFile['file_name'] = $file->getClientOriginalName();
            $companyFile['size'] = $size;
            $companyFile['path'] = $path;
            $companyFile['ext'] = $file->getClientOriginalExtension();
        }
        $companyFile->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyFile  $companyFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $companyFile=CompanyFile::find($id);
        File::delete($companyFile->path);
        $companyFile->delete();
        return redirect()->back();
    }
}
