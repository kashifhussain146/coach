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


<div class="d-flex flex-column mb-5 fv-row bnr-heading">
   <!--begin::Label-->
   <h3>
       Banner Tittle
   </h3>
   <label class="fs-5 fw-semibold mb-2"></label>
   <!--end::Label-->

   <!--begin::Input-->
   <input class="form-control form-control-solid" placeholder="" name="subject">
   <!--end::Input-->
</div>
<!-- short Despcription -->
<div class="flex-lg-row-fluid ms-lg-7 ms-xl-10 ms-xl-101 ">

   <!--begin::Card-->
   <h3>
       Short Description
   </h3>
   <div class="card shrt-dscrptn">


       <div class="card-body p-0">
           <!--begin::Form-->
           <form id="kt_inbox_compose_form">
               <!--begin::Body-->
               <div class="d-block">
                   <!--begin::To-->

                   <!--end::To-->

                   <!--begin::CC-->
                   <div class="d-none align-items-center border-bottom ps-8 pe-5 min-h-50px"
                       data-kt-inbox-form="cc">
                       <!--begin::Label-->
                       <div class="text-dark fw-bold w-75px">
                           Cc:
                       </div>
                       <!--end::Label-->

                       <!--begin::Input-->
                       <tags
                           class="tagify form-control form-control-transparent border-0 tagify--noTags tagify--empty"
                           tabindex="-1">
                           <span contenteditable="" tabindex="0" data-placeholder="&ZeroWidthSpace;"
                               aria-placeholder="" class="tagify__input" role="textbox"
                               aria-autocomplete="both" aria-multiline="false"></span>
                           &ZeroWidthSpace;
                       </tags><input type="text" class="form-control form-control-transparent border-0"
                           name="compose_cc" value="" data-kt-inbox-form="tagify" tabindex="-1">
                       <!--end::Input-->

                       <!--begin::Close-->
                       <span class="btn btn-clean btn-xs btn-icon" data-kt-inbox-form="cc_close">
                           <i class="ki-duotone ki-cross fs-5"><span class="path1"></span><span
                                   class="path2"></span></i> </span>
                       <!--end::Close-->
                   </div>
                   <!--end::CC-->

                   <!--begin::BCC-->
                   <div class="d-none align-items-center border-bottom inbox-to-bcc ps-8 pe-5 min-h-50px"
                       data-kt-inbox-form="bcc">
                       <!--begin::Label-->
                       <div class="text-dark fw-bold w-75px">
                           Bcc:
                       </div>
                       <!--end::Label-->

                       <!--begin::Input-->
                       <tags
                           class="tagify form-control form-control-transparent border-0 tagify--noTags tagify--empty"
                           tabindex="-1">
                           <span contenteditable="" tabindex="0" data-placeholder="&ZeroWidthSpace;"
                               aria-placeholder="" class="tagify__input" role="textbox"
                               aria-autocomplete="both" aria-multiline="false"></span>
                           &ZeroWidthSpace;
                       </tags><input type="text" class="form-control form-control-transparent border-0"
                           name="compose_bcc" value="" data-kt-inbox-form="tagify" tabindex="-1">
                       <!--end::Input-->

                       <!--begin::Close-->
                       <span class="btn btn-clean btn-xs btn-icon" data-kt-inbox-form="bcc_close">
                           <i class="ki-duotone ki-cross fs-5"><span class="path1"></span><span
                                   class="path2"></span></i> </span>
                       <!--end::Close-->
                   </div>
                   <!--end::BCC-->

                   <!--begin::Subject-->

                   <!--end::Subject-->

                   <!--begin::Message-->
                   <div class="ql-toolbar ql-snow px-5 border-top-0 border-start-0 border-end-0"><span
                           class="ql-formats"><span class="ql-header ql-picker"><span class="ql-picker-label"
                                   tabindex="0" role="button" aria-expanded="false"
                                   aria-controls="ql-picker-options-0"><svg viewBox="0 0 18 18">
                                       <polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon>
                                       <polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon>
                                   </svg></span><span class="ql-picker-options" aria-hidden="true"
                                   tabindex="-1" id="ql-picker-options-0"><span tabindex="0" role="button"
                                       class="ql-picker-item" data-value="1"></span><span tabindex="0"
                                       role="button" class="ql-picker-item" data-value="2"></span><span
                                       tabindex="0" role="button"
                                       class="ql-picker-item ql-selected"></span></span></span><select
                               class="ql-header" style="display: none;">
                               <option value="1"></option>
                               <option value="2"></option>
                               <option selected="selected"></option>
                           </select></span><span class="ql-formats"><button type="button" class="ql-bold"><svg
                                   viewBox="0 0 18 18">
                                   <path class="ql-stroke"
                                       d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z">
                                   </path>
                                   <path class="ql-stroke"
                                       d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z">
                                   </path>
                               </svg></button><button type="button" class="ql-italic"><svg viewBox="0 0 18 18">
                                   <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line>
                                   <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line>
                                   <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line>
                               </svg></button><button type="button" class="ql-underline"><svg
                                   viewBox="0 0 18 18">
                                   <path class="ql-stroke"
                                       d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path>
                                   <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15">
                                   </rect>
                               </svg></button></span><span class="ql-formats"><button type="button"
                               class="ql-image"><svg viewBox="0 0 18 18">
                                   <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect>
                                   <circle class="ql-fill" cx="6" cy="7" r="1"></circle>
                                   <polyline class="ql-even ql-fill"
                                       points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline>
                               </svg></button><button type="button" class="ql-code-block"><svg
                                   viewBox="0 0 18 18">
                                   <polyline class="ql-even ql-stroke" points="5 7 3 9 5 11"></polyline>
                                   <polyline class="ql-even ql-stroke" points="13 7 15 9 13 11"></polyline>
                                   <line class="ql-stroke" x1="10" x2="8" y1="5" y2="13"></line>
                               </svg></button></span></div>
                   <div id="kt_inbox_form_editor"
                       class="bg-transparent border-0 h-350px px-3 ql-container ql-snow">
                       <div class="ql-editor ql-blank" data-gramm="false" contenteditable="true"
                           data-placeholder="Type your text here...">
                           <p><br></p>
                       </div>
                       <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                       <div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer"
                               target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2"
                               data-link="https://quilljs.com" data-video="Embed URL"><a
                               class="ql-action"></a><a class="ql-remove"></a></div>
                   </div>
                   <!--end::Message-->

                   <!--begin::Attachments-->
                   <div class="dropzone dropzone-queue px-8 py-4" id="kt_inbox_reply_attachments"
                       data-kt-inbox-form="dropzone">
                       <div class="dropzone-items">

                       </div>
                       <div class="dz-default dz-message"><button class="dz-button" type="button">Drop files
                               here to upload</button></div>
                   </div>
                   <!--end::Attachments-->
               </div>
               <!--end::Body-->

               <!--begin::Footer-->
               <div class="d-flex flex-stack flex-wrap gap-2 py-5 ps-8 pe-5 border-top">
                   <!--begin::Actions-->
                   <div class="d-flex align-items-center me-3">
                       <!--begin::Send-->
                       <div class="btn-group me-4">
                           <!--begin::Submit-->

                           <!--end::Submit-->

                           <!--begin::Send options-->

                           <!--begin::Menu-->
                           <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                               data-kt-menu="true" style="">
                               <!--begin::Menu item-->
                               <div class="menu-item px-3">
                                   <a href="#" class="menu-link px-3">
                                       Schedule send
                                   </a>
                               </div>
                               <!--end::Menu item-->

                               <!--begin::Menu item-->
                               <div class="menu-item px-3">
                                   <a href="#" class="menu-link px-3">
                                       Save &amp; archive
                                   </a>
                               </div>
                               <!--end::Menu item-->

                               <!--begin::Menu item-->
                               <div class="menu-item px-3">
                                   <a href="#" class="menu-link px-3">
                                       Cancel
                                   </a>
                               </div>
                               <!--end::Menu item-->
                           </div>
                           <!--end::Menu--> </span>
                           <!--end::Send options-->
                       </div>
                       <!--end::Send-->

                       <!--begin::Upload attachement-->
                       <span class="btn btn-icon btn-sm btn-clean btn-active-light-primary me-2 dz-clickable"
                           id="kt_inbox_reply_attachments_select" data-kt-inbox-form="dropzone_upload">
                           <i class="ki-duotone ki-paper-clip fs-2 m-0"></i> </span>
                       <!--end::Upload attachement-->

                       <!--begin::Pin-->
                       <span class="btn btn-icon btn-sm btn-clean btn-active-light-primary">
                           <i class="ki-duotone ki-geolocation fs-2 m-0"><span class="path1"></span><span
                                   class="path2"></span></i> </span>
                       <!--end::Pin-->
                   </div>
                   <!--end::Actions-->

                   <!--begin::Toolbar-->
                   <div class="d-flex align-items-center">
                       <!--begin::More actions-->
                       <span class="btn btn-icon btn-sm btn-clean btn-active-light-primary me-2"
                           data-toggle="tooltip" title="More actions">
                           <i class="ki-duotone ki-setting-2 fs-2"><span class="path1"></span><span
                                   class="path2"></span></i> </span>
                       <!--end::More actions-->

                       <!--begin::Dismiss reply-->
                       <span class="btn btn-icon btn-sm btn-clean btn-active-light-primary"
                           data-inbox="dismiss" data-toggle="tooltip" title="Dismiss reply">
                           <i class="ki-duotone ki-trash fs-2"><span class="path1"></span><span
                                   class="path2"></span><span class="path3"></span><span
                                   class="path4"></span><span class="path5"></span></i> </span>
                       <!--end::Dismiss reply-->
                   </div>
                   <!--end::Toolbar-->
               </div>
               <!--end::Footer-->
           </form>
           <!--end::Form-->
       </div>
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
           <input class="form-control form-control-solid" placeholder="" name="subject" fdprocessedid="c3it16">
           <!--end::Input-->
   </div>
   <div class="d-flex flex-column brn-btn1 bnr-btn media-btn flex-sm-row d-grid gap-2 ">
       <a href="#" class="btn btn-primary flex-shrink-0" style="background: rgba(84, 67, 240, 0.868)" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Save</a>
   </div>
