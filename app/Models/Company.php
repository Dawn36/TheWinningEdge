<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','company_name','street_address','city', 'state', 'zip_code','country',
        'created_at','created_by','updated_at','updated_by'
    ]; 
}
