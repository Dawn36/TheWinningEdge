<?php

namespace App\Exports;

use App\Models\contact;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportContact implements FromCollection, WithHeadings
{
    protected  $contactId;
    /**body
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($contactId)
    {
        $this->contactId=$contactId;
    }


    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'Job Title',
            'Direct Phone Number',
            'Email Address',
            'Mobile phone',
            'Company Name',
            'LinkedIn Contact Profile URL',
            'Website',
            'Company Street Address',
            'Company City',
            'Company State',
            'Company Zip Code',
            'Company Country',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $contactId=$this->contactId;
        return DB::table('contacts AS c')
        ->join('companies AS cc', 'cc.id', '=', 'c.companies_id')->whereIn('c.id',$contactId)
        ->select('c.first_name','c.last_name','c.job','c.phone_number','c.email','c.mobile_phone','cc.company_name','c.linked_in_url'
        ,'cc.website','cc.street_address','cc.city','cc.state','cc.zip_code','cc.country')
        ->get();
    }
}
