<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'question';
   protected $fillable = ['question','expiry_date', 'collegeid', 'coursesid', 'score', 'visiblity', 'type', 'startdatetime', 'enddatetime', 'num_words', 'answer', 'price', 'subject_category', 'subject', 'file_name', 'answer_file', 'addedby', 'answerstatus', 'status', 'views_count', 'added_date'];

   public function category(){
        return $this->belongsTo(SubjectCategory::class,'subject_category')->Activated();
   }

   public function subjects(){
      return $this->belongsTo(Subject::class,'subject')->Activated();
   }

   public function college(){
      return $this->belongsTo(Colleges::class,'collegeid')->Activated();
   }

   public function course_code(){
      return $this->belongsTo(CourseCode::class,'coursesid')->Activated();
   }

   public function scopeActivated($query){
      return  $query->where('status','Y');
   }

   public function scopeSubjectCategoryFilter($query,$subject_category){
      return  $query->where('subject_category',$subject_category);
   }

   public function scopeSubjectFilter($query,$subject){
      return  $query->where('subject',$subject);
   }

   public function SubjectCodeFilter($query,$coursesid){
      return  $query->where('coursesid',$coursesid);
   }

   public function scopeSearchFilter($query,$search){
      return   $query->where(function($query1) use ($search){
                  $query1->where('question','LIKE','%'.$search.'%')->orwhere('answer','LIKE','%'.$search.'%');
               });
   }
   
}
