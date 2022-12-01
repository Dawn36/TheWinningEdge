<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunities extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_id','company_id','status','contract_amount','duration', 'path','size','file','updated_by','created_by','user_id','file_name','note'
    ];

}
