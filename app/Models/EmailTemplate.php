<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class EmailTemplate extends Model
{
    use HasFactory;
    protected $fillable = [
        'template_name','subject','body','created_at', 'created_by', 'updated_at','updated_by','user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
