{{-- 
<div class="col-lg-12">
    <div class="card">
        
        <div class="card-body">
        
            <div class="form-group">
                <label class="form-label">Name: {{$user->name}}</label>
                
            </div>

            <div class="form-group">
                <label class="form-label">Email: {{$user->email}}</label>
                
            </div>

            <div class="form-group col-sm-6">
                <label class="form-label">Status : @if($user->status == 1) Active @else InActive @endif</label>
            </div>
            
           
        </div>
        
    </div>
</div>
        
      


 --}}



 @extends('admin.layouts.app')
@section('title')
    <title>View User</title>
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
                    
                    <div class="card-body">
                       
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td>{{ $user->user_name }}</td>
                                </tr>
                                {{-- <tr>
                                    <th>Mobile No</th>
                                    <td>{{ $user->mobile_no }}</td>
                                </tr> --}}
                                <tr>
                                    <th>Profile Image</th>
                                    <td>
                                        <img src="{{ $user->profile_image ? asset($user->profile_image) : '#' }}"
                                            style="height: 73px; width: 73px;" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>{{ implode(', ', $user->roles->pluck('name')->toArray()) }}</td>
                                </tr>
                                <tr>
                                    <th>Password</th>
                                    <td>
                                        <!-- Display the password or a message -->
                                        {{ $user->password ? '********' : 'Not set' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $user->status == 'active' ? 'Active' : 'Inactive' }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="text-align: center; margin-top: 20px;">
                            <a href="{{url()->previous()}}">  <button type="button" class="btn btn-warning">{{__('Back')}}</button></a>&nbsp;&nbsp;
                        </div>
                        
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
            @endsection
