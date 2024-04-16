@extends('admin.layouts.app')
@section('title')
    <title>List User</title>
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
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users</h3>
                        <div class="ml-auto pageheader-btn">

                            
                                <a href="{{ route('user-create') }}" class="float-right btn btn-success btn-icon text-white mr-2">
                                    <span>
                                        <i class="fa fa-plus"></i>
                                    </span> Add Account
                                </a>

                          
                        </div>
                    </div>
                    <div class="card-body ">
                       
                            <form action="{{ route('user-list') }}" method="get" id="export-form">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="">Select All</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>

                            </form>
                       <br />
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>UserName</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th width="150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <!-- ROW-1 CLOSED -->
        </div>

        <!-- View MODAL -->
        <div class="modal fade" id="viewDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.js-example-basic-multiple').select2();


        var t = $('.table').DataTable({
            dom: 'lBfrtip',
            processing: true,
            serverSide: true,
            searchable: true,
            "pageLength": 100,
            "order": [[0, 'asc' ]],
            ajax: {
                url: "{{ route('ajax-user-list') }}",
                type: 'GET',
                data: function (d) {
                    d.status = $('#status').val();
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'user_name', name: 'user_name'},
                {data: 'email', name: 'email'},
                {data: 'mobile_no', name: 'mobile_no'},
                {data: 'roles', name: 'roles'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action',orderable:false}
            ]
        });

        $(function() {
            $(document).on('click', '.viewDetail', function() {
                $('#viewDetail').modal('show');
                url = $(this).attr('data-url');
                $('#viewDetail').find('.modal-body').html(
                    '<p class="ploading"><i class="fa fa-spinner fa-spin"></i></p>')
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        $('#viewDetail').find('.modal-body').html(data);
                    }
                });
            });

        });

        $(document).on('change','#status',function(){
            t.draw();
        })

    </script>
@stop
