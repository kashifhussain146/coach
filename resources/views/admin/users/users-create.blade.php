@extends('admin.layouts.app')
@section('title')
    <title>Create User</title>
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
                        <form id="submitForm" enctype="multipart/form-data" method="post" action="{{ route('user-save') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="form-label">Name *</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Name..">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Email..">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Username *</label>
                                <input type="text" class="form-control" name="user_name" id="user_name"
                                    placeholder="Username..">
                            </div>

                            {{-- <div class="form-group">
                                <label class="form-label">Mobile No *</label>
                                <input type="text" class="form-control" name="mobile_no" id="mobile_no"
                                    placeholder="Mobile..">
                            </div> --}}

                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-10">
                                        <label class="form-label">Profile Image</label>
                                        <input type="file" onchange="readURL(this,'file')" class="form-control"
                                            name="profile_image" id="profile_image" placeholder="Mobile..">
                                    </div>

                                    <div class="col-2">
                                        <img src="#"
                                            id="file" style="height: 73px;width: 73px;" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Role *</label>
                                <select name="roles[]" id="roles" class="multi-select form-control">
                                    <option disabled value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
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
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select name="status" id="status" class="form-control custom-select">
                                    <option value="active">Active</option>
                                    <option value="inactive">InActive</option>
                                </select>
                            </div>
                            <div class="card-footer"></div>
                            <a href="{{url()->previous()}}">  <button type="button" class="btn btn-warning">{{__('Back')}}</button></a>&nbsp;&nbsp;
                            <button type="submit" id="submitButton" class="btn btn-primary float-right"
                                data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..."
                                data-rest-text="Create">Create</button>
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
        function readURL(input, imgId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + imgId).attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }


        // $('#roles').multiSelect({
        //     afterSelect: function(values) {
        //         if (values == 4) {
        //             $("#store_div").removeClass('d-none');
        //             $("#business_div").removeClass('d-none');
        //         } else if (values == 2) {
        //             $("#business_div").removeClass('d-none');
        //         }
        //         $("#usertype").val($('#roles option:selected').text());
        //     },
        //     afterDeselect: function(values) {
        //         $("#usertype").val('');
        //         if (values == 4) {
        //             $("#store_div").addClass('d-none');
        //             $("#business_div").addClass('d-none');
        //         } else if (values == 2) {
        //             $("#business_div").addClass('d-none');
        //         }

        //     }
        // });



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

                        successMsg('Create User', 'User Created...',data.route);
                        $('#submitForm')[0].reset();

                    } else {
                        $.each(data.errors, function(fieldName, field) {
                            $.each(field, function(index, msg) {
                                $('#' + fieldName).addClass('is-invalid state-invalid');
                                errorDiv = $('#' + fieldName).parent('div');
                                errorDiv.append('<div class="invalid-feedback">' + msg +
                                    '</div>');
                            });
                        });
                        errorMsg('Create User', 'Input error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Create User', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
        });



        function getPassword() {
            pass = Math.random().toString(36).slice(-8);
            $('#password').val(pass);
        }
    </script>
@stop
