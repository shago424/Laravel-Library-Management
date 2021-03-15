<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    use HasFactory;
     protected $fillable = [
        'class_name',
        
    ];

      public function student(){
    	return $this->hasMany('App\Models\User');
    }
}
