@extends('admin.layouts.app')
@section('content')
<div class="content-header">
   <div class="side-app">
       @include('admin.layouts.pagehead')
      <!-- Main-body start -->
      <div class="card-body">
         <div class="page-wrapper">
            <!-- Page header start -->
            <div class="card-header">
               <div class="card-title">
                  <h4>{{__('Widget Pages List')}}</h4>
               </div>
               <div class="page-header-breadcrumb">
                  <ul class="breadcrumb-title">
                     <li class="breadcrumb-item">
                        <a href="{{url('/admin')}}">
                        <i class="icofont icofont-home"></i>
                        </a>
                     </li>                     
                     <li class="breadcrumb-item">{{__('Widget Pages List')}}
                     </li>
                  </ul>
               </div>
            </div>
            <!-- Page header end -->
            <!-- Page body start -->
            <div class="page-body">
               <div class="row">
                  <div class="col-sm-12">
                     <!-- Basic Form Inputs card start -->
                     <div class="card">
                        
                        <div class="card-block table-border-style">
                           <div class="table-responsive">
                              <table class="table table-bordered">
                              <thead>
                                 <tr>
                                    <th>{{__('Widget Page Name')}}</th>
                                    <th>{{__('Widget Page Slug')}}</th>
                                    <th>{{__('Action')}}</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @if($widget_pages)
                                 @foreach($widget_pages as $widget_page)
                                 <tr>
                                    <td>{{$widget_page->title}}</td>
                                    <td>{{$widget_page->slug}}</td>
                                    <td>
                                      <a href="{{route('admin.widget_pages.edit',$widget_page->id)}}" class="tabledit-edit-button btn btn-primary waves-effect waves-light"><span class="icofont icofont-ui-edit"></span>&nbsp {{__('Edit')}}</a>
                                      
                                       <a href="{{route('admin.widget_pages.delete',$widget_page->id)}}" class="tabledit-delete-button btn btn-danger waves-effect waves-light"><span class="icofont icofont-ui-delete"></span>&nbsp {{__('Delete')}}</a>
                                    </td>
                                 </tr>
                                 @endforeach
                                 @endif
                              </tbody>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Page body end -->
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
               title: ' <strong>Task Done!</strong> ',
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