<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Role extends Model
{


 protected $fillable = [
        'role_name',
    ];


     public function user(){
    	return $this->hasMany('App\Models\User');
    }
}
