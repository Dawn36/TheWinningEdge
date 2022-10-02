<?php

namespace App\Imports;

use App\Models\Contact;
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
        if(!Contact::where('email', '=', $row['email_address'])->exists()) {
        return new Contact([
            "last_name" => $row['last_name'],
            "first_name" => $row['first_name'],
            "job" => $row['job_title'],
            "status" => 'current_client',
            "phone_number" => $row['direct_phone_number'],
            "email" => $row['email_address'],
            "mobile_phone" => $row['mobile_phone'],
            "company_name" => $row['company_name'],
            "linked_in_url" => $row['linkedin_contact_profile_url'],
            "user_id" => $userId,
        ]);
    }
        
    }
    public function rules(): array
    {
        return [
            '1' => 'unique:users,email',
        ];
    }
}
