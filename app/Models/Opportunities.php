<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunities extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','company_name','contract_amount','duration', 'path','size','file','updated_by','created_by','user_id','file_name',
    ];

}
