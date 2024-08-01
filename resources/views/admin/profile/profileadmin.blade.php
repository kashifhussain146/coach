@extends('admin.layouts.app')
@section('title')
<title>CoconCoach-Dashboard</title>
@stop
@section('content')

<div class="content-header">
        <div class="side-app">
            @include('admin.flash.alert')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Profile</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pl-0">
                <div class="card">
                    <div class="card-body">
                        
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"> <a class="nav-link @if(!isset($_GET['tab']) ||  isset($_GET['tab']) && $_GET['tab'] != 2) active @endif" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Profile</span></a> </li>
                            <li class="nav-item"> <a class="nav-link @if(isset($_GET['tab']) && $_GET['tab'] == 2) active @endif" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Change Passowrd</span></a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane @if(!isset($_GET['tab']) || isset($_GET['tab']) && $_GET['tab'] != 2) active @endif" id="home" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">General Form</h4>
                                        <h6 class="card-subtitle"> All with bootstrap element classies </h6> -->
                                        @if(isset($user))
                                            {{ Form::model($user, ['route' => ['admin.updateprofile', $user->id], 'method' => 'post', "enctype" => "multipart/form-data", 'id' => 'admin-profile-form']) }}
                                        @endif
                                            <div class="form-group required {{ $errors->has('name') ? 'has-error' : '' }}">
                                                <label for="exampleInputPassword1">First Name<span class="text-danger"> *</span></label>
                                                {{ Form::text('name', old('firstname'), ['class' => 'form-control no_space no_special_char','placeholder' => 'First Name']) }}
                                                    @if($errors->has('name'))
                                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                                    @endif
                                            </div>

                                            <div class="form-group required {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                                <label for="exampleInputPassword1">Last Name <span class="text-danger"> *</span></label>
                                                {{ Form::text('last_name', old('last_name'), ['class' => 'form-control  no_space no_special_char','placeholder' => 'Last Name']) }}
                                                    @if($errors->has('last_name'))
                                                    <span class="help-block">{{ $errors->first('last_name') }}</span>
                                                    @endif
                                            </div>
                                            <div class="form-group required {{ $errors->has('email') ? 'has-error' : '' }}">
                                                @if($user->email!='')
                                                <label for="exampleInputPassword1">Email</label>
                                                <br />
                                                <p class="border p-2">{{$user->email}}</p>

                                                @else
                                                <label for="exampleInputPassword1">Email<span class="text-danger"> *</span></label>
                                                {{ Form::text('email', old('email'), ['class' => 'form-control','placeholder' => 'Email','id'=>'email']) }}
                                                    @if($errors->has('email'))
                                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="form-group required {{ $errors->has('mobile_no') ? 'has-error' : '' }}">
                                                @if($user->mobile_no!='')
                                                <label for="exampleInputPassword1">Phone</label>
                                                <br />
                                                <p class="border p-2">{{$user->mobile_no}}</p>
                                                @else
                                                <label for="exampleInputPassword1">Phone<span class="text-danger"> *</span></label>
                                                {{ Form::text('mobile_no', old('mobile_no'), ['class' => 'form-control numeric_input','placeholder' => 'Phone']) }}
                                                    @if($errors->has('mobile_no'))
                                                    <span class="help-block">{{ $errors->first('mobile_no') }}</span>
                                                    @endif
                                                @endif

                                            </div>
                                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                            <label for="parent">Profile Image</label>
                                            <input type="file" id="image" name="image" accept="image/png,image/jpeg,image/jpg" class="form-control" />

                                            @if(isset($user->profile_image))
                                            <br />
                                            <td><img class="d-block" src="{{asset('images/'.$user->profile_image)}}" alt="" height="80px"></td>
                                            @endif
                                            @if($errors->has('image'))
                                            <span class="help-block">{{ $errors->first('image') }}</span>
                                            @endif
                                            </div>
                                            <input type="submit" class="btn btn-primary" value="Submit">
                                            <a href="{{ route('admin.dashboard') }}" class="btn btn-warning btn-flat" title="Back"><i class="fa fa-fw fa-chevron-circle-left"></i> Back</a>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane @if(isset($_GET['tab']) && $_GET['tab'] == 2) active @endif" id="profile" role="tabpanel">
                            <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">General Form</h4>
                                        <h6 class="card-subtitle"> All with bootstrap element classies </h6> -->
                                        @if(isset($user))
                                            {{ Form::model($user, ['route' => ['admin.updateprofile', $user->id], 'method' => 'post', "enctype" => "multipart/form-data", 'id'=>'admin-change-password']) }}
                                        @endif
                                            <input type="hidden" name="tab" value="2">
                                            {{-- <div class="form-group required {{ $errors->has('currentpassword') ? 'has-error' : '' }}">
                                                <label for="exampleInputPassword1">Old Password<span class="text-danger"> *</span></label>
                                                <input type="password" class="form-control  @error('currentpassword') is-invalid @enderror" placeholder="Old Password" name="currentpassword" >
                                                @error('currentpassword')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div> --}}

                                            <div class="col-md-12 pl-0">
                                                <label for="exampleInputPassword1">Old Password<span class="text-danger"> *</span></label>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control  @error('currentpassword') is-invalid @enderror" placeholder="Old Password" name="currentpassword"  id="currentpassword">
                                                    <div class="input-group-append">
                                                        <button id="currentpasswordBtn" class="btn btn-outline-secondary" type="button"> <i class="fa fa-eye-slash" id="eye"></i></button>
                                                    </div>
                                                </div>
                                                
                                                @error('currentpassword')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                                
                                            </div>
                                            <div id="old-password-errors"></div>
                                            
                                            {{-- <div class="form-group required {{ $errors->has('newpassword') ? 'has-error' : '' }}">
                                                <label for="exampleInputPassword1">New Password<span class="text-danger"> *</span></label>
                                                <input type="password"  class="form-control  @error('newpassword') is-invalid @enderror" placeholder="New Password" name="newpassword" >
                                                    @error('newpassword')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                            </div> --}}

                                            <div class="col-md-12 pl-0">
                                                <label for="exampleInputPassword1">New Password<span class="text-danger"> *</span></label>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control  @error('newpassword') is-invalid @enderror" placeholder="New Password" name="newpassword" id="newpassword" >
                                                    <div class="input-group-append">
                                                        <button id="newpasswordBtn" class="btn btn-outline-secondary" type="button"> <i class="fa fa-eye-slash" id="eye"></i></button>
                                                    </div>
                                                </div>
                                                
                                                @error('newpassword')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                                
                                            </div>
                                            <div id="new-password-errors"></div>




                                            {{-- <div class="form-group required {{ $errors->has('newpassword_confirmation') ? 'has-error' : '' }}">
                                                <label for="exampleInputPassword1">Confirm Password<span class="text-danger"> *</span></label>
                                                <input type="password"  class="form-control  @error('newpassword_confirmation') is-invalid @enderror" placeholder="Confirm Password" name="newpassword_confirmation" >
                                                @error('newpassword_confirmation')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div> --}}



                                            <div class="col-md-12 pl-0">
                                                <label for="exampleInputPassword1">Confirm Password<span class="text-danger"> *</span></label>
                                                <div class="input-group mb-3">
                                                    <input type="password"  class="form-control  @error('newpassword_confirmation') is-invalid @enderror" placeholder="New Confirm Password" name="newpassword_confirmation" id="newpassword_confirmation" >
                                                    <div class="input-group-append">
                                                        <button id="newpassword_confirmationBtn" class="btn btn-outline-secondary" type="button"> <i class="fa fa-eye-slash" id="eye"></i></button>
                                                    </div>
                                                </div>
                                                
                                                @error('newpassword_confirmation')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                                
                                            </div>
                                            <div id="new-confirm-password-errors"></div>


                                            <input type="submit" class="btn btn-primary" value="Submit">
                                            <a href="{{ route('admin.dashboard') }}" class="btn btn-warning btn-flat" title="Back"><i class="fa fa-fw fa-chevron-circle-left"></i> Back</a>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
