<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','description','status','created_at','updated_at',
    ];

}
