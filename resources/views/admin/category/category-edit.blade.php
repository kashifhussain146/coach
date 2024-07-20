@extends('admin.layouts.app')
@section('title')
<title>Edit Category</title>
@stop

@section('inlinecss')
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
<link href="{{ asset('admin/assets/multiselectbox/css/ui.multiselect.css') }}" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@stop

@section('breadcrum')
<h1 class="page-title">Edit Category</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Category</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
</ol>
@stop

@section('content')
<div class="content-header">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        @include('admin.layouts.pagehead')
        <!-- PAGE-HEADER END -->

        <!--  Start Content -->
    <form id="submitForm" class="row"  method="post" action="{{route('category-update', $loan->id)}}">
        {{csrf_field()}}
        <!-- COL END -->
							<div class="col-lg-6">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Category Forms</h3>
									</div>
									<div class="card-body">

                                        <div class="form-group">
                                            <label class="form-label">Industry*</label>
                                            <select name="industry_id" id="industry_id"  class="form-control">
                                                <option value=""> Select </option>
                                                @foreach ($industry as $keys=>$item)
                                                    <option  {{ ($item->id==$loan->industry_id)?'selected':'' }}  value="{{$item->id}}">{{$item->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>

										<div class="form-group">
											<label class="form-label">Title *</label>
											<input type="text" class="form-control" name="title" id="title" placeholder="Title.." value="{{$loan->title}}">
										</div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-10 ">
                                                    <input style="margin-top: 20px;" id="image" type="file" class="form-control align-middle custom-file-input" name="image" onchange="readURL(this, 'FileImg');">
                                                    <label class="text-dark mt-4 ml-2 custom-file-label" for="value">Choose file</label>
                                              </div>
                                                <div class="col-md-2 ">
                                                <img id="FileImg" src="@if(!empty($loan->image)){{url('public/'.$loan->image)}}@else{{url('/public/notfound.png')}}@endif" style="width: 71px;height: 71px">
                                                </div>
                                            </div>
                                         </div>

                                        {{-- <div class="form-group">
                                            <label class="control-label"> Icon </label>
                                            <div class="row">
                                                <div class="col-md-10 ">
                                                    <input id="icon" type="file" class="form-control align-middle custom-file-input" name="icon" onchange="readURL(this, 'Fileicon');">
                                                    <label class="text-dark mt-4 ml-2 custom-file-label" for="value">Choose file</label>
                                              </div>
                                                <div class="col-md-2 ">
                                                    <img id="Fileicon" src="@if(!empty($loan->icon)){{url('public/'.$loan->icon)}}@else{{url('/public/notfound.png')}}@endif"  style="width: 71px;height: 71px">
                                                </div>
                                            </div>
                                         </div>

                                         <div class="form-group">
                                            <label class="control-label"> Banner Image </label>
                                            <div class="row">
                                                <div class="col-md-10 ">
                                                    <input id="icon" type="file" class="form-control align-middle custom-file-input" name="banner_image" onchange="readURL(this, 'BannerImage');">
                                                    <label class="text-dark mt-4 ml-2 custom-file-label" for="value">Choose file</label>
                                              </div>
                                                <div class="col-md-2 ">
                                                <img id="BannerImage" src="@if(!empty($loan->banner_image)){{url('public/'.$loan->banner_image)}}@else{{url('/public/notfound.png')}}@endif"  style="width: 71px;height: 71px">
                                                </div>
                                            </div>
                                         </div>


                                         <div class="form-group">
											<label class="form-label">Link *</label>
											<input type="text" class="form-control" name="link" id="link" value="{{$loan->link}}" placeholder="Link..">
										</div>

                                        <!-- <div class="form-group">-->
                                        <!--    <label  for="value"><b>Description</b></label>-->
                                        <!--        <textarea class="Description" name="description" id="description">{{$loan->description}}</textarea>-->
                                        <!--</div> -->

                                        <div class="form-group">
                                            <label  for="value"><b>Note</b></label>
                                                <textarea class="Description" name="note" id="note">{{$loan->note}}</textarea>
                                        </div>--}}

										<div class="form-group">
											<label class="form-label">Sort Order *</label>
											<select name="sort_order" id="sort_order" class="form-control">
                                                @for($i=1; $i<=100; $i++)
                                                    <option @if($loan->sort_order == $i) selected @endif value="{{$i}}">{{$i}}</option>
                                                @endfor
											</select>
										</div>


                                        <div class="form-group">
											<label class="form-label">Status *</label>
											<select name="status" id="status" class="form-control">
                                                <option value="">Select</option>
                                                <option  @if($loan->status == 'active') selected @endif value="active">Active</option>
                                                <option  @if($loan->status == 'inactive') selected @endif value="inactive">InActive</option>
											</select>
                                        </div>


                                        <div class="card-footer"></div>
                                            <button type="submit" id="submitButton" class="btn btn-primary float-right"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Update">Update</button>
										</div>

									</div>

								</div>
                            <input type="hidden" name="old_image" value="{{$loan->image}}" id="old_image" />

							</form>
        </div><!-- COL END -->
        <!--  End Content -->

    </div>
</div>

@stop
@section('inlinejs')
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script type="text/javascript">

 $('.Description').summernote({ height:250 });
        $(function () {
           $('#submitForm').submit(function(){
            var $this = $('#submitButton');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#submitForm').attr('action'),
                type: "POST",
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#submitForm')[0]),
                success: function(data) {
                    if(data.status){
						var btn = '<a href="{{route('category-list')}}" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Edit Category', data.msg, btn);
                        location.reload();

                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
                        errorMsg('Edit Category','Input error');
                    }
                    buttonLoading('reset', $this);

                },
                error: function() {
                    errorMsg('Edit Category', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });

            return false;
           });

           });
		   $("#icon").change(function(){
                readURL(this);
            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#icon_image_select').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


    </script>
@stop
@section('bottomjs')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
{{-- <script src="{{ asset('admin/assets/multiselectbox/js/ui.multiselect.js') }}"></script> --}}
<script>

// $(function () {
//   $('#loan_fields').multiselect();
//   $("ul.selected li").each(function(){
// 		var selected_value = $(this).attr('data-selected-value');
// 		//alert(selected_value);
// 	});
// });
  </script>
@stop