</div>
@stop

@section('inlinejs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/additional-methods.min.js" integrity="sha512-owaCKNpctt4R4oShUTTraMPFKQWG9UdWTtG6GRzBjFV4VypcFi6+M3yc4Jk85s3ioQmkYWJbUl1b2b2r41RTjA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

jQuery.validator.addMethod("email_domain", function(value, element) {
        var email = $("#email").val();
        var emailRegex = /^[a-zA-Z0-9._-]+@(?:[a-zA-Z0-9.-]+\.(?:com|in|org|io))$/;
        if (email.match(emailRegex)) {
            return true;
        } else {
        return false;
        }
    }, "Please enter a complete email address.");

$('#admin-profile-form').validate({
    rules: {
        @if($user->email=='')
        "email": {required: true,minlength: 2,maxlength: 50, email:true,email_domain:true},
        @endif
        "firstname": {
            required: true,
            minlength: 2,
            maxlength: 50,
        },
        "lastname": {
            required: true,
            minlength: 2,
            maxlength: 50,
        },
        "mobile":{
            required: true,
            minlength: 2,
            maxlength: 20,
        },
        "image": {extension: "jpeg|png|jpg"},
        
    },
    messages: {
        "firstname": {
            required: "Please enter first name.",
            minlength: "First name must be at least {0} characters long.",
            maxlength: "The first name should be maximum {0} characters.",
        },
        "lastname": {
            required: "Please enter last name.",
            minlength: "Last name must be at least {0} characters long.",
            maxlength: "The last name should be maximum {0} characters.",
        },
        "mobile": {
            required: "Please enter mobile number.",
            minlength: "Mobile number must be at least {0} characters long.",
            maxlength: "The mobile number should be maximum {0} characters.",
        },
        "image": {
            extension: "Please select file of type jpg,jpeg or png.",
            accept: "Please select file of type jpg,jpeg or png.",
        },
    },
    submitHandler: function (form) {     
        $('input[type="submit"]').attr("disabled", true);   
        form.submit();
    }
}); 

$('#admin-change-password').validate({
    rules: {
        "currentpassword": {
            required: true,
            minlength: 2,
            maxlength: 50,
        },
        "newpassword": {
            required: true,
            minlength: 6,
            maxlength: 50,
        },
        "newpassword_confirmation": {
            required: true,
            minlength: 6,
            maxlength: 50,
            equalTo: "#newpassword"
        }
    },
    errorPlacement : function( error, element ){
        var name = element.attr("name");
        if(name=='currentpassword'){
            error.appendTo('#old-password-errors');
        }
        else if(name=='newpassword'){
            error.appendTo('#new-password-errors');                    
        }
        else if(name=='newpassword_confirmation'){
            error.appendTo('#new-confirm-password-errors');                    
        }
        else {
            error.insertAfter(element);
        }
    },
    messages: {
        "currentpassword": {
            required: "Please enter old password.",
            minlength: "Old password must be at least {0} characters long.",
            maxlength: "The old password should be maximum {0} characters.",
        },
        "newpassword": {
            required: "Please enter new password.",
            minlength: "New password must be at least {0} characters long.",
            maxlength: "The new password should be maximum {0} characters.",
        },
        "newpassword_confirmation": {
            required: "Please enter confirm password.",
            minlength: "Confirm password must be at least {0} characters long.",
            maxlength: "The confirm password should be maximum {0} characters.",
            equalTo:"Please enter the same password as a new password"
        }
    },
    submitHandler: function (form) {     
        $('input[type="submit"]').attr("disabled", true);   
        form.submit();
    }
}); 






    const currentpassword = $('#currentpassword');
    const currentpasswordButton = $('#currentpasswordBtn');

    currentpasswordButton.on('click', function() {
        const type = currentpassword.attr('type') === 'password' ? 'text' : 'password';
        currentpassword.attr('type', type);

        // Toggle eye icon between open and closed
        $("#currentpasswordBtn i").addClass('fa');
        $("#currentpasswordBtn i").toggleClass('fa-eye fa-eye-slash');
    });


    const newpassword = $('#newpassword');
    const newpasswordBtn = $('#newpasswordBtn');

    newpasswordBtn.on('click', function() {
        const type2 = newpassword.attr('type') === 'password' ? 'text' : 'password';
        newpassword.attr('type', type2);

        // Toggle eye icon between open and closed
        $("#newpasswordBtn i").addClass('fa');
        $("#newpasswordBtn i").toggleClass('fa-eye fa-eye-slash');
    });



    const newpassword_confirmation = $('#newpassword_confirmation');
    const newpassword_confirmationBtn = $('#newpassword_confirmationBtn');

    newpassword_confirmationBtn.on('click', function() {
        const type2 = newpassword_confirmation.attr('type') === 'password' ? 'text' : 'password';
        newpassword_confirmation.attr('type', type2);

        // Toggle eye icon between open and closed
        $("#newpassword_confirmationBtn i").addClass('fa');
        $("#newpassword_confirmationBtn i").toggleClass('fa-eye fa-eye-slash');
    });

</script>
@endsection
