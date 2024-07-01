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

    const STATUS_PREVIEW = 'PREVIEW';
    const STATUS_ACCEPTED = 'ACCEPTED';
    const STATUS_REJECTED = 'REJECTED';
    const STATUS_PENDING = 'PENDING';
    const STATUS_ASSIGNED = 'ASSIGNED';
    const STATUS_COMPLETED = 'COMPLETED';
    const STATUS_RETIRE = 'RETIRE';
    
    protected $fillable = [
        'master_id',
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
        'question',
        'answer',
        'word_count',
        'actual_length',
        'words_written',
        'score',
        'comments',
        'created_by',
        'deadline_date_time',
        'input_type',
        'unique_group_id',
        'isDeadlineMet'
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
    public function college(){
      return $this->belongsTo(\App\Models\Colleges::class,'college_id')->Activated();
    }

    // Define the relationship with the Subject model
    public function subject()
    {
        return $this->belongsTo(\App\Models\Subject::class, 'subject_id')->Activated();
    }

    // Define the relationship with the Course model
    public function course()
    {
        return $this->belongsTo(\App\Models\SubjectCategory::class, 'course_id')->Activated();
    }

    // Define the relationship with the CourseCode model
    public function courseCode()
    {
        return $this->belongsTo(\App\Models\CourseCode::class, 'course_code_id')->Activated();
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

    public function masters()
    {
        return $this->hasMany(MastersUsers::class, 'master_id', 'master_id');
    }
}

