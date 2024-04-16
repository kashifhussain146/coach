
@extends('admin.layouts.app')


@section('breadcrum')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">View Email Template </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">View Email Template </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')
<style>
    .box{border-top: 0px !important;}
</style>
<div class="content-header">
    <section class="content">
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title">View Email Template  </h3>

                <div class="card-tools float-right">
                    <a href="{{route('emailtemplates')}}" class="btn btn-primary btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>

                </div>
            </div>
            <div class="card-body">


                <p class="text-justify"><strong>Email Type:</strong> {{ $emailtemplate->type }}</p>
                <p class="text-justify"><strong>Subject:</strong> {{ $emailtemplate->subject }}</p>
                <hr />
                <p class="text-justify word-wrap"><strong>Template:</strong> {!! $emailtemplate->template !!}</p>
                <hr />
                <p class="text-justify"><strong>Status:</strong> {!! ($emailtemplate->status == 1)?'<span class="label label-xs label-success"> Active </span>':'<span class="label label-danger"> In Active </span>' !!}</p>
                <p><strong>Created At:</strong> {{ $emailtemplate->created_at }}</p>
                <p><strong>Updated At:</strong> {{ $emailtemplate->updated_at }}</p>




</div>
            <!-- /.box-body -->

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
@stop