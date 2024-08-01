@extends('admin.layouts.app')
@section('breadcrum')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{$module->term}} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">{{$module->term}} </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@stop
@section('title')
<title>{{$module->name}}</title>
@endsection

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="{{asset('admin/assets/pages/filer/jquery.filer.css')}}" type="text/css" rel="stylesheet" />
<link href="{{asset('admin/assets/pages/filer/jquery.filer-dragdropbox-theme.css')}}" type="text/css" rel="stylesheet" />
@endpush

@section('content')
<div class="content-header">
   <div class="side-app">
       
        <div class="col-lg-12">
           <div class="card">
            
              @if(\Session::has('error'))
                <div class="alert alert-danger">{{\Session::get('error')}}</div>
              @endif
              @if(\Session::has('message.added'))
              <div class="alert alert-success">{{\Session::get('message.content')}}</div>
            @endif
              <div class="card-header">
                 <h3 class="card-title">{{$module->term}} Inputs</h3>
              </div>

              <div class="card-body">

                

               {!! Form::model($module_data, array('method' => 'post', 'route' => array('admin.modules.data.update',$module->slug), 'class' => 'form', 'files'=>true)) !!}       

               {!! Form::hidden('id', $module_data->id) !!}
       

               @include('admin.modules_data.inc.form')
       

               <div class="row">
       

                  <div class="col-md-5"></div>
       
<a href="{{url()->previous()}}">  <button type="button" class="btn btn-warning">{{__('Back')}}</button></a>&nbsp;&nbsp;
                  <div class="col-md-4"><button type="submit" class="btn btn-primary">{{__('Update')}}</button></div>
       

               </div>

            </div>

         </div>
        
      </div>
   </div>
</div>
@endsection
@push('js')
<script src="{{asset('admin/assets/pages/filer/jquery.fileuploadsedit.init.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('.select2').select2();
});

$('.summernote').summernote({
    placeholder: 'Please enter a Description',
    height: 400
});

@if(session()->has('message.added'))
            
    
    $(document).ready(function() {
   
    /*--------------------------------------
         Notifications & Dialogs
     ---------------------------------------*/
    /*
     * Notifications
     */
    function notify(from, align, icon, type, animIn, animOut){
        $.growl({
            icon: icon,
            title: ' <strong>Created Successfully!</strong> ',
            message: "{!! session('message.content') !!}",
            url: ''
        },{
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                from: from,
                align: align
            },
            offset: {
                x: 30,
                y: 30
            },
            spacing: 10,
            z_index: 999999,
            delay: 2500,
            timer: 1000,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                enter: animIn,
                exit: animOut
            },
            icon_type: 'class',
            template: '<div data-growl="container" class="alert" role="alert">' +
            '<button type="button" class="close" data-growl="dismiss">' +
            '<span aria-hidden="true">&times;</span>' +
            '<span class="sr-only">Close</span>' +
            '</button>' +
            '<span data-growl="icon"></span>' +
            '<span data-growl="title"></span>' +
            '<span data-growl="message"></span>' +
            '<a href="#" data-growl="url"></a>' +
            '</div>'
        });
    };

    

        var nFrom = 'top';
        var nAlign = 'right';
        var nIcons = $(this).attr('data-icon');
        var nType = 'success';
        var nAnimIn = 'animated flipInY';
        var nAnimOut = 'animated flipOutY';

        notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut);

});
@endif

$("#title").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        $("#slug").val(Text);        
});
</script>
@endpush