@extends('admin.layouts.app')

@section('title')
<title>CoconCoach | {{$title}} List</title>
@stop


@section('breadcrum')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{$title}} List </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">{{$title}} </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@stop


@section('content')

<div class="content-header">
    <div class="side-app">
        
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    @if(Auth()->user()->can('Add Service'))
                    <a class="float-right btn btn-primary btn-sm" href="{{route('category-create')}}"><i class="fa fa-plus"></i> Add {{$title}}  </a>
                    @endif
                </div>
 
                <div class="card-body">

                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
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
            order: [[0,'desc']],
            processing: true,
            serverSide: true,
            ajax: "{{ route('category-list') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'status', name: 'status'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
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