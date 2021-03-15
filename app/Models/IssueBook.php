<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueBook extends Model
{
    use HasFactory;

     protected $fillable = [
        'book_id','st_id','issue_date','issue_quantity','return_date'
        
    ];

    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
      }

      public function student(){
        return $this->belongsTo(User::class, 'st_id', 'id');
      }

      public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
      }

       public function book(){
        return $this->belongsTo(Book::class, 'book_id', 'id');
      }
}
