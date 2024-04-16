@extends('admin.layouts.app')
@section('content')
<div class="content-header">
   <div class="side-app">
       @include('admin.layouts.pagehead')
        <div class="col-lg-8">
           <div class="card">
              <div class="card-header">
                 <h3 class="card-title">Banner Forms</h3>
              </div>

                   <div class="card-body">
                          
                     <h4 class="sub-title">{{__('Widget Page')}}</h4>
                     
                     {!! Form::open(array('method' => 'post', 'route' => 'admin.widget_pages.store', 'class' => 'form', 'files'=>true)) !!}
                     
                     @include('admin.widget_pages.inc.form')
                     
                     <div class="row">
                     
                        <div class="col-md-5"></div>
                     
                        <div class="col-md-4"><button type="submit" class="btn btn-primary">{{__('Create')}}</button></div>
                     
                     </div>
                           
                     
                  </div>

                  
               </div>
               
            </div>
            
         </div>
         
      </div>
@endsection
@push('js')
<script type="text/javascript">
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
</script>
@endpush