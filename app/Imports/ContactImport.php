<?php

namespace App\Imports;

use App\Models\Contact;
use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;


class ContactImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
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
            ]);
            $companyId=$company->id;
        }
        if(!Contact::where('email', '=', $row['email_address'])->where('user_id',$userId)->exists()) {
        $contact= new Contact([
            "last_name" => $row['last_name'],
            "first_name" => $row['first_name'],
            "job" => $row['job_title'],
            "status" => 'current_client',
            "phone_number" => $row['direct_phone_number'],
            "email" => $row['email_address'],
            "mobile_phone" => $row['mobile_phone'],
            "companies_id" => $companyId,
            "linked_in_url" => $row['linkedin_contact_profile_url'],
            "user_id" => $userId,
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
