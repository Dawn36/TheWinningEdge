<?php

namespace App\Imports;

use App\Models\Contact;
use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;


class ContactImport implements ToModel, WithHeadingRow
{
    protected $tag;

    public function __construct($tag) 
    {
        $this->tag = $tag;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $tags=$this->tag;
        $tagsData=array();
        $tags=json_decode($tags);
        if(isset($tags))
        {
            for ($i=0; $i < count($tags); $i++) { 
                array_push($tagsData,$tags[$i]->value);
            }
        }
        $tagsData=implode(',',$tagsData);
        $userId=Auth::user()->id;
        $company=Company::where('company_name',$row['company_name'])->where('user_id',$userId)->get();
        if(count($company) > 0)
        {
        $companyId=$company[0]->id;
        }
        if(count($company) == 0)
        {
            $company=Company::create([
                'user_id' => $userId,
                'company_name' => $row['company_name'],
                'street_address'=>$row['company_street_address'],
                'city'=>$row['company_city'],
                'state'=>$row['company_state'],
                'zip_code'=>$row['company_zip_code'],
                'country'=>$row['company_country'],
                'created_at' => date("Y-m-d h:i:s"),
                'created_by' => Auth::user()->id,
                'website'=>$row['website'],
            ]);
            $companyId=$company->id;
        }
        if(!Contact::where('email', '=', $row['email_address'])->where('user_id',$userId)->exists()) {
        $contact= new Contact([
            "last_name" => $row['last_name'],
            "first_name" => $row['first_name'],
            "job" => $row['job_title'],
            "phone_number" => $row['direct_phone_number'],
            "email" => $row['email_address'],
            "mobile_phone" => $row['mobile_phone'],
            "companies_id" => $companyId,
            "linked_in_url" => $row['linkedin_contact_profile_url'],
            "user_id" => $userId,
            "tags" =>$tagsData,
        ]);

        return $contact;

    }
        
    }
    public function rules(): array
    {
        return [
            '1' => 'unique:users,email',
        ];
    }
}
