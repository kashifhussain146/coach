<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    protected $table = 'modules';
    public function modules_data()
    {
        return $this->hasMany('App\Models\ModulesData','module_id');
    }

    public function modules_data_single()
    {
        return $this->hasOne('App\Models\ModulesData','module_id');
    }
}
