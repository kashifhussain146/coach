<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MastersUsers extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
	protected $table = 'masters_list_users';
    protected $fillable = ['master_id', 'user_id','created_at', 'update_at'];



}