</div>

<!-- media-file -->
<div class="card card-flush">
  
   <!--begin::Card header-->
   <div class="card-header pt-8 media-file">
       <!--begin::Card toolbar-->
       <div class="card-toolbar">
           <!--begin::Toolbar-->
           <div class="d-flex justify-content-end btn-clr" data-kt-filemanager-table-toolbar="base">
                
               <div class="row snipcss-fPCgv">
                   <div class="form-group col-md-10">
                     <label for="exampleInputFile">
                       Media
                     </label>
                     <div class="input-group">
                       <div class="custom-file">
                         <input type="file" name="file" id="file" class="custom-file-input">
                         <label class="custom-file-label" for="exampleInputFile">
                           Choose file
                         </label>
                       </div>
                     </div>
                     
                   </div>
                   
                   
                 </div>
                
               <!--end::Add customer-->
               <div class="d-flex flex-column brn-btn1 bnr-btn media-btn flex-sm-row d-grid gap-2 ">
                   <a href="#" class="btn btn-primary flex-shrink-0" style="background: rgba(84, 67, 240, 0.868)"
                       data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Save</a>
               </div>
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

                       <tr class="odd">
                           <td>
                               <div class="form-check form-check-sm form-check-custom form-check-solid">
                                   <input class="form-check-input" type="checkbox" value="1">
                               </div>
                           </td>
                           <td>
                               <div class="d-flex align-items-center">
                                   <i class="ki-duotone ki-files fs-2x text-primary me-4"></i> <a href="#"
                                       class="text-gray-800 text-hover-primary">Banner1</a>
                               </div>
                           </td>
                           
                           <td data-order="2023-06-24T20:43:00+05:30">	<img src="{{asset('admin/assets/media/logos/trial.png')}}" alt="" width="80px" height="80px"></td>
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
                       <tr class="even">
                           <td>
                               <div class="form-check form-check-sm form-check-custom form-check-solid">
                                   <input class="form-check-input" type="checkbox" value="1">
                               </div>
                           </td>
                           <td>
                               <div class="d-flex align-items-center">
                                   <i class="ki-duotone ki-files fs-2x text-primary me-4"></i> <a href="#"
                                       class="text-gray-800 text-hover-primary">Banner2</a>
                               </div>
                           </td>
                           
                           <td data-order="2023-10-25T22:10:00+05:30"><img src="{{asset('admin/assets/media/logos/trial.png')}}" alt="" width="80px" height="80px"></td>
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
                       <tr class="odd">
                           <td>
                               <div class="form-check form-check-sm form-check-custom form-check-solid">
                                   <input class="form-check-input" type="checkbox" value="1">
                               </div>
                           </td>
                           <td>
                               <div class="d-flex align-items-center">
                                   <i class="ki-duotone ki-files fs-2x text-primary me-4"></i> <a href="#"
                                       class="text-gray-800 text-hover-primary">Banner3</a>
                               </div>
                           </td>
                           
                           <td data-order="2023-02-21T11:05:00+05:30"><img src="{{asset('admin/assets/media/logos/trial.png')}}" alt="" width="80px" height="80px"></td>
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
                       <tr class="even">
                           <td>
                               <div class="form-check form-check-sm form-check-custom form-check-solid">
                                   <input class="form-check-input" type="checkbox" value="1">
                               </div>
                           </td>
                           <td>
                               <div class="d-flex align-items-center">
                                   <i class="ki-duotone ki-files fs-2x text-primary me-4"></i> <a href="#"
                                       class="text-gray-800 text-hover-primary">Banner4</a>
                               </div>
                           </td>
                          
                           <td data-order="2023-03-10T14:40:00+05:30"><img src="{{asset('admin/assets/media/logos/trial.png')}}" alt="" width="80px" height="80px"></td>
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
                       <tr class="odd">
                           <td>
                               <div class="form-check form-check-sm form-check-custom form-check-solid">
                                   <input class="form-check-input" type="checkbox" value="1">
                               </div>
                           </td>
                           <td>
                               <div class="d-flex align-items-center">
                                   <i class="ki-duotone ki-files fs-2x text-primary me-4"></i> <a href="#"
                                       class="text-gray-800 text-hover-primary">Banner5</a>
                               </div>
                           </td>
                          
                           <td data-order="2023-03-10T20:43:00+05:30"><img src="{{asset('admin/assets/media/logos/trial.png')}}" alt="" width="80px" height="80px"></td>
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
                       <tr class="even">
                           <td>
                               <div class="form-check form-check-sm form-check-custom form-check-solid">
                                   <input class="form-check-input" type="checkbox" value="1">
                               </div>
                           </td>
                           <td>
                               <div class="d-flex align-items-center">
                                   <i class="ki-duotone ki-files fs-2x text-primary me-4"></i> <a href="#"
                                       class="text-gray-800 text-hover-primary">Banner6</a>
                               </div>
                           </td>
                           
                           <td data-order="2023-06-24T11:05:00+05:30"><img src="{{asset('admin/assets/media/logos/trial.png')}}" alt="" width="80px" height="80px"></td>
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
                       <tr class="odd">
                           <td>
                               <div class="form-check form-check-sm form-check-custom form-check-solid">
                                   <input class="form-check-input" type="checkbox" value="1">
                               </div>
                           </td>
                           <td>
                               <div class="d-flex align-items-center">
                                   <i class="ki-duotone ki-files fs-2x text-primary me-4"></i> <a href="#"
                                       class="text-gray-800 text-hover-primary">Banner7</a>
                               </div>
                           </td>
                           
                           <td data-order="2023-06-24T17:20:00+05:30"><img src="{{asset('admin/assets/media/logos/trial.png')}}" alt="" width="80px" height="80px"></td>
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
                       <tr class="even">
                           <td>
                               <div class="form-check form-check-sm form-check-custom form-check-solid">
                                   <input class="form-check-input" type="checkbox" value="1">
                               </div>
                           </td>
                           <td>
                               <div class="d-flex align-items-center">
                                   <i class="ki-duotone ki-files fs-2x text-primary me-4"></i> <a href="#"
                                       class="text-gray-800 text-hover-primary">Banner8</a>
                               </div>
                           </td>
                          
                           <td data-order="2023-06-24T20:43:00+05:30"><img src="{{asset('admin/assets/media/logos/trial.png')}}" alt="" width="80px" height="80px"></td>
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
                       <tr class="odd">
                           <td>
                               <div class="form-check form-check-sm form-check-custom form-check-solid">
                                   <input class="form-check-input" type="checkbox" value="1">
                               </div>
                           </td>
                           <td>
                               <div class="d-flex align-items-center">
                                   <i class="ki-duotone ki-files fs-2x text-primary me-4"></i> <a href="#"
                                       class="text-gray-800 text-hover-primary">Banner9</a>
                               </div>
                           </td>
                           
                           <td data-order="2023-07-25T11:30:00+05:30"><img src="{{asset('admin/assets/media/logos/trial.png')}}" alt="" width="80px" height="80px"></td>
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
                       <tr class="even">
                           <td>
                               <div class="form-check form-check-sm form-check-custom form-check-solid">
                                   <input class="form-check-input" type="checkbox" value="1">
                               </div>
                           </td>
                           <td>
                               <div class="d-flex align-items-center">
                                   <i class="ki-duotone ki-files fs-2x text-primary me-4"></i> <a href="#"
                                       class="text-gray-800 text-hover-primary">Banner10</a>
                               </div>
                           </td>
                           
                           <td data-order="2023-08-19T17:20:00+05:30"><img src="{{asset('admin/assets/media/logos/trial.png')}}" alt="" width="80px" height="80px"></td>
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

@stop