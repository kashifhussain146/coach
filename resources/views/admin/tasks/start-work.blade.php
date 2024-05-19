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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>
                    <div class="card-body">

                        @if ($errors->any())
                                       
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-white">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            
                        @endif

                        <form id="submitForm" enctype="multipart/form-data" method="post"
                            action="{{ route('update-start-work', $task->id) }}">
                            {{ csrf_field() }}

                            <div class="row">

                                   

                                <div class="form-group col-md-4">
                                    <label for="course_code">Task Group ID : </label>
                                    &nbsp;&nbsp;{{ $task->unique_group_id }}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="deadline_date_time">Deadline Date : </label>
                                    &nbsp;&nbsp;{{ $task->deadline_date_time != '' ? date('d/m/Y H:i', strtotime($task->deadline_date_time)) : '' }}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="college_name">College Name : </label>
                                    &nbsp;&nbsp;{{ $task->college->title }}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="subject">Subject : </label> &nbsp;&nbsp; {{ $task->subject->title }}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="course_name">Course Name : </label>&nbsp;&nbsp; {{ $task->course->title }}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="course_code">Course Code : </label>
                                    &nbsp;&nbsp;{{ $task->courseCode->title }}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="task_type">Task Type: </label> &nbsp;&nbsp;{{ $task->task_type }}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="mcq_essay_mixed">MCQ / Essay / Mixed:</label>&nbsp;&nbsp;
                                    {{ $task->mcq_essay_mixed }}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="assignment_type">Assignment Type: </label>&nbsp;&nbsp;
                                    {{ $task->assignment_type }}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="actual_length">Actual Length (Assignment):
                                    </label>&nbsp;&nbsp;{{ $task->actual_length }}
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="words_written">Number of Words Written :
                                    </label>&nbsp;&nbsp;{{ $task->words_written }}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="score"> Score: </label>&nbsp;&nbsp;{{ $task->score }}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="comments">Comments: </label>&nbsp;&nbsp; {{ $task->comments }}
                                </div>



                                <div class="form-group col-md-4">
                                    <label for="start_date_time">Start Date & Time: </label>
                                    <input type="text" autocomplete="off" class="form-control " id="start_date_time"
                                        name="start_date_time"
                                        value="{{ $task->start_date_time != '' ? $task->start_date_time : old('start_date_time') }}">
                                    @error('start_date_time')
                                     <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="end_date_time">End Date & Time: </label>
                                    <input type="text" autocomplete="off" readonly class="form-control"
                                        id="end_date_time" name="end_date_time"
                                        value="{{ $task->end_date_time != '' ? $task->end_date_time : old('end_date_time') }}" />

                                        @error('end_date_time')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                </div>

                            </div>

                            <h2 class="mb-5 mt-5">Start work on these questions </h2>

                            @if ($task->input_type == 'file')

                                <div class="form-group col-md-4">
                                    <label for="end_date_time">Question File: </label>
                                    <a href="{{ asset('' . $task->questions_file) }}" download class="">Download
                                        Question File</a>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="answers_file">Upload Answers File:</label>
                                    <input class="form-control" type="file" id="answers_file" name="answers_file">
                                    @error('answers_file')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                    <p class="text-danger text-bold"> Note : Before upload answer file please check the sample file</p> 
                                    <a href="{{ route('questions-answers-sample-download') }}" class="">Download  Sample</a>
                                </div>
                            @else
                                @foreach ($task->details as $item)
                                    <div class="question-answer-set border mb-4 p-3 row">
                                        <div class="col-md-11">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Question:</label>
                                                        {!! $item->questions !!}
                                                        <input type="hidden" name="questions[]" value="{!! $item->questions !!}">
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

                                    </div>
                                @endforeach

                            @endif




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
       


        $('.summernote').summernote({
            height: '300'
        });
        $('.summernote').each(function() {
            const code = $(this).summernote('code');
            $(this).val(code);
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
        // Add validation rules and messages
        $("#submitForm").validate({
            rules: {
                answers_file: {
                    extension: "csv",
                    // filesize: 1224000
                },
                start_date_time: {
                    required: true,
                    date: true
                },
                end_date_time: {
                    required: true,
                    date: true
                }
            },
            messages: {
                start_date_time: {
                    required: "Please enter a valid date",
                    date: "Please enter a valid date"
                },
                end_date_time: {
                    required: "Please enter a valid start time",
                    date: "Please enter a valid date"
                },

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

                // // Serialize form data
                // var formData = new FormData(form);
                // var $this = $('#submitButton');
                // // Submit the form via Ajax
                // $.ajax({
                //     url: $(form).attr("action"),
                //     type: $(form).attr("method"),
                //     data: formData,
                //     cache: false,
                //     contentType: false,
                //     processData: false,
                //     beforeSend: function() {
                //         // Disable the submit button or show a loading spinner if needed
                //         $("#submitButton").prop("disabled", true);
                //         // Add loading text if you have a loading indicator
                //         $("#submitButton").html("<i class='fa fa-spinner fa-spin'></i> Sending...");
                //     },
                //     success: function(response) {
                //         // Handle the success response
                //         if (response.success) {
                //             successMsg('Update Tasks', response.success, response.route);
                //             // Reset the form or perform any other actions
                //             form.reset();
                //         } else {
                //             $.each(response.errors, function(fieldName, field) {
                //                 $.each(field, function(index, msg) {
                //                     $('#' + fieldName).addClass(
                //                         'is-invalid state-invalid');
                //                     errorDiv = $('#' + fieldName).parent('div');
                //                     errorDiv.append(
                //                         '<div class="invalid-feedback">' + msg +
                //                         '</div>');
                //                 });
                //             });
                //             errorMsg('Update Tasks', response.success);
                //         }
                //         buttonLoading('reset', $this);
                //     },
                //     error: function(error) {
                //         // Handle the error response
                //         console.error(error.responseJSON);
                //         buttonLoading('reset', $this);
                //         errorMsg('Update Tasks', response.message);
                //     },
                //     complete: function() {
                //         // Enable the submit button or hide the loading spinner if needed
                //         $("#submitButton").prop("disabled", false);
                //         // Restore the original text if you added loading text
                //         $("#submitButton").html("Update");
                //         buttonLoading('reset', $this);
                //     }
                // });
                form.submit();
            }
        });

        const startDateTimeInput = document.getElementById('start_date_time');
        const endDateTimeInput = document.getElementById('end_date_time');
        const wordsWrittenInput = document.getElementById('words_written');
        const deadline_date_time = document.getElementById('deadline_date_time');

        // Initialize the start date/time picker
        flatpickr(startDateTimeInput, {
            enableTime: true,
            minDate: 'today',
            dateFormat: 'Y-m-d H:i',
            minuteIncrement: 1,
            onChange: function(selectedDates, dateStr, instance) {
                // Update the end date/time picker's minDate to the selected start date/time
                endDateTimePicker.set('minDate', dateStr);
            },
        });

        // Initialize the end date/time picker
        const endDateTimePicker = flatpickr(endDateTimeInput, {
            enableTime: true,
            minDate: 'today',
            dateFormat: 'Y-m-d H:i',
            minuteIncrement: 1,
        });


        flatpickr(deadline_date_time, {
            enableTime: true,
            minDate: 'today',
            dateFormat: 'Y-m-d H:i',
            minuteIncrement: 1
        });
    </script>
@endpush
