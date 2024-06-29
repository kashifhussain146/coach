@extends('admin.layouts.app')
@section('title')
    <title>{{ $title }}</title>
@stop

@section('inlinecss')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <style>
        .typeahead {
            width: 100% !important;
            position: unset !important;
        }

        #FreeLancerDiv .select2-container {
            width: 100% !important;
        }

        .select2-selection__choice__display {
            color: black !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            color: black;
            padding-left: 29px;
            padding-right: 11px;
        }
    </style>

@stop

@section('breadcrum')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }} </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }} </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')

    <div class="content-header">
        <div class="side-app">
            <div class="col-lg-12">

                @if ($errors->all())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>
                    <div class="card-body">
                        <form id="submitForm" enctype="multipart/form-data" method="post"
                            action="{{ route('tasks-update', $task->id) }}">
                            {{ csrf_field() }}


                            <div class="form-group">
                                <label>Master List :</label>
                                <select class="form-control" id="master_id" name="master_id">
                                    <option data-master='' value="">Select</option>
                                    @foreach ($masterList as $item)
                                        <option @if ($item->id == $task->master_id) selected @endif
                                            data-master='{!! json_encode($item) !!}' value="{{ $item->id }}">
                                            {{ $item->emailsubject }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if (Auth()->user()->hasRole('Admin') || Auth()->user()->hasRole('Sub Admin'))



                                {{-- <div class="form-group">
                                <label for="created_by">Employees / Freelancers:</label>
                                <select  class="form-control select2" id="created_by" name="created_by">
                                    <option value="">Select</option>
                                    @foreach ($employees as $item)
                                    <option @if ($item->id == $task->created_by) selected @endif value="{{$item->id}}">{{$item->name}} ({{$item->roles()->first()->name}})  </option>                                        
                                    @endforeach
                                </select>
                            </div> --}}

                                <div id="rolesData">
                                    <div class="form-group" id="EmployeeDiv">
                                        <label for="created_by">Employees</label>
                                        <select class="form-control " id="employees" multiple name="employees[]">
                                            @foreach ($employees as $item)
                                                @if ($item->roles()->first()->name == 'Employee')
                                                    <option @if (in_array($item->id, $task->freelancers()->pluck('user_id')->toArray())) selected @endif
                                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <p class="row  pt-2" style="font-size: 12px;">
                                            &nbsp;&nbsp;&nbsp; <a class="p-1 nav-link btn btn-sm btn-primary"
                                                id="selectAllemployees">Check All</a>&nbsp;&nbsp;
                                            <a class="p-1 nav-link btn btn-sm btn-primary" id="uncheckAllemployees">UnCheck
                                                All</a>
                                        </p>
                                    </div>

                                    <div class="form-group" id="FreelancerDiv">
                                        <label for="created_by">Freelancers</label>
                                        <select class="form-control " id="freelancers" multiple name="freelancers[]">
                                            @foreach ($employees as $item)
                                                @if ($item->roles()->first()->name == 'Free Lancer')
                                                    <option @if (in_array($item->id, $task->freelancers()->pluck('user_id')->toArray())) selected @endif
                                                        value="{{ $item->id }}">{{ $item->name }} </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <p class="row pt-2" style="font-size: 12px;">
                                            &nbsp;&nbsp;<a class="p-1 nav-link btn btn-sm btn-primary"
                                                id="selectAllfreelancers">Check All</a>&nbsp;&nbsp;
                                            <a class="p-1 nav-link btn btn-sm btn-primary"
                                                id="uncheckAllfreelancers">UnCheck All</a>
                                        </p>
                                    </div>

                                </div>

                            @endif

                            <div class="form-group">
                                <label for="deadline_date_time">Deadline Date: </label>
                                <input type="text" autocomplete="off" class="form-control" id="deadline_date_time"
                                    name="deadline_date_time"
                                    value="{{ $task->deadline_date_time != '' ? date('Y-m-d H:i', strtotime($task->deadline_date_time)) : '' }}">
                            </div>

                            <div class="form-group">
                                <label for="start_date_time">Start Date & Time: </label>
                                <input type="text" autocomplete="off" class="form-control" id="start_date_time"
                                    name="start_date_time"
                                    value="{{ $task->start_date_time != '' ? $task->start_date_time : '' }}">
                            </div>

                            <div class="form-group">
                                <label for="end_date_time">End Date & Time: </label>
                                <input type="text" autocomplete="off" readonly class="form-control" id="end_date_time"
                                    name="end_date_time"
                                    value="{{ $task->end_date_time != '' ? $task->end_date_time : '' }}" />
                            </div>



                            <div class="form-group">
                                <label for="college_name">College Name:</label>
                                <input type="text" name="college_id" id="college_id" class="form-control"
                                    value="{{ $task->college->name }}" />
                            </div>

                            <div class="form-group">
                                <label for="course_name">Course Name:</label>
                                <input type="text" name="course_id" id="course_id" class="form-control"
                                    value="{{ $task->course->category_name }}" />
                            </div>

                            <div class="form-group">
                                <label for="subject">Subject:</label>
                                <input type="text" name="subject_id" id="subject_id" class="form-control"
                                    value="{{ $task->subject->subject_name }}" />
                            </div>




                            <div class="form-group">
                                <label for="course_code">Course Code:</label>
                                <input type="text" name="course_code_id" id="course_code_id" class="form-control"
                                    value="{{ $task->courseCode->code }}" />
                            </div>

                            @php

                                $unique_group_id_1 = '';
                                $unique_group_id_2 = '';
                                $unique_group_id_3 = '';
                                $unique_group_id_4 = '';
                                $unique_group_id_5 = '';

                                $unique_group_id = explode('_', $task->unique_group_id);
                                if (isset($unique_group_id)) {
                                    $unique_group_id_1 = $unique_group_id[0];
                                    $unique_group_id_2 = $unique_group_id[1];
                                    $unique_group_id_3 = $unique_group_id[2];
                                    $unique_group_id_4 = $unique_group_id[3];
                                    $unique_group_id_5 = str_replace(
                                        '_',
                                        '-',
                                        $unique_group_id[4] . '-' . $unique_group_id[5] . '-' . $unique_group_id[6],
                                    );
                                }
                            @endphp
                            <div class="form-group">
                                <label for="course_code">Task Group ID: <span class="text-danger">*</span> </label>
                                <div class="row">
                                    <div class="col-md-1">
                                        <input type="text" name="unique_group_id_1" readonly id="unique_group_id_1"
                                            value="{{ $unique_group_id_1 }}_" class="form-control" />
                                    </div>-
                                    <div class="col-md-1">
                                        <input type="text" name="unique_group_id_2" readonly id="unique_group_id_2"
                                            value="{{ $unique_group_id_2 }}_" class="form-control" />
                                    </div>-
                                    <div class="col-md-3">
                                        <input type="text" name="unique_group_id_3" id="unique_group_id_3"
                                            value="{{ $unique_group_id_3 }}" required class="form-control" />
                                    </div>-

                                    <div class="col-md-1">
                                        <input type="text" name="unique_group_id_4" readonly id="unique_group_id_4"
                                            value="_{{ $unique_group_id_4 }}_" class="form-control" />
                                    </div>-
                                    <div class="col-md-2">
                                        <input type="text" name="unique_group_id_5" readonly id="unique_group_id_5"
                                            value="{{ date('d_m_Y', strtotime($unique_group_id_5)) }}"
                                            class="form-control" />
                                    </div>

                                </div>

                            </div>

                            <div class="form-group">
                                <label for="task_type">Task Type:</label>
                                <select id="task_type" class="form-control" name="task_type" required>
                                    <option value="">Select</option>
                                    <!-- Add 'selected' attribute to the option matching the task's type -->
                                    <option value="assignment_homework"
                                        {{ $task->task_type == 'assignment_homework' ? 'selected' : '' }}>Assignment /
                                        Homework</option>
                                    <option value="discussion_initial_post"
                                        {{ $task->task_type == 'discussion_initial_post' ? 'selected' : '' }}>Discussion
                                        (Initial Post)</option>
                                    <option value="quiz_exam" {{ $task->task_type == 'quiz_exam' ? 'selected' : '' }}>Quiz
                                        / Exam</option>
                                    <option value="peer_responses"
                                        {{ $task->task_type == 'peer_responses' ? 'selected' : '' }}>Peer Responses
                                    </option>
                                </select>
                            </div>

                            <!-- Additional fields based on task type -->
                            <!-- Assignment / Homework -->
                            <div id="assignment_homework_fields"
                                style="{{ $task->task_type == 'assignment_homework' ? 'display: block;' : 'display: none;' }}">
                                <!-- Populate assignment type select with the task's assignment type -->

                                <div class="form-group">
                                    <label for="assignment_type">Assignment Type:</label>

                                    <select class="form-control" id="assignment_type" name="assignment_type">
                                        <option value="">Select</option>
                                        <option value="research_paper"
                                            {{ $task->assignment_type == 'research_paper' ? 'selected' : '' }}>Research
                                            Paper</option>
                                        <option value="term_project"
                                            {{ $task->assignment_type == 'term_project' ? 'selected' : '' }}>Term Project
                                        </option>
                                        <option value="group_work"
                                            {{ $task->assignment_type == 'group_work' ? 'selected' : '' }}>Group Work
                                        </option>
                                        <option value="final_project"
                                            {{ $task->assignment_type == 'final_project' ? 'selected' : '' }}>Final Project
                                        </option>
                                        <option value="final_paper"
                                            {{ $task->assignment_type == 'final_paper' ? 'selected' : '' }}>Final Paper
                                        </option>
                                        <option value="presentation"
                                            {{ $task->assignment_type == 'presentation' ? 'selected' : '' }}>Presentation
                                        </option>
                                    </select>
                                </div>

                            </div>


                            <!-- MCQ / Essay / Mixed -->
                            <div id="quiz_exam_fields"
                                style="{{ $task->task_type == 'quiz_exam' ? 'display: block;' : 'display: none;' }}">

                                <div class="form-group">
                                    <label for="mcq_essay_mixed">MCQ / Essay / Mixed:</label>
                                    <select class="form-control" id="mcq_essay_mixed" name="mcq_essay_mixed">
                                        <option value="">Select</option>
                                        <option value="mcq" {{ $task->mcq_essay_mixed == 'mcq' ? 'selected' : '' }}>MCQ
                                        </option>
                                        <option value="essay" {{ $task->mcq_essay_mixed == 'essay' ? 'selected' : '' }}>
                                            Essay</option>
                                        <option value="mixed" {{ $task->mcq_essay_mixed == 'mixed' ? 'selected' : '' }}>
                                            Mixed</option>
                                    </select>
                                </div>

                            </div>


                            <!-- Additional fields based on MCQ / Essay / Mixed -->


                            <div class="form-group d-none">
                                <label>Choose Upload Type:</label><br>
                                <input type="radio" name="input_type" value="file" id="inputFile"
                                    @if ($task->input_type == 'file') checked @endif />
                                <label for="inputFile">Upload Question File</label>
                                <input type="radio" name="input_type" value="multiple" id="inputMultiple"
                                    @if ($task->input_type == 'multiple') checked @endif>
                                <label for="inputMultiple">Upload Questions & Answers</label>
                            </div>


                            <div id="uploadSection" class="form-group"
                                @if ($task->input_type == 'file') style="display:block" @else style="display:none" @endif>
                                <label for="questions_file">Upload Question File:</label>
                                <input class="form-control" type="file" id="questions_file" name="questions_file">
                                <p class="text-danger text-bold"> Note : we can accept only
                                    docx,doc,ppt,pptx,jpg,png,jpeg,xlsx,csv</p>
                                {{-- <a href="{{ route('questions-tasks-sample') }}" class="">Download Sample</a> --}}


                                <label for="answers_file">Upload Answers File:</label>
                                <input class="form-control" type="file" id="answers_file" name="answers_file">
                                {{-- <a href="{{ route('answers-tasks-sample') }}" class="">Download Sample</a> --}}
                                <p class="text-danger text-bold"> Note : we can accept only
                                    docx,doc,ppt,pptx,jpg,png,jpeg,xlsx,csv</p>
                            </div>



                            <!-- Multiple Add More Section -->
                            <div id="multipleSection" class="form-group"
                                @if ($task->input_type == 'multiple') style="display:block" @else style="display:none;" @endif>

                                <div class="question-answer-set row" style="border:1px solid;">
                                    <div class="col-md-11">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Question:</label>
                                                    <textarea type="text" name="questions[]" class="form-control summernote" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Answer:</label>
                                                    <textarea type="text" name="answers[]" class="form-control summernote" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <button type="button" class="mt-4 btn btn-primary btn-sm addMore"
                                            id="addMore"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="mt-4 btn btn-danger btn-sm removeSet"><i
                                                class="fa fa-trash"></i></button>
                                    </div>
                                </div>


                                @foreach ($task->details as $item)
                                    <div class="question-answer-set row">
                                        <div class="col-md-11">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Question:</label>
                                                        <textarea type="text" name="questions[]" class="form-control summernote" required>{!! $item->questions !!}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Answer:</label>
                                                        <textarea type="text" name="answers[]" class="form-control summernote" required>{!! $item->answers !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="mt-4 btn btn-primary btn-sm addMore">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            <button type="button" data-route="{{ route('tasks-delete', $item->id) }}"
                                                class="mt-4 btn btn-danger btn-sm removeSet2">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>

                                    </div>
                                @endforeach



                            </div>



                            <!-- Peer Responses -->
                            <div id="peer_responses_fields"
                                style="{{ $task->task_type == 'peer_responses' ? 'display: block;' : 'display: none;' }}">

                            </div>


                            <div id="actual_length_fields"
                                {{ $task->mcq_essay_mixed !== 'mcq' ? 'display: block;' : 'display: none;' }}>
                                <div class="form-group">
                                    <label for="actual_length">Actual Length (Assignment):</label>
                                    <input class="form-control" type="number" id="actual_length" name="actual_length"
                                        value="{{ $task->actual_length }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="words_written">Number of Words Written:</label>
                                <input class="form-control" type="number" id="words_written" name="words_written"
                                    value="{{ $task->words_written }}">
                            </div>






                            <div class="form-group">
                                <label for="score">Score:</label>
                                <input class="form-control" type="number" id="score" name="score"
                                    value="{{ $task->score }}">
                            </div>

                            <div class="form-group">
                                <label for="comments">Comments:</label>
                                <textarea class="form-control" id="comments" name="comments">{{ $task->comments }}</textarea>
                            </div>

                            <div class="card-footer"></div>
                            <button type="submit" id="submitButton" class="btn btn-primary float-right"
                                data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..."
                                data-rest-text="Update">Update</button>
                    </div>
                    </form>
                </div>

            </div>
        </div><!-- COL END -->

        <!--  End Content -->

    </div>


@stop


@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <!-- Add this script tag at the end of your HTML body or in an external JavaScript file -->

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $("#master_id").select2();
        $(document).on('change', '#master_id', function() {

            if ($("#master_id option:selected").attr('data-master')) {
                var master = JSON.parse($("#master_id option:selected").attr('data-master'));
                console.log("master", master);
                if (typeof master !== "undefined") {

                    $("#start_date_time").val(master.startdate);


                    $("#college_id").val(master.college.name);
                    $("#course_id").val(master.course.category_name);
                    $("#subject_id").val(master.subject.subject_name);
                    $("#course_code_id").val(master.course_code.code);

                }
            }

        });
        $("#employees").select2();
        $("#freelancers").select2();
        $(document).ready(function() {

            $('.summernote').summernote({
                height: '300'
            });

            const $uploadSection = $('#uploadSection');
            const $multipleSection = $('#multipleSection');
            const $inputFile = $('#inputFile');
            const $inputMultiple = $('#inputMultiple');
            const $addMoreButton = $('.addMore');

            // Toggle display based on user choice
            $inputFile.change(function() {
                $uploadSection.show();
                $multipleSection.hide();
            });

            $inputMultiple.change(function() {
                $uploadSection.hide();
                $multipleSection.show();
            });

            // Add More functionality for multiple inputs
            let setIndex = 1;
            $(document).on('click', '.addMore', function() {
                const $questionAnswerSet = `
                                    <div class="question-answer-set row" style="border:1px solid;">
                                        <div class="col-md-11">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Question:</label>
                                                        <textarea type="text" name="questions[]" class="form-control summernote" id="summernote${setIndex}" required ></textarea>
                                                    </div>                                                    
                                                </div>

                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Answer:</label>
                                                            <textarea type="text" name="answers[]" class="form-control summernote" id="answers${setIndex}" required ></textarea>
                                                        </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-1">
                                            <button type="button" class="mt-4 btn btn-primary btn-sm addMore" id="addMore"><i class="fa fa-plus"></i></button>
                                            <button type="button" class="mt-4 btn btn-danger btn-sm removeSet"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>

                 `;

                $multipleSection.append($questionAnswerSet);

                $('#summernote' + setIndex).summernote({
                    height: '300'
                })
                $("#summernote" + setIndex).val($("#summernote" + setIndex).summernote('code'));

                $('#answers' + setIndex).summernote({
                    height: '300'
                })
                $("#answers" + setIndex).val($("#answers" + setIndex).summernote('code'));

                setIndex++;
            });


            // Remove functionality for added sets
            $(document).on('click', '.removeSet', function() {
                console.log("setIndex", setIndex);
                if (setIndex == 1) {
                    alert('You cant delete this Last record ')
                    return false;
                }
                $(this).parent().parent().remove();
                setIndex--;
            });
        });


        $(document).on('click', '.removeSet2', function() {

            var con = confirm('Are you sure want to delete this questions/answers');
            if (!con) {
                return false;
            }
            $.ajax({
                url: $(this).attr('data-route'),
                type: 'DELETE',
                // dataType: "json",
                // cache: false,
                // contentType: false,
                // processData: false,
                data: {
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function() {

                },
                success: function(response) {
                    if (response.status) {
                        location.reload();
                    } else {
                        alert(response.success);
                    }
                },
                error: function(error) {

                },
                complete: function() {

                }
            });

        });

        const startDateTimeInput = document.getElementById('start_date_time');
        const endDateTimeInput = document.getElementById('end_date_time');
        const wordsWrittenInput = document.getElementById('words_written');

        flatpickr(startDateTimeInput, {
            enableTime: true,
            minDate: 'today',
            dateFormat: 'Y-m-d H:i',
            minuteIncrement: 1,
            onClose: updateWordsWritten,
        });

        flatpickr(endDateTimeInput, {
            enableTime: true,
            minDate: 'today',
            dateFormat: 'Y-m-d H:i',
            minuteIncrement: 1,
            onClose: updateWordsWritten,
        });

        function updateWordsWritten(selectedDates, dateStr, instance) {
            console.log($("#mcq_essay_mixed option:selected").val());
            if ($("#mcq_essay_mixed option:selected").val() == 'mcq') {
                const startDateTime = Date.parse(startDateTimeInput.value);
                const endDateTime = Date.parse(endDateTimeInput.value);

                if (!isNaN(startDateTime) && !isNaN(endDateTime) && endDateTime > startDateTime) {
                    const timeDifference = (endDateTime - startDateTime) / (1000 * 60 * 60);
                    console.log(timeDifference);
                    const wordsWritten = timeDifference * 250;
                    wordsWrittenInput.value = Math.max(0, wordsWritten);
                } else {
                    wordsWrittenInput.value = "";
                }
            } else {
                wordsWrittenInput.value = "";
            }

        }


        const deadline_date_time = document.getElementById('deadline_date_time');
        flatpickr(deadline_date_time, {
            enableTime: true,
            minDate: 'today',
            dateFormat: 'Y-m-d H:i',
            minuteIncrement: 1
        });





        // Add validation rules and messages
        $("#submitForm").validate({
            rules: {

                // deadline_date_time: {
                //     required: true,
                //     date: true
                // },

                college_id: {
                    required: true
                },
                subject_id: {
                    required: true
                },
                course_id: {
                    required: true
                },
                course_code_id: {
                    required: true
                },
                task_type: {
                    required: true
                },
                // Add more rules based on your form fields
                essay_upload: {
                    extension: "pdf|doc|docx",
                    // filesize: 1224000
                },
                mixed_upload: {
                    extension: "pdf|doc|docx",
                    // filesize: 122400
                },
                word_count: {
                    required: function(element) {
                        return $("#task_type").val() === "quiz_exam";
                    },
                    digits: true
                },
                peer_word_count: {
                    required: function(element) {
                        return $("#task_type").val() === "peer_responses";
                    },
                    digits: true
                },
                // Add more rules based on your form fields
            },
            messages: {
                start_date: {
                    required: "Please enter a valid date",
                    date: "Please enter a valid date"
                },
                start_time: {
                    required: "Please enter a valid start time",
                    time: "Please enter a valid start time"
                },
                end_time: {
                    required: "Please enter a valid end time",
                    time: "Please enter a valid end time",
                    greaterThan: "End time must be greater than start time"
                },
                college_id: {
                    required: "Please select a college",
                    digits: true
                },
                unique_group_id_3: {
                    required: true,
                    maxlength: 5,
                },
                subject_id: {
                    required: "Please enter a subject",
                    digits: true
                },
                course_id: {
                    required: "Please enter a course",
                    digits: true
                },
                course_code_id: {
                    required: "Please enter a course code",
                    digits: true
                },
                deadline_date_time: {
                    required: "Please select a deadline date",
                    digits: true
                },
                task_type: {
                    required: "Please select a task type"
                },
                // Add more messages based on your form fields
                essay_upload: {
                    extension: "Please upload a PDF, DOC, or DOCX file",
                    filesize: "File size must be less than 10 KB"
                },
                mixed_upload: {
                    extension: "Please upload a PDF, DOC, or DOCX file",
                    filesize: "File size must be less than 10 KB"
                },
                word_count: {
                    required: "Please enter a valid word count for quizzes/exams",
                    digits: "Please enter a valid number"
                },
                peer_word_count: {
                    required: "Please enter a valid word count for peer responses",
                    digits: "Please enter a valid number"
                },
                // Add more messages based on your form fields
            },
            errorPlacement: function(error, element) {
                if (element.attr("type") === "file") {
                    error.insertAfter(element.closest(".form-group").find("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {


                $('.summernote').each(function() {
                    const code = $(this).summernote('code');
                    $(this).val(code);
                });

                // Serialize form data
                var formData = new FormData(form);
                var $this = $('#submitButton');
                // Submit the form via Ajax
                $.ajax({
                    url: $(form).attr("action"),
                    type: $(form).attr("method"),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        // Disable the submit button or show a loading spinner if needed
                        $("#submitButton").prop("disabled", true);
                        // Add loading text if you have a loading indicator
                        $("#submitButton").html("<i class='fa fa-spinner fa-spin'></i> Sending...");
                    },
                    success: function(response) {
                        // Handle the success response
                        if (response.success) {
                            successMsg('Update Tasks', response.success, response.route);
                            // Reset the form or perform any other actions
                            form.reset();
                        } else {
                            $.each(response.errors, function(fieldName, field) {
                                $.each(field, function(index, msg) {
                                    $('#' + fieldName).addClass(
                                        'is-invalid state-invalid');
                                    errorDiv = $('#' + fieldName).parent('div');
                                    errorDiv.append(
                                        '<div class="invalid-feedback">' + msg +
                                        '</div>');
                                });
                            });
                            errorMsg('Update Tasks', response.success);
                        }
                        buttonLoading('reset', $this);
                    },
                    error: function(error) {
                        // Handle the error response
                        console.error(error.responseJSON);
                        buttonLoading('reset', $this);
                        errorMsg('Update Tasks', response.message);
                    },
                    complete: function() {
                        // Enable the submit button or hide the loading spinner if needed
                        $("#submitButton").prop("disabled", false);
                        // Restore the original text if you added loading text
                        $("#submitButton").html("Update");
                        buttonLoading('reset', $this);
                    }
                });
            }
        });

        // Add a custom rule for end time greater than start time
        $.validator.addMethod("greaterThan", function(value, element, param) {
            var start_time = $(param).val();
            return value > start_time;
        }, "End time must be greater than start time");

        // Add custom rules for file size and allowed extensions
        $.validator.addMethod("filesize", function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param);
        }, "File size must be less than {0} KB");

        $.validator.addMethod("extension", function(value, element, param) {
            param = typeof param === "string" ? param.replace(/,/g, "|") : "pdf|doc|docx";
            return this.optional(element) || value.match(new RegExp("\\.(" + param + ")$", "i"));
        }, "Please enter a value with a valid extension");

        $.validator.addMethod("time", function(value, element) {
            return this.optional(element) || /^([01]\d|2[0-3]):([0-5]\d)$/.test(value);
        }, "Please enter a valid time");
    </script>


    <script>
        // Show/Hide additional fields based on task type
        document.getElementById('task_type').addEventListener('change', function() {
            var assignmentHomeworkFields = document.getElementById('assignment_homework_fields');
            var quizExamFields = document.getElementById('quiz_exam_fields');
            var peerResponsesFields = document.getElementById('peer_responses_fields');
            var selectedTaskType = this.value;

            assignmentHomeworkFields.style.display = selectedTaskType === 'assignment_homework' ? 'block' : 'none';
            quizExamFields.style.display = selectedTaskType === 'quiz_exam' ? 'block' : 'none';
            peerResponsesFields.style.display = selectedTaskType === 'peer_responses' ? 'block' : 'none';
        });


        $(document).on('change', '#mcq_essay_mixed', function() {
            // Show/Hide additional fields based on MCQ / Essay / Mixed
            var mcqFields = document.getElementById('mcq_fields');
            var essayFields = document.getElementById('essay_fields');
            var mixedFields = document.getElementById('mixed_fields');
            var selectedQuizType = document.getElementById('mcq_essay_mixed').value;
            var actual_length = document.getElementById('actual_length_fields');

            actual_length.style.display = selectedQuizType === 'mcq' ? 'none' : 'block';

            updateWordsWritten("", "", "")
            //mcqFields.style.display = selectedQuizType === 'mcq' ? 'block' : 'none';
            //essayFields.style.display = selectedQuizType === 'essay' ? 'block' : 'none';
            //mixedFields.style.display = selectedQuizType === 'mixed' ? 'block' : 'none';
        })

        // Set up typeahead
        $('#subject_id').typeahead({
            source: {!! json_encode($subjects) !!},
            minLength: 1,
            items: 10 // Number of items to show in the dropdown
        });

        // Set up typeahead
        $('#college_id').typeahead({
            source: {!! json_encode($colleges) !!},
            minLength: 1,
            items: 10 // Number of items to show in the dropdown
        });


        // Set up typeahead
        $('#course_id').typeahead({
            source: {!! json_encode($courses) !!},
            minLength: 1,
            items: 10, // Number of items to show in the dropdown
            afterSelect: function(item) {
                $("#unique_group_id_2").val(item.substring(0, 3) + '_');
                getSubjectData(item);
                $("#subject_id").val("");
            },
        });


        function getSubjectData(course) {
            $.ajax({
                url: '{{ route('tasks.get.subjects') }}', // Your endpoint to fetch subject data
                type: 'GET',
                data: {
                    course: course
                },
                success: function(response) {
                    // Handle the response data
                    console.log(response);

                    // Initialize typeahead for subject_id field
                    $('#subject_id').typeahead('destroy'); // Destroy previous typeahead instance if exists
                    $('#subject_id').typeahead({
                        source: response,
                        minLength: 1,
                        items: 10 // Number of items to show in the dropdown
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching subject data:', error);
                }
            });
        }

        $(document).on('blur', '#course_id', function() {
            $("#unique_group_id_2").val(this.value.substring(0, 3) + '_');
        });


        // Set up typeahead
        $('#course_code_id').typeahead({
            source: {!! json_encode($courseCode) !!},
            minLength: 1,
            items: 10 // Number of items to show in the dropdown
        });
    </script>


    <script type="text/javascript">
        function readURL(input, imgId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + imgId).attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }


        $('#selectAllemployees').on('click', function() {
            $('#employees option').prop('selected', true);
            $('#employees').trigger('change');
        });

        $('#uncheckAllemployees').on('click', function() {
            $('#employees option').prop('selected', false);
            $('#employees').trigger('change');
        });

        $('#selectAllfreelancers').on('click', function() {
            $('#freelancers option').prop('selected', true);
            $('#freelancers').trigger('change');
        });

        $('#uncheckAllfreelancers').on('click', function() {
            $('#freelancers option').prop('selected', false);
            $('#freelancers').trigger('change');
        });
    </script>
@endpush
