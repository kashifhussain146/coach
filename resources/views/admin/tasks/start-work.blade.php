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

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
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
                                    &nbsp;&nbsp;{{ $task->college->name }}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="subject">Subject : </label> &nbsp;&nbsp;
                                    {{ $task->subject->subject_name }}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="course_name">Course Name : </label>&nbsp;&nbsp;
                                    {{ $task->course->category_name }}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="course_code">Course Code : </label>
                                    &nbsp;&nbsp;{{ $task->courseCode->code }}
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
                                    <label>Work Status :</label>

                                    {!! $task->isDeadlineMet
                                        ? '<span class="badge badge-danger">Deadline Not Met</span>'
                                        : '<span class="badge badge-success">Deadline Met</span>' !!}

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="comments">Comments: </label>&nbsp;&nbsp; {{ $task->comments }}
                                </div>



                                <div class="form-group col-md-5">
                                    <label for="start_date_time">Start Date & Time: </label>
                                    <input type="text" autocomplete="off" class="form-control " id="start_date_time"
                                        name="start_date_time"
                                        value="{{ $task->start_date_time != '' ? $task->start_date_time : old('start_date_time') }}">
                                    @error('start_date_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="end_date_time">End Date & Time: </label>
                                    <input type="text" autocomplete="off" readonly class="form-control"
                                        id="end_date_time" name="end_date_time"
                                        value="{{ $task->end_date_time != '' ? $task->end_date_time : old('end_date_time') }}" />

                                    @error('end_date_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <h2 class="mb-5 mt-5">Start work on these questions </h2>

                            @if ($task->input_type == 'file')

                                <div class="form-group col-md-4">
                                    <label for="">Question File: </label>
                                    <a href="{{ asset('/uploads/questions/' . $task->questions_file) }}" download
                                        class="">Download
                                        Question File</a>
                                </div>


                                <div class="form-group col-md-12">

                                    <label for="answers_file">Upload Answers File:</label>
                                    <input class="form-control" type="file" id="answers_file" name="answers_file">
                                    <p class="text-danger text-bold"> Note : we can accept only
                                        docx,doc,ppt,pptx,jpg,png,jpeg,xlsx,csv</p>
                                    @error('answers_file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror


                                </div>
                                <div class="form-group col-md-12">
                                    <a href="{{ route('questions-answers-sample-download') }}" class="">Download
                                        Sample</a>
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
                                                        <input type="hidden" name="questions[]"
                                                            value="{!! $item->questions !!}">
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



                            <div class="col-md-12">

                                @if ($task->start_date_time == '')
                                    <button type="submit" id="submitButton" class="btn btn-warning "
                                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..."
                                        data-rest-text="Update">Start Task
                                    </button>
                                @endif

                                @if ($task->start_date_time != '')
                                    <button type="submit" id="CompletedButton" class="btn btn-success "
                                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..."
                                        data-rest-text="Update">Completed</button>
                                @endif
                            </div>


                    </div>

                    <pre id="result"></pre>
                    <input type="hidden" name="draft_type" id="draft_type" value="1" />
                    <input type="hidden" name="rawFileData" id="rawFileData" value="" />

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
    <script src="https://cdn.jsdelivr.net/npm/tesseract.js@2.1.1/dist/tesseract.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $('#answers_file').on('change', function(event) {
            const file = event.target.files[0];
            const errorMessageElement = $('#error_message');
            errorMessageElement.text(''); // Clear any previous error message

            if (file) {
                const fileExtension = file.name.split('.').pop().toLowerCase();
                const validExtensions = ['jpg', 'jpeg', 'png'];

                if (validExtensions.includes(fileExtension)) {
                    Tesseract.recognize(
                        file,
                        'eng', {
                            logger: m => {
                                console.log(m)
                                $("#CompletedButton").prop('disabled', true);
                                $("#CompletedButton").html(`Please wait... <div class="spinner-border spinner-border-sm" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>`)

                            }
                        }
                    ).then(({
                        data: {
                            text
                        }
                    }) => {
                        console.log("text", text);
                        if (text == "") {
                            Swal.fire({
                                title: 'File Upload',
                                text: 'There is no content found in your image. Please try another one',
                                icon: 'warning',
                                showCancelButton: false,
                                confirmButtonText: 'Ok !'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    form.submit();
                                }
                            })
                            $("#answers_file").val('');
                        } else {
                            $('#rawFileData').val(text);
                        }
                        $("#CompletedButton").prop('disabled', false);
                        $("#CompletedButton").html(`Completed`)
                    });
                } else {
                    errorMessageElement.text('Please upload a valid image file (jpg, jpeg, or png).');
                }
            }
        });

        $("#submitButton").on('click', function() {
            $("#draft_type").val(2);
            setTimeout(() => {
                $("#submitForm").submit();
            }, 1000);
        });


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
                start_date_time: {
                    required: true,
                    date: true
                },
                @if ($task->start_date_time != '')
                    end_date_time: {
                        required: true,
                        date: true
                    },
                    answers_file: {
                        required: true,
                        extension: "docx|doc|ppt|pptx|jpg|png|jpeg|xlsx|csv",
                        // filesize: 1224000
                    }
                @endif
            },
            messages: {
                start_date_time: {
                    required: "Please enter a valid date",
                    date: "Please enter a valid date"
                },
                end_date_time: {
                    required: "Please enter a valid end time",
                    date: "Please enter a valid date"
                },

                answers_file: {
                    required: "Please select a file",
                    extension: "Please select only a valid file extension"
                },

            },
            errorPlacement: function(error, element) {
                // if (element.attr("type") === "file") {
                //     error.insertAfter(element.closest(".form-group").find("label"));
                // } else {
                //     error.insertAfter(element);
                // }
                error.insertAfter(element);
            },
            submitHandler: function(form) {
                event.preventDefault();

                $('.summernote').each(function() {
                    const code = $(this).summernote('code');
                    $(this).val(code);
                });


                if ($("#draft_type").val() == 1) {

                    Swal.fire({
                        title: 'Task',
                        text: 'Are you sure you want to complete this task ?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ok !'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    })
                } else {
                    form.submit();
                }


            }
        });

        const startDateTimeInput = document.getElementById('start_date_time');
        const endDateTimeInput = document.getElementById('end_date_time');
        const wordsWrittenInput = document.getElementById('words_written');


        // Initialize the start date/time picker
        flatpickr(startDateTimeInput, {
            enableTime: true,
            minDate: "{{ date('Y-m-d H:i:s') }}",
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
            minDate: "{{ $task->start_date_time ? $task->start_date_time : date('Y-m-d H:i:s') }}",
            dateFormat: 'Y-m-d H:i',
            minuteIncrement: 1,
        });
    </script>
@endpush
