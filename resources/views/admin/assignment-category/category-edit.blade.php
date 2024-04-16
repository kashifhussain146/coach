@extends('admin.layouts.app')
@section('title')
<title>Edit Category</title>
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
        
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Category Form</h3>
               </div>
 
               <div class="card-body">
               

                <form action="{{route('assignment-category-update',['id'=>$loan->id])}}" method="POST" enctype="multipart/form-data" id="kt_inbox_compose_form">
                    @csrf
                        <div class="form-group">
                            <label class="form-label">Title *</label>
                            <input type="text" value="{{$loan->title}}" class="form-control" name="title" id="title" placeholder="Title..">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Description *</label>
                            <textarea  class="form-control" name="description" id="description" placeholder="description..">{{$loan->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Icon Class *</label>
                            <input type="text" class="form-control" value="{{$loan->icon}}" name="icon" id="icon" placeholder="Icon..">
                        </div>
                       

                            <button type="submit" id="submitButton" class="btn btn-primary float-left"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Create">Create</button>
                        
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