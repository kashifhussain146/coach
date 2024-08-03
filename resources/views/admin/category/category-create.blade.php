@extends('admin.layouts.app')
@section('title')
    <title>{{$title}}</title>
@stop

@section('inlinecss')
    <link type="text/css" rel="stylesheet"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@stop

@section('breadcrum')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{$title}} </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')

    <div class="content-header">
        <div class="side-app">
            @if(isset($loan))
            <form action="{{ route('category-update',['id'=>$loan->id]) }}" method="POST" enctype="multipart/form-data" id="kt_inbox_compose_form">
            @else
            <form action="{{ route('category-store') }}" method="POST" enctype="multipart/form-data" id="kt_inbox_compose_form">
            @endif

                @csrf
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class=""><strong> Add form </strong> </h5><br />
                            <div class="form-group">
                                <label class="form-label">Title *</label>
                                <input type="text" class="form-control" value="{{(isset($loan))?$loan->title:''}}" name="title" id="title"  placeholder="Title..">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Image *</label>
                                
                                <div class="row">
                                    <div class="col-md-10 ">
                                        <input style="margin-top: 20px;" id="image" type="file" class="form-control align-middle custom-file-input" name="image" onchange="readURL(this, 'FileImg');">
                                        <label class="text-dark mt-4 ml-2 custom-file-label" for="value">Choose file</label>
                                    </div>
                                    
                                    <div class="col-md-2 ">
                                        <img id="FileImg" src="@if(!empty($loan->image)){{asset(''.$loan->image)}}@else{{asset('notfound.png')}}@endif" style="width: 71px;height: 71px">
                                    </div>
                                </div>

                             </div>

                            <div class="form-group">
                                <label class="form-label">Description </label>
                                <textarea class="form-control" style="height: 200px;" name="description" id="description" placeholder="description..">{{(isset($loan))?$loan->description:''}}</textarea>
                            </div>   
                            
                            <div class="form-group">
                                <label class="form-label">Status *</label>
                                <select name="status" id="status" class="form-control">
                                    <option @if(isset($loan)) @if($loan->status=='active') selected @endif @endif  value="active">Active</option>
                                    <option @if(isset($loan)) @if($loan->status=='inactive') selected @endif @endif value="inactive">Inactive</option>
                                </select>
                            </div>

                        </div>

                        <div class="card-footer">
                            <a href="{{url()->previous()}}">  <button type="button" class="btn btn-warning">{{__('Back')}}</button></a>&nbsp;&nbsp;
                            <button type="submit" id="submitButton" class="btn btn-primary float-right" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." data-rest-text="Save">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

@stop
@section('inlinejs')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <script>

            $("#image").change(function(){
                readURL(this);
            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#FileImg').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

        $(function() {

          
           

            $('#kt_inbox_compose_form').submit(function() {

                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }

                
                var $this = $('#submitButton');
                buttonLoading('loading', $this);
                $('.is-invalid').removeClass('is-invalid state-invalid');
                $('.invalid-feedback').remove();
                $.ajax({
                    url: $('#kt_inbox_compose_form').attr('action'),
                    type: "POST",
                    processData: false, // Important!
                    contentType: false,
                    cache: false,
                    data: new FormData($('#kt_inbox_compose_form')[0]),
                    success: function(data) {
                        if (data.status) {
                            var btn = '';
                            successMsg('Category Action', data.msg,
                                '{{ route('category-list') }}');
                            $('#kt_inbox_compose_form')[0].reset();

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
                            errorMsg('Errors', 'Input Error');
                        }
                        buttonLoading('reset', $this);

                    },
                    error: function() {
                        errorMsg('Create Category',
                            'There has been an error, please alert us immediately');
                        buttonLoading('reset', $this);
                    }

                });

                return false;
            });
        });

        var editor =  CKEDITOR.replace( 'description' );
                //editor.resize( '100%', '350' );
    </script>
@stop
