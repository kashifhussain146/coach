@extends('admin.layouts.app')

@section('title')
<title>CoconCoach-Dashboard</title>
@stop

@section('inlinecss')

@stop

@section('breadcrum')

<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
   Bidding Dashboard
</h1>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
   <li class="breadcrumb-item text-muted">
      <a href="../index.html" class="text-muted text-hover-primary">
          Home </a>
   </li>
   <!--end::Item-->
   <!--begin::Item-->
   <li class="breadcrumb-item">
      <span class="bullet bg-gray-400 w-5px h-2px"></span>
   </li>
   <!--end::Item-->
   
   <!--begin::Item-->
   <li class="breadcrumb-item text-muted">
      Banner </li>
   <!--end::Item-->
</ul>

@stop
@section('content')
<form action="{{route('banner-store')}}" method="POST" enctype="multipart/form-data" id="kt_inbox_compose_form">
@csrf
<div class="d-flex flex-column mb-5 fv-row bnr-heading">
   <!--begin::Label-->
   <h3>
       Banner Tittle
   </h3>
   <label class="fs-5 fw-semibold mb-2"></label>
   <!--end::Label-->

   <!--begin::Input-->
   <input class="form-control form-control-solid" placeholder="" name="title" id="title">
   <!--end::Input-->
</div>
<!-- short Despcription -->
<div class="flex-lg-row-fluid ms-lg-7 ms-xl-10 ms-xl-101 ">

   <!--begin::Card-->
   <h3>
       Short Description
   </h3>
   <div class="card shrt-dscrptn">
            <textarea class="form-control" name="description" id="description"></textarea>
   </div>
   <!--end::Card-->

</div>
<!-- short Despcription end -->
<div class="d-flex">
  
   <div class="d-flex flex-column mb-5 fv-row bnr-heading">
           <!--begin::Label-->
           <h3>
             Button Text
           </h3>
           <label class="fs-5 fw-semibold mb-2"></label>
           <!--end::Label-->

           <!--begin::Input-->
           <input type="text" class="form-control form-control-solid" placeholder="" name="link" id="link" fdprocessedid="c3it16">
           <!--end::Input-->
   </div>

   
</div>


<div class="d-flex">
  
    
 

    <div class="form-group col-md-10">
        <label for="exampleInputFile">
          Media
        </label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" name="web_banner" id="web_banner" class="custom-file-input">
            <label class="custom-file-label" for="exampleInputFile">
              Choose file
            </label>
          </div>
        </div>
        
      </div>

      

    
 </div>

 <div class="d-flex flex-column brn-btn1 bnr-btn media-btn flex-sm-row d-grid gap-2 ">
    <button data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Create" id="submitButton" type="submit" class="btn btn-primary flex-shrink-0" style="background: rgba(84, 67, 240, 0.868)"
       >Save</button>
</div>



