@extends('admin.layouts.app')
@section('title')
    <title>List Tasks</title>
@stop
@section('inlinecss')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.dataTables.css">
    <style>
        .select2-container {
            width: 100% !important;
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
            <div class="col-12">

                <div class="card">

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

                    <div class="card-header">
                        <h3 class="card-title">Tasks</h3>
                        <div class="ml-auto pageheader-btn">


                            <a href="{{ route('tasks-create') }}"
                                class="float-right btn btn-success btn-icon text-white mr-2">
                                <span>
                                    <i class="fa fa-plus"></i>
                                </span> Add Tasks
                            </a>


                        </div>
                    </div>
                    <div class="card-body ">

                        <form action="{{ route('user-list') }}" method="get" id="export-form">
                            <div class="row">
                                @if (Auth()->guard('admin')->user()->hasRole('Admin') || Auth()->guard('admin')->user()->hasRole('Sub Admin'))
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Users</label>
                                            <select name="created_by" class="form-control select2" id="created_by">
                                                <option value="">Select</option>
                                                @foreach ($employees as $key => $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}
                                                        {{ $item->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Subject</label>
                                        <select name="subjects" class="form-control select2" id="subjects">
                                            <option value="">Select</option>
                                            @foreach ($subjects as $key => $item)
                                                <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Colleges</label>
                                        <select name="colleges" class="form-control select2" id="colleges">
                                            <option value="">Select</option>
                                            @foreach ($colleges as $key => $item)
                                                <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Courses</label>
                                        <select name="courses" class="form-control select2" id="courses">
                                            <option value="">Select</option>
                                            @foreach ($courses as $key => $item)
                                                <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Course Code</label>
                                        <select name="courseCode" class="form-control select2" id="courseCode">
                                            <option value="">Select</option>
                                            @foreach ($courseCode as $key => $item)
                                                <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @if (Auth()->guard('admin')->user()->hasRole('Free Lancer'))
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Task Status</label>
                                            <select name="status" class="form-control select2" id="status">
                                                <option value="">All Task</option>
                                                <option value="PREVIEW">New Task</option>
                                                <option value="ACCEPTED">Accepted Task</option>
                                                <option value="ASSIGNED">Pending Task</option>
                                                <option value="COMPLETED">Completed Task</option>

                                            </select>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Date</label>
                                        <input type="text" class="form-control float-right" id="dates"
                                            name="dates">
                                    </div>
                                </div>


                            </div>

                        </form>
                        <br />

                        <div class="table-responsive">
                            <table style="width:100%" class="display nowrap table table-bordered data-table"
                                id="data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        @if (Auth()->guard('admin')->user()->hasRole('Admin') || Auth()->guard('admin')->user()->hasRole('Sub Admin'))
                                            <th style="width:100px;">Employees</th>
                                        @endif
                                        <th style="width:100px;">Start Date & Time</th>
                                        <th>End Date & Time</th>
                                        <th>College </th>
                                        <th>Task Group ID </th>
                                        <th>Subject </th>
                                        <th>Course </th>
                                        <th>Course Code</th>
                                        <th>Task Type</th>
                                        <th>Assignment Type</th>

                                        <th>Score</th>
                                        <th>Actual Length</th>
                                        <th>Words Written</th>
                                        <th>Status</th>
                                        <th width="250px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
            <!-- ROW-1 CLOSED -->
        </div>

        <!-- View MODAL -->
        <div class="modal fade" id="viewDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="assignFreeLancersForm" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Assign to Freelancer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Freelancers</label>
                                        <select required class="form-control select2" name="user_id" id="user_id">
                                            <option value="">Select</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Submit</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- View CLOSED -->





    </div>
@stop
@section('inlinejs')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script type="text/javascript"
        src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/js/dataTables.checkboxes.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="text/javascript">
        $('.js-example-basic-multiple').select2();



        $(document).on('click', '.assignModal', function() {
            $("#assignFreeLancersForm").attr('action', $(this).attr('data-url'));
            let created_by = $(this).attr('data-created_by');

            console.log("created_by", );
            $.ajax({
                url: '{{ route('get-freelancers') }}',
                type: 'get',
                data: {
                    task_id: $(this).attr('data-id'),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(data) {

                    $("#user_id").empty();
                    $("#user_id").append(`<option value=""> Select </li>`);
                    if (data.length > 0) {
                        $.each(data, function(key, value) {
                            if (created_by == value.id) {
                                $("#user_id").append(
                                    `<option selected value="${value.id}"> ${value.name} </li>`
                                );
                            } else {
                                $("#user_id").append(
                                    `<option value="${value.id}"> ${value.name} </li>`);
                            }

                        })
                    }


                    console.log("user_id", data);
                }
            });

        })

        var t = $('.table').DataTable({
            dom: 'lBfrtip',
            processing: true,
            serverSide: true,
            searchable: true,
            fixedColumns: true,
            fixedHeader: true,
            scrollX: true,
            "scrollCollapse": true,
            "pageLength": 50,
            order: [
                [0, 'DESC']
            ],
            lengthMenu: [
                [10, 25, 50, 100, 150, 200, 250, 300, 350, 400, 450, 500, -1],
                [10, 25, 50, 100, 150, 200, 250, 300, 350, 400, 450, 500, 'Show all']
            ],
            buttons: [{
                extend: 'csvHtml5',
                footer: true,
                text: 'Download CSV',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,
                        12
                    ] // Specify the column indexes you want to export
                }
            }],
            ajax: {
                url: "{{ route('ajax-tasks-list') }}",
                type: 'GET',
                data: function(d) {
                    d.created_by = $('#created_by option:selected').val();
                    d.subjects = $('#subjects option:selected').val();
                    d.colleges = $('#colleges option:selected').val();
                    d.courses = $('#courses option:selected').val();
                    d.courseCode = $('#courseCode option:selected').val();
                    d.dates = $('#dates').val();
                    d.status = $("#status option:selected").val();
                }
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                @if (Auth()->guard('admin')->user()->hasRole('Admin') || Auth()->guard('admin')->user()->hasRole('Sub Admin'))
                    {
                        data: 'createdBy',
                        name: 'createdBy'
                    },
                @endif {
                    data: 'start_date_time',
                    name: 'start_date_time',
                    "render": function(data, type, row) {
                        // Use Moment.js to format the date
                        if (data !== null) {
                            return moment(data).format('DD/MM/YYYY HH:mm:ss');
                        }

                        return "N/A";

                    }
                },
                {
                    data: 'end_date_time',
                    name: 'end_date_time',
                    "render": function(data, type, row) {
                        // Use Moment.js to format the date
                        if (data !== null) {
                            return moment(data).format('DD/MM/YYYY HH:mm:ss');
                        }

                        return "N/A";

                    }
                },
                {
                    data: 'college',
                    name: 'college'
                },
                {
                    data: 'unique_group_id',
                    name: 'unique_group_id'
                },
                {
                    data: 'subject',
                    name: 'subject'
                },
                {
                    data: 'course',
                    name: 'course'
                },
                {
                    data: 'course_code',
                    name: 'course_code'
                },
                {
                    data: 'task_type',
                    name: 'task_type'
                },
                {
                    data: 'assignment_type',
                    name: 'assignment_type'
                },
                {
                    data: 'score',
                    name: 'score'
                },
                {
                    data: 'actual_length',
                    name: 'actual_length'
                },
                {
                    data: 'words_written',
                    name: 'words_written'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        });

        flatpickr("#dates", {
            mode: "range",
            dateFormat: "Y-m-d", // Change date format as needed
            onClose: function(selectedDates, dateStr, instance) {
                // Redraw DataTable when date range changes
                t.draw();
            }
        });


        $(document).on('change', '#colleges,#created_by,#subjects,#courses,#courseCode,#status', function() {
            t.draw();
        })
    </script>
@stop
