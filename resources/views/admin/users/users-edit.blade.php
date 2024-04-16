@extends('admin.layouts.app')
@section('title')
    <title>Edit User</title>
@stop

@section('inlinecss')
    <link href="{{ asset('admin/assets/multiselectbox/css/multi-select.css') }}" rel="stylesheet">
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
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Forms</h3>
                    </div>
                    <div class="card-body">
                        <form id="submitForm" method="post" enctype="multipart/form-data" action="{{ route('user-update', $user->id) }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="form-label">Name *</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Name.." value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Email.." value="{{ $user->email }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Username *</label>
                                <input type="text" class="form-control" value="{{ $user->user_name }}" name="user_name" id="user_name"
                                    placeholder="Username..">
                            </div>

                            {{-- <div class="form-group">
                                <label class="form-label">Mobile No *</label>
                                <input type="text" class="form-control" name="mobile_no" id="mobile_no"
                                    value="{{ $user->mobile_no }}" placeholder="Mobile..">
                            </div> --}}


                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-10">
                                        <label class="form-label">Profile Image</label>
                                        <input type="file" onchange="readURL(this,'file')" class="form-control"
                                            name="profile_image" id="profile_image" placeholder="Mobile..">
                                    </div>

                                    <div class="col-2">
                                        @if ($user->profile_image != '')
                                            <img id="profile_image_select" src="{{ asset('' . $user->profile_image) }}"
                                                style="width:100px">
                                        @else
                                            <img src="https://www.awesomegreece.com/wp-content/uploads/2018/10/default-user-image.png"
                                                id="file" style="height: 73px;width: 73px;" />
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Role *</label>
                                <select name="roles[]" id="roles"  class="multi-select form-control">
                                    <option disabled value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option @if (in_array($role->id, $userRole)) selected @endif
                                            value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Password *</label>
                                <div class="input-group">
                                    <input type="text" name="password" id="password" class="form-control"
                                        placeholder="">
                                    <span class="input-group-append">
                                        <button class="btn btn-primary" type="button"
                                            onclick="getPassword()">Generate!</button>
                                    </span>
                                </div>


                            </div>
                            
                            
                            <div class="form-group ">
                                <label class="form-label">Status</label>
                                <select name="status" id="status" class="form-control custom-select">
                                    <option @if ($user->status == 'active') selected @endif value="active">Active</option>
                                    <option @if ($user->status == 'inactive') selected @endif value="inactive">InActive
                                    </option>
                                </select>
                            </div>

                            <div class="card-footer"></div>
                            <button type="submit" id="submitButton" class="btn btn-primary float-right"
                                data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..."
                                data-rest-text="Update">Update</button>
                    </div>
                    </form>
                </div>

            </div>
        </div><!-- COL END -->

        <!--  End Content -->

    </div>
    </div>

@stop
@section('inlinejs')
    <script src="{{ asset('admin/assets/multiselectbox/js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript">
        function getStoresByBusiness() {
            var busId = 'business_id=' + $("#business_id option:selected").val();
            var busName = $("#business_id option:selected").text();
            $("#business_name").val(busName);

            $.ajax({
                type: 'get',
                url: '/get-stores-business',
                data: busId,
                dataType: 'json',
                complete: function() {},
                success: function(data) {
                    $("#store_id").empty();
                    $("#store_id").append('<option value="">Select</option>');
                    for (i in data) {
                        $("#store_id").append('<option value="' + data[i]['id'] + '">' + data[i]['store_name'] +
                            '</option>');
                    }
                }
            });

        }
        $(function() {
            // $('#roles').multiSelect();
            $('#submitForm').submit(function() {
                var $this = $('#submitButton');
                buttonLoading('loading', $this);
                $('.is-invalid').removeClass('is-invalid state-invalid');
                $('.invalid-feedback').remove();
                $.ajax({
                    url: $('#submitForm').attr('action'),
                    type: "POST",
                    processData: false, // Important!
                    contentType: false,
                    cache: false,
                    data: new FormData($('#submitForm')[0]),
                    success: function(data) {
                        if (data.status) {

                            successMsg('Update User', 'User Saved...',data.route);
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
                            errorMsg('Create User', 'Input error');
                        }
                        buttonLoading('reset', $this);

                    },
                    error: function() {
                        errorMsg('Update User',
                            'There has been an error, please alert us immediately');
                        buttonLoading('reset', $this);
                    }

                });

                return false;
            });

        });

        $("#profile_image").change(function() {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#profile_image_select').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        function getPassword() {
            pass = Math.random().toString(36).slice(-8);
            $('#password').val(pass);
        }
    </script>
@stop
