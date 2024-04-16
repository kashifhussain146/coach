@extends('admin.layouts.app')
@section('title')
    <title>Create Category</title>
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
                    <h1 class="m-0">Category Create </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category Create</li>
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
            <form action="{{ route('subject-update',['id'=>$loan->id]) }}" method="POST" enctype="multipart/form-data" id="kt_inbox_compose_form">
            @else
            <form action="{{ route('subject-store') }}" method="POST" enctype="multipart/form-data" id="kt_inbox_compose_form">
            @endif

                @csrf
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class=""><strong> Category Section </strong> </h5><br />

                            

                            <div class="form-group">
                                <label class="form-label">Category *</label>
                                <select name="subject_category" id="subject_category" class="form-control select2">
                                    <option value="">Select Category</option>
                                    @foreach ($category as $item)
                                    <option @if(isset($loan)) @if($loan->subject_category==$item->id) selected @endif @endif  value="{{$item->id}}">{{$item->category_name}}</option>
                                    @endforeach
                                </select>
                                
                            </div>

                            <div class="form-group">
                                <label class="form-label">Title *</label>
                                <input type="text" class="form-control" value="{{(isset($loan))?$loan->subject_name:''}}" name="subject_name" id="subject_name"  placeholder="Title..">
                            </div>

                    

                            <div class="form-group">
                                <label class="form-label">Description </label>
                                <textarea class="form-control" style="height: 200px;" name="subject_desc" id="subject_desc" placeholder="description..">{{(isset($loan))?$loan->subject_desc:''}}</textarea>
                            </div>   
                            
                            <div class="form-group">
                                <label class="form-label">Status *</label>
                                <select name="status" id="status" class="form-control">
                                    <option @if(isset($loan)) @if($loan->status=='Y') selected @endif @endif  value="Y">Active</option>
                                    <option @if(isset($loan)) @if($loan->status=='N') selected @endif @endif value="N">Inactive</option>
                                </select>
                                
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" id="submitButton" class="btn btn-primary float-left" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." data-rest-text="Save">Save</button>
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
        $(function() {

          
            var instance =  CKEDITOR.replace( 'subject_desc' );

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
                            successMsg('Subjects Action', data.msg,
                                '{{ route('subject-list') }}');
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
                        errorMsg('Create Subjects',
                            'There has been an error, please alert us immediately');
                        buttonLoading('reset', $this);
                    }

                });

                return false;
            });
        });

        
                //editor.resize( '100%', '350' );
    </script>
@stop
