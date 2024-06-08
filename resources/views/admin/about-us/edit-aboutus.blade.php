@extends('admin.layouts.app')
@section('title')
<title>Edit About Us</title>
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
          <h1 class="m-0">About Us Edit </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">About Us Edit</li>
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
                  <h3 class="card-title">Edit About Us Page</h3>
               </div>
 
               <div class="card-body">
               

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('about-us.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <h5>Update Meta Data</h5>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Meta Title" class="form-control" name="aboutusmetatitle" value="{{ $aboutUs->aboutusmetatitle ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Meta Description" class="form-control" name="aboutusmetadesc" value="{{ $aboutUs->aboutusmetadesc ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Meta Keyword" class="form-control" name="aboutusmetakeyword" value="{{ $aboutUs->aboutusmetakeyword ?? '' }}">
                            </div>

                            <h5>Section Banner</h5>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Banner Description" class="form-control" name="aboutusbannerdesc" value="{{ $aboutUs->aboutusbannerdesc ?? '' }}">
                            </div>

                            <h5>Section 2</h5>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Tagline" class="form-control" name="aboutsectwotagline" value="{{ $aboutUs->aboutsectwotagline ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Title" class="form-control" name="aboutsectwoheading" value="{{ $aboutUs->aboutsectwoheading ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Heading One" class="form-control" name="aboutsectwoinnerheadingone" value="{{ $aboutUs->aboutsectwoinnerheadingone ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Text One" class="form-control" name="aboutsectwoinnertextone" value="{{ $aboutUs->aboutsectwoinnertextone ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Heading Two" class="form-control" name="aboutsectwoinnerheadingtwo" value="{{ $aboutUs->aboutsectwoinnerheadingtwo ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Text Two" class="form-control" name="aboutsectwoinnertexttwo" value="{{ $aboutUs->aboutsectwoinnertexttwo ?? '' }}">
                            </div>

                            <h5>Section 3</h5>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Tagline" class="form-control" name="aboutsecthreetagline" value="{{ $aboutUs->aboutsecthreetagline ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Heading One" class="form-control" name="aboutsecthreeheadone" value="{{ $aboutUs->aboutsecthreeheadone ?? ''}}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Heading Two" class="form-control" name="aboutsecthreeheadtwo" value="{{ $aboutUs->aboutsecthreeheadtwo ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Heading Three" class="form-control" name="aboutsecthreeheadthree" value="{{ $aboutUs->aboutsecthreeheadthree ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Description One" class="form-control" name="aboutsecthreedescone" value="{{ $aboutUs->aboutsecthreedescone ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Description Two" class="form-control" name="aboutsecthreedesctwo" value="{{ $aboutUs->aboutsecthreedesctwo ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Description Three" class="form-control" name="aboutsecthreedescthree" value="{{ $aboutUs->aboutsecthreedescthree ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="file" placeholder="Upload JPG or PNG" class="form-control" name="aboutsecthreeimageone">
                                    @if(!empty($aboutUs->aboutsecthreeimageone))
                                        <img src="{{ asset($aboutUs->aboutsecthreeimageone) }}" alt="Image One" style="max-width: 200px;">
                                    @else
                                        <p>No image uploaded</p>
                                    @endif
                            </div>
                            <div class="form-group">
                                <input type="file" placeholder="Upload JPG or PNG" class="form-control" name="aboutsecthreeimagetwo">
                                @if(!empty($aboutUs->aboutsecthreeimageone))
                                        <img src="{{ asset($aboutUs->aboutsecthreeimagetwo) }}" alt="Image One" style="max-width: 200px;">
                                    @else
                                        <p>No image uploaded</p>
                                    @endif
                            </div>
                            <div class="form-group">
                                <input type="file" placeholder="Upload JPG or PNG" class="form-control" name="aboutsecthreeimagethree">
                                @if(!empty($aboutUs->aboutsecthreeimageone))
                                        <img src="{{ asset($aboutUs->aboutsecthreeimagethree) }}" alt="Image One" style="max-width: 200px;">
                                    @else
                                        <p>No image uploaded</p>
                                    @endif
                            </div>
                            
                            <h5>Section 4</h5>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Tagline" class="form-control" name="aboutsecfourtagline" value="{{ $aboutUs->aboutsecfourtagline ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Heading" class="form-control" name="aboutsecfourheading" value="{{ $aboutUs->aboutsecfourheading ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Inner Heading One" class="form-control" name="aboutsecfourinnerheadone" value="{{ $aboutUs->aboutsecfourinnerheadone ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Inner Description One" class="form-control" name="aboutsecfourinnerdescone" value="{{ $aboutUs->aboutsecfourinnerdescone ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Inner Heading Two" class="form-control" name="aboutsecfourinnerheadtwo" value="{{ $aboutUs->aboutsecfourinnerheadtwo ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Inner Description Two" class="form-control" name="aboutsecfourinnerdesctwo" value="{{ $aboutUs->aboutsecfourinnerdesctwo ?? '' }}">
                            </div>

                            <h5>Section FAQ</h5>
                            <div class="form-group">
                                <input type="text" placeholder="Enter FAQ Tagline" class="form-control" name="aboutsecfaqtagline" value="{{ $aboutUs->aboutsecfaqtagline ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter FAQ Question One" class="form-control" name="aboutsecfaqheadone" value="{{ $aboutUs->aboutsecfaqheadone ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter FAQ Answer One" class="form-control" name="aboutsecfaqdescone" value="{{ $aboutUs->aboutsecfaqdescone ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter FAQ Question Two" class="form-control" name="aboutsecfaqheadtwo" value="{{ $aboutUs->aboutsecfaqheadtwo ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter FAQ Answer Two" class="form-control" name="aboutsecfaqdesctwo" value="{{ $aboutUs->aboutsecfaqdesctwo ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter FAQ Question Three" class="form-control" name="aboutsecfaqheadthree" value="{{ $aboutUs->aboutsecfaqheadthree ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter FAQ Answer Three" class="form-control" name="aboutsecfaqdescthree" value="{{ $aboutUs->aboutsecfaqdescthree ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter FAQ Question Four" class="form-control" name="aboutsecfaqheadfour" value="{{ $aboutUs->aboutsecfaqheadfour ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter FAQ Answer Four" class="form-control" name="aboutsecfaqdescfour" value="{{ $aboutUs->aboutsecfaqdescfour ?? '' }}">
                            </div>

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