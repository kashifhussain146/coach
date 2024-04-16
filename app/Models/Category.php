<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 protected $table = 'category';
     protected $fillable = ['id', 'language_id', 'industry_id', 'title', 'slug', 'image', 'banner_image', 'note', 'status', 'icon', 'link', 'sort_order', 'description', 'created_at', 'updated_at'];

}
