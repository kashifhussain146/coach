@extends('admin.layouts.app')
@section('title')
<title>Edit Get A Quote</title>
@stop

@section('inlinecss')
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">@stop

@section('breadcrum')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Get A Quote Edit </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Get A Quote Edit</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@stop

@section('content')

<div class="content-header">
    <div class="side-app">
        
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Edit Get A Quote</h3>
               </div>
 
               <div class="card-body">
               

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.get-a-quote.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <h5>Update Meta Data</h5>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Meta Title" class="form-control" name="contactmetatitle" value="{{ $contactUs->contactmetatitle ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Meta Description" class="form-control" name="contactmetadesc" value="{{ $contactUs->contactmetadesc ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Meta Keyword" class="form-control" name="contactmetakeyword" value="{{ $contactUs->contactmetakeyword ?? '' }}">
                            </div>

                            <h5>Section Banner</h5>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Banner Heading" class="form-control" name="contactmainhead" value="{{ $contactUs->contactmainhead ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Banner Description" class="form-control" name="contactmaindesc" value="{{ $contactUs->contactmaindesc ?? '' }}">
                            </div>

                            <h5>Above Footer Section</h5>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Tagline" class="form-control" name="contactlasthead" value="{{ $contactUs->contactlasthead ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Title" class="form-control" name="contactlastdesc" value="{{ $contactUs->contactlastdesc ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Heading One" class="form-control" name="contactlastmail" value="{{ $contactUs->contactlastmail ?? '' }}">
                            </div>
                            <a href="{{url()->previous()}}">  <button type="button" class="btn btn-warning">{{__('Back')}}</button></a>&nbsp;&nbsp;
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        
                </div>
             </div>
         
            </div>
         
        </div>
    
    </div>
@stop
@section('inlinejs')
  <script>
    $(function () {

        $('#kt_inbox_compose_form').submit(function(){
        var $this = $('#submitButton');
        buttonLoading('loading', $this);
        $('.is-invalid').removeClass('is-invalid state-invalid');
        $('.invalid-feedback').remove();
        $.ajax({
            url: $('#kt_inbox_compose_form').attr('action'),
            type: "POST",
            processData: false,  // Important!
            contentType: false,
            cache: false,
            data: new FormData($('#kt_inbox_compose_form')[0]),
            success: function(data) {
                if(data.status){
                    var btn = '';
                    successMsg('Create Category', data.msg, btn);
                    $('#kt_inbox_compose_form')[0].reset();

                }else{
                    $.each(data.errors, function(fieldName, field){
                        $.each(field, function(index, msg){
                            $('#'+fieldName).addClass('is-invalid state-invalid');
                        errorDiv = $('#'+fieldName).parent('div');
                        errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                        });
                    });
                    errorMsg('Create Category', 'Input Error');
                }
                buttonLoading('reset', $this);

            },
            error: function() {
                errorMsg('Create Category', 'There has been an error, please alert us immediately');
                buttonLoading('reset', $this);
            }

        });

        return false;
        });
});
</script>
@stop