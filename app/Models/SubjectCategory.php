<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 protected $table = 'subject_category';
     protected $fillable = ['category_name', 'category_code', 'category_dec', 'status'];

     public function scopeActivated($query){
        return  $query->where('status','Y');
     }

   public function subjects(){
      return $this->hasMany(Subject::class,'subject_category','id');
   }

   public function questions(){
      return $this->hasMany(Questions::class,'id','subject_category')->Activated();
   }

   public function scopeTopicsData($query){
      $query->select('id','category_name')
            ->whereHas('subjects')
            ->Activated()
            ->with(['subjects'=>function($query){$query->select('id','subject_name','subject_category');}])
            ->orderBy('category_name');
   }
}
