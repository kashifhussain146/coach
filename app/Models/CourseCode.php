<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCode extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  protected $table = 'cousecode';
     protected $fillable = ['code', 'status'];
     public $timestamps = false;

     public function scopeActivated($query){
        return  $query->where('status','Y');
     }
}
