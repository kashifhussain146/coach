@extends('admin.layouts.app')
@section('title')
    <title>Master Create</title>
@stop

@section('inlinecss')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
        @section('inlinecss')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
                    <h1 class="m-0">Master Create </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Master Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')

    <div class="content-header">
        <div class="side-app">
            @if (isset($email))
                <form action="{{ route('masters-update', ['master' => $email->id]) }}" method="POST"
                    enctype="multipart/form-data" id="kt_inbox_compose_form">
                @else
                    <form action="{{ route('masters-save') }}" method="POST" enctype="multipart/form-data"
                        id="kt_inbox_compose_form">
            @endif

            @csrf
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">


                        <div class="form-group">
                            <label class="form-label">Email Subject *</label>
                            <input type="text" class="form-control"
                                value="{{ isset($email) ? $email->emailsubject : '' }}" name="emailsubject"
                                id="emailsubject" placeholder="Email Subject..">
                        </div>


                        <div id="rolesData">
                            <div class="form-group" id="EmployeeDiv">
                                <label for="created_by">Employees</label>
                                <select class="form-control " id="employees" multiple name="employees[]">
                                    @foreach ($employees as $item)
                                        @if ($item->roles()->first()->name == 'Employee')
                                            <option
                                                @if (isset($email)) @if (in_array($item->id, $email->masters()->pluck('user_id')->toArray())) selected @endif
                                                @endif
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
                                            <option
                                                @if (isset($email)) @if (in_array($item->id, $email->masters()->pluck('user_id')->toArray())) selected @endif
                                                @endif

                                                value="{{ $item->id }}">{{ $item->name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                                <p class="row pt-2" style="font-size: 12px;">
                                    &nbsp;&nbsp;<a class="p-1 nav-link btn btn-sm btn-primary"
                                        id="selectAllfreelancers">Check All</a>&nbsp;&nbsp;
                                    <a class="p-1 nav-link btn btn-sm btn-primary" id="uncheckAllfreelancers">UnCheck
                                        All</a>
                                </p>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="form-label">URL </label>
                            <input type="url" class="form-control" value="{{ isset($email) ? $email->url : '' }}"
                                name="url" id="url" placeholder="URL..">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Username </label>
                            <input type="text" class="form-control" value="{{ isset($email) ? $email->username : '' }}"
                                name="username" id="username" placeholder="Username..">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Password </label>
                            <input type="password" class="form-control" value="{{ isset($email) ? $email->password : '' }}"
                                name="password" id="password" placeholder="Password..">
                        </div>

                        <div class="form-group">
                            <label class="form-label">College Name </label>
                            <input type="text" class="form-control"
                                value="{{ isset($email->college) ? $email->college->name : '' }}" name="collegename"
                                id="collegename" placeholder="College Name..">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Course Name </label>
                            <input type="text" class="form-control"
                                value="{{ isset($email->course) ? $email->course->category_name : '' }}" name="coursename"
                                id="coursename" placeholder="Course Name..">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Subject Name </label>
                            <input type="text" class="form-control"
                                value="{{ isset($email->subject) ? $email->subject->subject_name : '' }}" name="subjectname"
                                id="subjectname" placeholder="Subject Name..">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Course Code </label>
                            <input type="text" class="form-control"
                                value="{{ isset($email->courseCode) ? $email->courseCode->code : '' }}" name="coursecode"
                                id="coursecode" placeholder="Course Code..">
                        </div>





                        <div class="form-group">
                            <label class="form-label">Start Date </label>
                            <input type="datetime-local" class="form-control"
                                value="{{ isset($email) ? $email->startdate : '' }}" name="startdate" id="startdate"
                                placeholder="Start Date..">
                        </div>

                        <div class="form-group">
                            <label class="form-label">End Date </label>
                            <input type="datetime-local" class="form-control"
                                value="{{ isset($email) ? $email->enddate : '' }}" name="enddate" id="enddate"
                                placeholder="End Date..">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Grade </label>
                            <input type="text" class="form-control" value="{{ isset($email) ? $email->grade : '' }}"
                                name="grade" id="grade" placeholder="Grade..">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" id="submitButton" class="btn btn-primary float-left"
                            data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..."
                            data-rest-text="Save">Save</button>
                    </div>
                </div>
            </div>
            </form>
        </div>


    </div>

@stop
@section('inlinejs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"
        integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/scroller/2.0.3/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>


        const startDateTimeInput = document.getElementById('startdate');
        const endDateTimeInput = document.getElementById('enddate');


        flatpickr(startDateTimeInput, {
            enableTime: true,
            minDate: "{{ date('Y-m-d') }}",
            dateFormat: 'Y-m-d',
            minuteIncrement: 1,
            onChange: function(selectedDates, dateStr, instance) {
                // Update the end date/time picker's minDate to the selected start date/time
                endDateTimePicker.set('minDate', dateStr);
            },
        });

        // Initialize the end date/time picker
        const endDateTimePicker = flatpickr(endDateTimeInput, {
            enableTime: true,
           
            dateFormat: 'Y-m-d',
            minuteIncrement: 1,
        });

        $("#employees").select2();
        $("#freelancers").select2();

        $('#kt_inbox_compose_form').validate({
            rules: {
                emailsubject: {
                    required: true,
                    maxlength: 255
                },
                url: {
                    //required: true,
                    // url: true,
                    //maxlength: 255
                },
                username: {
                    //required: true,
                    maxlength: 100
                },
                password: {
                    //required: true,
                    maxlength: 100
                },
                collegename: {
                    //required: true,
                    maxlength: 255
                },
                coursecode: {
                    //required: true,
                    maxlength: 150
                },
                coursename: {
                    required: true,
                    maxlength: 150
                },
                subjectname: {
                    required: true,
                    maxlength: 150
                },
                startdate: {
                    //required: true,
                    date: true
                },
                enddate: {
                    //required: true,
                    date: true,
                    greaterThan: "#startdate" // Custom rule to ensure enddate is after startdate
                },
                grade: {
                    //required: true,
                    maxlength: 255
                }
            },
            messages: {
                emailsubject: {
                    required: "Please enter the email subject",
                    maxlength: "The email subject must not exceed 255 characters"
                },
                url: {
                    required: "Please enter the URL",
                    url: "Please enter a valid URL",
                    maxlength: "The URL must not exceed 255 characters"
                },
                username: {
                    required: "Please enter the username",
                    maxlength: "The username must not exceed 255 characters"
                },
                password: {
                    required: "Please enter the password",
                    maxlength: "The password must not exceed 255 characters"
                },
                collegename: {
                    required: "Please enter the college name",
                    maxlength: "The college name must not exceed 255 characters"
                },
                coursecode: {
                    required: "Please enter the course code",
                    maxlength: "The course code must not exceed 255 characters"
                },
                coursename: {
                    required: "Please enter the course name",
                    maxlength: "The course name must not exceed 255 characters"
                },
                subjectname: {
                    required: "Please enter the subject name",
                    maxlength: "The subject name must not exceed 255 characters"
                },
                startdate: {
                    required: "Please enter the start date",
                    date: "Please enter a valid date"
                },
                enddate: {
                    required: "Please enter the end date",
                    date: "Please enter a valid date",
                    greaterThan: "The end date must be after the start date"
                },
                grade: {
                    required: "Please enter the grade",
                    maxlength: "The grade must not exceed 255 characters"
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function() {

                var $this = $('#submitButton');
                buttonLoading('loading', $this);
                $('.is-invalid').removeClass('is-invalid state-invalid');
                $('.invalid-feedback').remove();
                $.ajax({
                    url: $('#kt_inbox_compose_form').attr('action'),
                    type: "POST",
                    processData: false, // Important!
                    contentType: false,
                    cache: false,
                    data: new FormData($('#kt_inbox_compose_form')[0]),
                    success: function(data) {
                        if (data.status) {
                            var btn = '';
                            @if (isset($email))
                                successMsg('Update', data.msg, '{{ route('masters-list') }}');
                            @else
                                successMsg('Create', data.msg, '{{ route('masters-list') }}');
                            @endif

                            $('#kt_inbox_compose_form')[0].reset();

                        } else {
                            $.each(data.errors, function(fieldName, field) {
                                $.each(field, function(index, msg) {
                                    $('#' + fieldName).addClass(
                                        'is-invalid state-invalid');
                                    errorDiv = $('#' + fieldName).parent('div');
                                    errorDiv.append(
                                        '<div class="invalid-feedback">' +
                                        msg + '</div>');
                                });
                            });
                            errorMsg('Errors', 'Input Error');
                        }
                        buttonLoading('reset', $this);

                    },
                    error: function() {
                        errorMsg('Create Category',
                            'There has been an error, please alert us immediately');
                        buttonLoading('reset', $this);
                    }

                });

                return false;

            }
        });

        // Custom validator method to check if enddate is after startdate
        $.validator.addMethod("greaterThan", function(value, element, params) {
            return this.optional(element) || new Date(value) > new Date($(params).val());
        }, 'End date must be after start date');

        function getTypeaheadData(array) {
            console.log("array", array);
            return $.map(array, function(item) {
                return {
                    id: item.id,
                    name: item.title
                };
            });
        }


        // Set up typeahead
        $('#subjectname').typeahead({
            minLength: 1,
            items: 10 // Number of items to show in the dropdown
        });

        // Set up typeahead
        $('#collegename').typeahead({
            source: getTypeaheadData({!! json_encode($colleges) !!}),
            minLength: 1,
            items: 10 // Number of items to show in the dropdown
        });


        // Set up typeahead
        $('#coursename').typeahead({
            source: getTypeaheadData({!! json_encode($courses) !!}),
            minLength: 1,
            items: 10, // Number of items to show in the dropdown
            afterSelect: function(item) {
                getSubjectData(item);
                $("#subjectname").val("");
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

                    // Assuming response.subjects is an array of subject objects
                    // var subjects = response.subjects.map(function(subject) {
                    //     return subject.name; // Adjust according to your data structure
                    // });

                    // Initialize typeahead for subject_id field
                    $('#subjectname').typeahead('destroy'); // Destroy previous typeahead instance if exists
                    $('#subjectname').typeahead({
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


        // Set up typeahead
        $('#coursecode').typeahead({
            source: getTypeaheadData({!! json_encode($courseCode) !!}),
            minLength: 1,
            items: 10 // Number of items to show in the dropdown
        });



        $(document).on('change', 'input[name="roles"]', function() {

            $.ajax({

                url: '{{ route('get.roles.tasks') }}',

                type: "GET",

                data: {
                    role_name: $(this).val()
                },

                success: function(data) {

                    var html = '';
                    html +=
                        '<div class="form-group" id="EmployeeDiv"><label for="created_by"></label><select class="form-control" id="employees" multiple name="created_by[]">';
                    $.each(data, function(key, value) {
                        html += '<option value="' + value.id + '">' + value.name + '</option>';
                    })
                    html += '</select></div>';

                    $("#rolesData").html(html);

                    $("#employees").select2();
                }
            })

        })


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
@stop
