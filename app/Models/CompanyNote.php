<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyNote extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','companies_id','note','created_at', 'updated_at'
    ]; 
}
