@extends('admin.layouts.app')


@section('breadcrum')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Permission Create </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Permission Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')

<div class="content-header">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            Permission Manager
            <small>Permission Manager</small>
        </h1>
        </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{route('permissions')}}">Permissions</a></li>
            <li class="breadcrumb-item">Lists</li>
        </ol>
            </div>
          </div>
        </div>
      </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <!-- Default box -->
        <div class="card">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            <div class="card-header with-border">
                <h3 class="card-title">Permissions List</h3>


            </div>
            <div class="card-body">
                {!! Form::open(array('route' => array('permissions.update'),'id'=>'permission')) !!}
                <div class="row">
                    <div class="col-sm-12">


                            <!-- /.box-header -->
                            <div class="card-body table-responsive no-padding">

                                <div class="form-group roles-col">
                                    <label for="exampleInputEmail1">Roles</label><span class="astrict">*</span>
                                    <select name="role_id" class="form-control roles-permissio">
                                        <option value="">Select Role</option>
                                        @foreach($role as $role)
                                        <option value="{{$role->id}}" {{($role->slug==Auth::user()->roles->first()->slug)?'selected':''}}>{{$role->name}}</option>
                                        @endforeach
                                    </select>

                                </div>




                            </div>

                            <!-- /.box-body -->

                        <!-- /.box -->
                    </div>
                </div>

                <div class=" container-fluid">
                    <div class="row permission-section">
                        @php $privious_value = ''; @endphp



                        <div class="row">
                            <div class="col-lg-12">

                                <div class="permissions-listing">
                                    <div class="row listing-row">
                                        @foreach($permissions as $permission)

                                        @if($permission->module != $privious_value)
                                        <div class="col-md-12 col-sm-12 permissions-col "> <h3>

                                                {{ ucwords(str_replace('-', ' ', $permission->module)) }}
                                            </h3>
                                        </div>
                                        @endif

                                        <div class="col-md-4 col-sm-6 permissions-col chk">
                                            <input type="checkbox" id="permission{{$permission->id}}" name="permission_id[]" value="{{$permission->id}}" {{(!in_array($permission->id, $permissionsIds))?'':'checked'}}>
                                            <label for="permission{{$permission->id}}">    {{ ucwords(str_replace('-', ' ', $permission->name)) }} ({{ $permission->slug }})  </label>      </div>
                                        @php $privious_value = $permission->module; @endphp
                                        @endforeach
                                    </div>
                                </div>

                            </div>



                        </div>

                        <div class="box-footer btn-bottom">
                            <button type="submit" class="btn btn-primary btn-sm ">Submit</button>
                        </div>

                    </div>
                    {{ Form::close() }}
                    <!-- /.box-body -->
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->
</div>
@stop

@push('scripts')
<script>

    $('document').ready(function () {
        $("select.roles-permissio").change(function () {

            var selectedRole = $(this).children("option:selected").val();
            var url = "{{route('permissions.roles')}}";
            url = url + "/" + selectedRole;

            $.ajax({

                url: url,
                type: 'GET',
                cache: false,
                success: function (result)
                {
                    if (result) {

                        $('.permission-section').html(result);
                    } else {
                        //toastr.error("Error ! while loading page content.");
                    }

                },
                error: function (data)
                {
                    // toastr.error("Error ! while loading page content.");
                }
            });
        })


        $('#permission').validate({
            rules: {
                role_id: {
                    required: true,

                },

            },

            errorElement: 'div',
            errorClass: 'help-block',
            highlight: function (element, errorClass, validClass) {
                $(element).parents("div.form-group").addClass('has-error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents(".has-error").removeClass('has-error');
            }
        })

    })
</script>
@endpush
