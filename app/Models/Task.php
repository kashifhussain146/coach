<?php

// app/Models/Task.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date_time',
        'end_date_time',
        'college_id',
        'subject_id',
        'course_id',
        'course_code_id',
        'task_type',
        'assignment_type',
        'mcq_essay_mixed',
        'questions_file',
        'answers_file',
        'word_count',
        'actual_length',
        'words_written',
        'score',
        'comments',
        'created_by',
        'deadline_date_time',
        'input_type',
        'unique_group_id'
    ];


    public function details()
    {
        return $this->hasMany(TaskDetail::class);
    }

    // Define the relationship with the College model
    public function createdBy()
    {
        return $this->belongsTo(Admins::class, 'created_by');
    }

    // Define the relationship with the College model
    public function college()
    {
        return $this->belongsTo(\App\Models\ModulesData::class, 'college_id');
    }

    // Define the relationship with the Subject model
    public function subject()
    {
        return $this->belongsTo(\App\Models\ModulesData::class, 'subject_id');
    }

    // Define the relationship with the Course model
    public function course()
    {
        return $this->belongsTo(\App\Models\ModulesData::class, 'course_id');
    }

    // Define the relationship with the CourseCode model
    public function courseCode()
    {
        return $this->belongsTo(\App\Models\ModulesData::class, 'course_code_id');
    }


    /**
     * Get all of the proposals for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proposals(): BelongsTo
    {
        return $this->belongsTo(Proposals::class, 'id', 'task_id');
    }

    /**
     * Get all of the comments for the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function freelancers(): HasMany
    {
        return $this->hasMany(Proposals::class, 'task_id', 'id');
    }
}

