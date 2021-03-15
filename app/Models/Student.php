<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

     protected $fillable = [
        'name', 'email', 'password','fname','image','class_id','group_id','section_id','session_id','gender','mobile',
    ];
}
