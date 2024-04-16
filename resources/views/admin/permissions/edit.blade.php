@extends('user::layouts.master')

@section('content')
<style>
    .box{border-top: 0px !important;}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            Permission Manager
            <small>Edit Permission</small>
        </h1>
        </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{route('permissions')}}">Permissions</a></li>
            <li class="breadcrumb-item"><a href="#">Edit</a></li>
        </ol>
            </div>
          </div>
        </div>
      </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title">Edit Permission  </h3>

                <div class="card-tools float-right">
                    <a href="{{route('permissions')}}" class="btn btn-primary btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                              {!! Form::open(array('route' => array('user.role.update'),'id'=>'permission')) !!}
                              <input type="hidden" name="module_id" value="{{Request::segment(3)}}">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Roles</label><span class="astrict">*</span>
                                                <select name="status" class="form-control">
                                                    <option value="">Select Role</option>
                                                    @foreach($role as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                       
                            <!-- /.box-header -->
                            <div class="card-body table-responsive no-padding">
                                <table class="table  table-hover w-100">
                                    <tbody><tr>

                                            <th>Module Name</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>View</th>
                                            <th>Delete</th>


                                        </tr>

                                        @foreach($modules as $module)

                                        <tr>
                                            <td>{{ $module->name }}</td>
                                            <td><input type="checkbox" name="add[]" class="module"></td>
                                            <td><input type="checkbox" name="edit[]" class="module"></td>
                                            <td><input type="checkbox" name="view[]" class="view-module module"></td>
                                            <td><input type="checkbox" name="delete[]" class="module"></td>


                                        </tr>
                                        @endforeach

                                    </tbody></table>
                                <div class="sub-module">
                                    <table class="table  table-hover w-100">
                                        <tbody><tr>

                                                <th>SubModule Name</th>
                                                <th>Add</th>
                                                <th>Edit</th>
                                                <th>View</th>
                                                <th>Delete</th>


                                            </tr>

                                            @foreach($subModules as $subModules)
                                            <tr>
                                                <td>{{ $subModules->name}}</td>
                                                <td><input type="checkbox" name="add[]"></td>
                                                <td><input type="checkbox" name="edit[]"></td>
                                                <td><input type="checkbox" name="view[]"></td>
                                                <td><input type="checkbox" name="delete[]"></td>


                                            </tr>
                                            @endforeach

                                        </tbody></table>
                                </div>


                            </div>
                            <!-- form start -->

                          

                            <!-- /.box-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm ">Submit</button>
                            </div>
                            {{ Form::close() }}
                        </div>


                    </div>
                </div>

            </div>
            <!-- /.box-body -->

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>


@stop
@push('scripts')
<script>
    if ($('.module').prop("checked") == false) {
        $('.sub-module').addClass('hide');
    }
    $('document').ready(function () {

        $('.module').click(function () {
            if ($('#permission :checkbox:checked').length > 0) {
               $('.sub-module').removeClass('hide');
            } else {
                $('.sub-module').addClass('hide');
            }
          

        });
    });

</script>

@endpush
