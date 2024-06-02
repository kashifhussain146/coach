<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ModulesData extends Model
{
    use HasFactory;
    protected $table = 'modules_data';
    protected $fillable = ['id','module_id','title','model_name'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at'=>'datetime',
    ];
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

    public function modelable()
    {
        return $this->morphTo(__FUNCTION__, 'model_name', 'category');
    }
    

}