</form>
<!-- media-file -->
<div class="card card-flush">
  
   <!--begin::Card header-->
   <div class="card-header pt-8 media-file">
       <!--begin::Card toolbar-->
       <div class="card-toolbar">
           <!--begin::Toolbar-->
           <div class="d-flex justify-content-end btn-clr" data-kt-filemanager-table-toolbar="base">
                
              
                
               <!--end::Add customer-->
               
           </div>
        
           
           <div class="d-flex justify-content-end align-items-center d-none"
               data-kt-filemanager-table-toolbar="selected">
               <div class="fw-bold me-5">
                   <span class="me-2" data-kt-filemanager-table-select="selected_count"></span> Selected
               </div>

               <button type="button" class="btn btn-danger" data-kt-filemanager-table-select="delete_selected">
                   Delete Selected
               </button>
           </div>

           <!--end::Group actions-->
       </div>
       <!--end::Card toolbar-->
   </div>
   <!--end::Card header-->

   <!--begin::Card body-->
   <div class="card-body">
       <!--begin::Table header-->
       
       <!--end::Table header-->

       <!--begin::Table-->
       <div id="kt_file_manager_list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
           <div class="table-responsive">
               <table id="kt_file_manager_list" data-kt-filemanager-table="files"
                   class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                   <thead>
                       <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                           <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1"
                               style="width: 29.8958px;">
                               <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                   <input class="form-check-input" type="checkbox" data-kt-check="true"
                                       data-kt-check-target="#kt_file_manager_list .form-check-input"
                                       value="1">
                               </div>
                           </th>
                           <th class="min-w-250px sorting_disabled" rowspan="1" colspan="1"
                               style="width: 353.292px;">Tittle</th>
                           <th class="min-w-10px sorting_disabled" rowspan="1" colspan="1"
                               style="width: 375.2188px;">Image</th>
                           <th class="min-w-125px sorting_disabled " rowspan="1" colspan="1"
                               style="width: 221.677px;">Action</th>
                           
                           
                       </tr>
                   </thead>
                   <tbody class="fw-semibold text-gray-600">
                        @if(count($data) >0 )
                            @foreach ($data as $item)
                            <tr class="odd">
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="ki-duotone ki-files fs-2x text-primary me-4"></i> <a href="#"
                                            class="text-gray-800 text-hover-primary">{{$item->title}}</a>
                                    </div>
                                </td>
                                
                                <td data-order="2023-06-24T20:43:00+05:30">	<img src="{{asset(''.$item->web_banner)}}" alt="" width="80px" height="80px"></td>
                                <td class="text-end" data-kt-filemanager-table="action_dropdown">
                                    <div class="d-flex">
                                        <!--begin::Share link-->
                                        <div class="ms-2" data-kt-filemanger-table="copy_link">
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-fasten fs-5 m-0"><span
                                                        class="path1"></span><span class="path2"></span></i>
                                            </button>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-300px"
                                                data-kt-menu="true">
                                                <!--begin::Card-->
                                                <div class="card card-flush">
                                                    <div class="card-body p-5">
                                                        <!--begin::Loader-->
                                                        <div class="d-flex"
                                                            data-kt-filemanger-table="copy_link_generator">
                                                            <!--begin::Spinner-->
                                                            <div class="me-5" data-kt-indicator="on">
                                                                <span class="indicator-progress">
                                                                    <span
                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                </span>
                                                            </div>
                                                            <!--end::Spinner-->

                                                            <!--begin::Label-->
                                                            <div class="fs-6 text-dark">Generating Share Link...
                                                            </div>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Loader-->

                                                        <!--begin::Link-->
                                                        <div class="d-flex flex-column text-start d-none"
                                                            data-kt-filemanger-table="copy_link_result">
                                                            <div class="d-flex mb-3">
                                                                <i
                                                                    class="ki-duotone ki-check fs-2 text-success me-3"></i>
                                                                <div class="fs-6 text-dark">Share Link Generated
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control form-control-sm"
                                                                value="https://path/to/file/or/folder/">
                                                            <div class="text-muted fw-normal mt-2 fs-8 px-3">Read
                                                                only. <a href="settings/.html" class="ms-2">Change
                                                                    permissions</a></div>
                                                        </div>
                                                        <!--end::Link-->
                                                    </div>
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Share link-->

                                        <!--begin::More-->
                                        <div class="ms-2">
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-dots-square fs-5 m-0"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span><span class="path4"></span></i>
                                            </button>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Download File
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"
                                                        data-kt-filemanager-table="rename">
                                                        Rename
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"
                                                        data-kt-filemanager-table-filter="move_row"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_move_to_folder">
                                                        Move to folder
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link text-danger px-3"
                                                        data-kt-filemanager-table-filter="delete_row">
                                                        Delete
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::More-->
                                    </div>
                                </td>
                            </tr>                        
                            @endforeach
                        @else
                        <tr>
                            <td colspan="12"> <center><h2>No records found</h2></center></td>
                        </tr>
                        @endif
                   </tbody>
               </table>
           </div>

           
           <div class="row">
               <div
                   class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
               </div>
               <div
                   class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                   <div class="dataTables_paginate paging_simple_numbers" id="kt_file_manager_list_paginate">
                       <ul class="pagination">
                           <li class="paginate_button page-item previous disabled"
                               id="kt_file_manager_list_previous"><a href="#"
                                   aria-controls="kt_file_manager_list" data-dt-idx="0" tabindex="0"
                                   class="page-link"><i class="previous"></i></a></li>
                           <li class="paginate_button page-item active"><a href="#"
                                   aria-controls="kt_file_manager_list" data-dt-idx="1" tabindex="0"
                                   class="page-link">1</a></li>
                           <li class="paginate_button page-item "><a href="#"
                                   aria-controls="kt_file_manager_list" data-dt-idx="2" tabindex="0"
                                   class="page-link">2</a></li>
                           <li class="paginate_button page-item "><a href="#"
                                   aria-controls="kt_file_manager_list" data-dt-idx="3" tabindex="0"
                                   class="page-link">3</a></li>
                           <li class="paginate_button page-item "><a href="#"
                                   aria-controls="kt_file_manager_list" data-dt-idx="4" tabindex="0"
                                   class="page-link">4</a></li>
                           <li class="paginate_button page-item "><a href="#"
                                   aria-controls="kt_file_manager_list" data-dt-idx="5" tabindex="0"
                                   class="page-link">5</a></li>
                           <li class="paginate_button page-item "><a href="#"
                                   aria-controls="kt_file_manager_list" data-dt-idx="6" tabindex="0"
                                   class="page-link">6</a></li>
                           <li class="paginate_button page-item "><a href="#"
                                   aria-controls="kt_file_manager_list" data-dt-idx="7" tabindex="0"
                                   class="page-link">7</a></li>
                           <li class="paginate_button page-item next" id="kt_file_manager_list_next"><a
                                   href="#" aria-controls="kt_file_manager_list" data-dt-idx="8" tabindex="0"
                                   class="page-link"><i class="next"></i></a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
       <!--end::Table-->
   </div>
   <!--end::Card body-->
</div>
<!-- media-file -->

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
             successMsg('Create Banner', data.msg, btn);
             $('#kt_inbox_compose_form')[0].reset();

         }else{
             $.each(data.errors, function(fieldName, field){
                 $.each(field, function(index, msg){
                     $('#'+fieldName).addClass('is-invalid state-invalid');
                    errorDiv = $('#'+fieldName).parent('div');
                    errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                 });
             });
             errorMsg('Create Banner', 'Input Error');
         }
         buttonLoading('reset', $this);

     },
     error: function() {
         errorMsg('Create Banner', 'There has been an error, please alert us immediately');
         buttonLoading('reset', $this);
     }

 });

 return false;
});
});
</script>
@stop