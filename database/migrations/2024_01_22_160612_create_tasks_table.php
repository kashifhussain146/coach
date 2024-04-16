<?php

// database/migrations/{timestamp}_create_tasks_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('college_id');
            $table->string('subject_id');
            $table->string('course_id');
            $table->string('course_code_id');
            $table->string('task_type');
            $table->string('assignment_type')->nullable();
            $table->string('mcq_essay_mixed')->nullable();
            $table->string('mcq_separately')->nullable();
            $table->string('essay_upload')->nullable();
            $table->string('mixed_upload')->nullable();
            $table->integer('word_count')->nullable();
            $table->integer('peer_word_count')->nullable();
            $table->integer('actual_length')->nullable();
            $table->integer('words_written');
            $table->integer('score')->nullable();
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
