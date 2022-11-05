<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','first_name','last_name','profile_img', 'job', 'phone_number','email',
        'updated_by','created_by','mobile_phone','companies_id','linked_in_url','status','tags','note'
    ]; 
}
