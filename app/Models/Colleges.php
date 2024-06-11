<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colleges extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'college';
   protected $fillable = ['name', 'status'];
    public $timestamps = false;
   
     public function scopeActivated($query){
        return  $query->where('status','Y');
     }
}
