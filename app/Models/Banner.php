<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
	 protected $table = 'banner';
    protected $fillable = ['id', 'title', 'description', 'web_banner', 'app_banner', 'link', 'status'];
}
