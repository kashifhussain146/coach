<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 protected $table = 'role_has_permissions';
     protected $fillable = ['name', 'status'];

     public function scopeActivated($query){
        return  $query->where('status','Y');
     }
}
