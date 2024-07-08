<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskHistory extends Model
{
    const STATUS_REASSIGNED = 'REASSIGNED';
    const STATUS_COMPLETED  = 'COMPLETED';

    protected $table = 'task_history';
    protected $fillable = ['user_id', 'task_id', 'reason', 'status', 'created_at', 'updated_at'];
}