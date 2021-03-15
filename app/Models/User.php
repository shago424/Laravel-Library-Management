<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function class_name(){
        return $this->belongsTo(ClassName::class, 'class_id', 'id');
      }

      public function group_name(){
        return $this->belongsTo(Group::class, 'group_id', 'id');
      }
       public function session_year(){
        return $this->belongsTo(Session::class, 'session_id', 'id');
      }
      public function section_name(){
        return $this->belongsTo(Section::class, 'section_id', 'id');
      }
      public function issuebook(){
        return $this->belongsTo(IssueBook::class, 'st_id', 'id');
      }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile','address', 'dob', 'image','password','role_id','edu','gender','course','code','class_id','section_id','session_id','group_id','class_roll',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role(){
        return $this->belongsTo('App\Model\Role');
    } 


    public function class(){
        return $this->belongsTo('App\Models\ClassName');
    } 


}
