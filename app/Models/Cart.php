<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [ 'user_id', 'question_id','is_checkout', 'subject_category_id', 'subject_id','price','questions'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Questions::class,'question_id','id')->Activated();
    }

    public function category(){
            return $this->belongsTo(SubjectCategory::class,'subject_category_id','id')->Activated();
    }

    public function subjects(){
        return $this->belongsTo(Subject::class,'subject_id','id')->Activated();
    }
    
}
