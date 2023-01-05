<?php

namespace App\Imports;

use App\Models\Contact;
use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ContactImport implements ToModel, WithHeadingRow
{
    protected $tag;
    protected $status;

    public function __construct($tag,$status) 
    {
        $this->tag = $tag;
        $this->status = $status;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $userId=Auth::user()->id;
        $tags=$this->tag;
        $status=$this->status;
        $tags=json_decode($tags);
        
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
        $contact=Contact::create([
            "last_name" => $row['last_name'],
            "first_name" => $row['first_name'],
            "job" => $row['job_title'],
            "phone_number" => $row['direct_phone_number'],
            "email" => $row['email_address'],
            "mobile_phone" => $row['mobile_phone'],
            "status"=>$status,
            "companies_id" => $companyId,
            "linked_in_url" => $row['linkedin_contact_profile_url'],
            "user_id" => $userId,
        ]);
        $contactId=$contact->id;
        $this->tags($tags,$contactId,$userId);
        return $contact;
    }
    elseif($row['email_address'] == null)
    {
        $contact=Contact::create([
            "last_name" => $row['last_name'],
            "first_name" => $row['first_name'],
            "job" => $row['job_title'],
            "phone_number" => $row['direct_phone_number'],
            "mobile_phone" => $row['mobile_phone'],
            "status"=>$status,
            "companies_id" => $companyId,
            "linked_in_url" => $row['linkedin_contact_profile_url'],
            "user_id" => $userId,
        ]);
        $contactId=$contact->id;
        $this->tags($tags,$contactId,$userId);
        return $contact;
    }
        
    }
    public function rules(): array
    {
        return [
            '1' => 'unique:users,email',
        ];
    }
    public function tags($tags,$contactId,$userId)
    {
        if(isset($tags))
        {
            DB::table('tags_contact')->where('contact_id',$contactId)->delete();
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
                        'contact_id' => $contactId,
                        'tags_id' => $newTagId,
                    ]);
                }
                else
                {
                    DB::table('tags_contact')->insertGetId([
                        'contact_id' => $contactId,
                        'tags_id' => $tagsData[0]->id,
                    ]);
                }
            }
        }
        return true;
    }
}
