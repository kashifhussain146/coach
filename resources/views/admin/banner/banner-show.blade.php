@extends('admin.layouts.app')
@section('title')
<title> Banner </title>
@stop
@section('inlinecss')
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
<link href="{{ asset('admin/assets/multiselectbox/css/ui.multiselect.css') }}" rel="stylesheet">
@stop
@section('breadcrum')
<h1 class="page-title">View Banner </h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Banner </a></li>
    <li class="breadcrumb-item active" aria-current="page">View</li>
</ol>
@stop
@section('content')
<div class="content-header">
    <div class="side-app">
        
           
<br />
        <div class="card p-3 pt-3" style="overflow: scroll">
            
            <h4 class="font-weight-bold">Banner Information</h4>
            <table class="table table-bordered data-table" id="data">
                <tbody>

                     

                     <tr>
                       <th>Title</th>
                       <td colspan="12">{{(isset($banner->title))?$banner->title:'N/A'}}</td>
                     </tr>

                      

                     <tr>
                       <th>Link</th>
                       <td colspan="12">{{(isset($banner->link))?$banner->link:'N/A'}}</td>
                     </tr>

                     <tr>
                       <th>Banner</th>
                       <td colspan="12"><img id="FileImg" src="@if(!empty($banner->banner)){{url('public/'.$banner->banner)}}@else{{url('/public/notfound.png')}}@endif" style="width: 71px;height: 71px"></td>
                     </tr>

                     <tr>
                       <th>Status</th>
                       <td colspan="12">@if($banner->status ==1)<span class="badge badge-success">Active </span>@else<span class="badge badge-danger">InActive </span>@endif  </td>
                     </tr>
                     <tr>
                       <th>Is Offer</th>
                       <td colspan="12">@if($banner->is_offer ==1)<span class="badge badge-success">Yes </span>@else<span class="badge badge-danger">No </span>@endif  </td></td>
                     </tr>
                     <tr>
                       <th>Is Services</th>
                       <td colspan="12">@if($banner->is_service ==1)<span class="badge badge-success">Yes </span>@else<span class="badge badge-danger">No </span>@endif  </td></td>
                     </tr>
                     

                     
                    </tbody>
              </table>

        </div>






</div><!-- COL END -->

@stop
@section('inlinejs')
<script>
$('#pdfprint').click(function () {
window.print()
});


 
</script>
@stop
