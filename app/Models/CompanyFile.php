<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','companies_id','path','ext', 'size', 'file_name', 'created_at', 'updated_at'
    ]; 
}
