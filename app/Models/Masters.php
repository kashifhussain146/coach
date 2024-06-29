<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masters extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
	 protected $table = 'master__list';
    protected $fillable = ['emailsubject', 'url', 'username', 'password', 'collegename', 'coursecode', 'coursename', 'subjectname', 'startdate', 'enddate', 'grade'];


    // Define the relationship with the College model
    public function college(){
      return $this->belongsTo(\App\Models\Colleges::class,'collegename')->Activated();
    }

    // Define the relationship with the Subject model
    public function subject()
    {
        return $this->belongsTo(\App\Models\Subject::class, 'subjectname')->Activated();
    }

    // Define the relationship with the Course model
    public function course()
    {
        return $this->belongsTo(\App\Models\SubjectCategory::class, 'coursename')->Activated();
    }

    // Define the relationship with the CourseCode model
    public function courseCode()
    {
        return $this->belongsTo(\App\Models\CourseCode::class, 'coursecode')->Activated();
    }

    public function masters()
    {
        return $this->hasMany(MastersUsers::class, 'master_id', 'id');
    }
}
