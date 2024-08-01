@extends('admin.layouts.app')
@section('title')
<title>Roles | Fcs-Dashboard</title>
@stop
@section('inlinecss')

@stop

@section('breadcrum')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{$title}} Create </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{$title}} Create</li>
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
                    <h3 class="card-title">Roles</h3>
                    <div class="ml-auto pageheader-btn">
                            <a href="{{route('roles-create')}}" class="float-right btn btn-success btn-icon text-white mr-2">
                                <span>
                                    <i class="fa fa-plus"></i>
                                </span> Add Role
                            </a>
                        </div>
                </div>
                <div class="card-body ">

                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key=>$val)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>@if(!empty($val->name)){{$val->name}}@endif</td>
                        <td>@if(!empty($val->created_at)){{$val->created_at}}@endif</td>
                        <td  class="text-left">
                            <a href="{{route("roles-edit", $val->id)}}" class="edit btn btn-primary btn-sm">Edit</a>
                            
                        </td>
                    </tr>
                    @endforeach
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
           var table = $('.data-table').DataTable();
        });
    </script>
@stop
