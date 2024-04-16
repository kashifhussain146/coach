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
          <h1 class="m-0">Assignment Category </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Assignment Category </li>
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
                    <h3 class="card-title">Assignment Form</h3>
                    <a class="float-right btn btn-primary btn-sm" href="{{route('assignment-category-create')}}"><i class="fa fa-plus"></i> Add Category  </a>
                </div>
 
                <div class="card-body">

                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                {{-- <th>Image</th> --}}
                                <th>Status</th>
                                <th>Created_at</th>
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
</div>


@stop

@section('inlinejs')

<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(function () {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            "columnDefs": 
            [ 
                {
                  "targets": 1,
                  "defaultContent": "",
                }
            ],
            ajax: "{{ route('assignment-category-list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
               // {data: 'image', name: 'image'},
                {data: 'status', name: 'status'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });



        $(document).on('click','.deleteButton', function(){

            var con = confirm('Are You Sure Want to Delete This Record');
            if(con)
            {
                row = $(this).closest('tr');
                url = $(this).attr('data-url');
                var $this = $(this);
                buttonLoading('loading', $this);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data){
                        row.remove();
                    }
                });
            }

        });

    });
</script>
@stop