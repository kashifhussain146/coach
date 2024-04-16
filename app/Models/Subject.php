<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 protected $table = 'subject';
     protected $fillable = ['subject_name', 'subject_desc', 'subject_category', 'status', 'created_at', 'updated_at'];

     public function category(){
        return $this->belongsTo(SubjectCategory::class,'subject_category','id');
     }

   public function scopeActivated($query){
      return  $query->where('status','Y');
   }
}
