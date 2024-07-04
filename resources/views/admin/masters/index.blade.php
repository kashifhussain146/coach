@extends('admin.layouts.app')

@section('title')
    <title>CoconCoach |Assignment Category</title>
@stop

@section('inlinecss')

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

                        @can('Module_Add_master')
                        <a class="float-right btn btn-primary btn-sm" href="{{ route('masters-create') }}"><i
                                class="fa fa-plus"></i> Add {{ $title }} </a>

                        @endif
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered data-table w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email Subject</th>
                                        <th>URL</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>College Name</th>
                                        <th>Course Code</th>
                                        <th>Course Name</th>
                                        <th>Subject Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Grade</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>


@stop

@section('inlinejs')

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(function() {

            var table = $('.data-table').DataTable({
                order: [
                    [0, 'desc']
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('ajax-masters-list') }}",
                scroller: {
                    loadingIndicator: true
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'emailsubject',
                        name: 'emailsubject'
                    },
                    {
                        data: 'url',
                        name: 'url'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'password',
                        name: 'password'
                    },
                    {
                        data: 'college_name',
                        name: 'college_name'
                    },
                    {
                        data: 'course_code',
                        name: 'course_code'
                    },
                    {
                        data: 'course_name',
                        name: 'course_name'
                    },
                    {
                        data: 'subject_name',
                        name: 'subject_name'
                    },
                    {
                        data: 'startdate',
                        name: 'startdate'
                    },
                    {
                        data: 'enddate',
                        name: 'enddate'
                    },
                    {
                        data: 'grade',
                        name: 'grade'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });



            // $(document).on('click','.deleteButton', function(){

            //     var con = confirm('Are You Sure Want to Delete This Record');
            //     if(con)
            //     {
            //         row = $(this).closest('tr');
            //         url = $(this).attr('data-url');
            //         var $this = $(this);
            //         buttonLoading('loading', $this);
            //         $.ajax({
            //             url: url,
            //             type: 'GET',
            //             success: function(data){
            //                 row.remove();
            //             }
            //         });
            //     }

            // });

        });
    </script>
@stop
