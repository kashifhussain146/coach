<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModulesData extends Model
{
    protected $table = 'modules_data';
    protected $fillable = ['id','module_id','title'];
    public function results()
    {
        return $this->hasMany('App\Models\ModulesData','category');
    }

    public function category_data()
    {
        return $this->hasOne('App\Models\ModulesData','id','category');
    }

    public function count()
    {
        return $this->results()->count();
    }

}
