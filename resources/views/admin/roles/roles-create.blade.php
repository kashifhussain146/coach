@extends('admin.layouts.app')
@section('title')
    <title>Create Role | Fcs-Dashboard</title>
@stop

@section('inlinecss')
    <link href="{{ asset('admin/assets/multiselectbox/css/multi-select.css') }}" rel="stylesheet">
@stop

@section('breadcrum')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $title }}  </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">{{ $title }} </li>
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
                        <h3 class="card-title">Role Forms</h3>
                    </div>
                    <div class="card-body">
                        <form id="submitForm" method="post" action="{{ route('roles-store') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>

                                <hr>
                                {{-- <div class="form-group col-sm-12">
                                    <label class="form-label">Permission</label>
                                    <select name="permission[]" id="permission" multiple="multiple"
                                        class="multi-select form-control">
                                        <option disabled value="">Select Permission</option>
                                        @foreach ($permission as $p)
                                            <option value="{{ $p->name }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}


                                <div class="form-group col-sm-12">

                                   
                                    


                                    <div class="permission-container">
                                        @foreach ($permission as $parentPermission)
                                                <div class="col-md-12 border mb-3">
                                                        <label style="font-size: 20px;">
                                                            <input name="permission[]" value="{{$parentPermission['name']}}" type="checkbox" class="parent-checkbox" data-parent-id="{{ $parentPermission['id'] }}">
                                                            {{ $parentPermission['name'] }}
                                                        </label>
                                                
                                                        @if ($parentPermission['children'])
                                                            <div class="child-permissions ml-2"  data-parent-id="{{ $parentPermission['id'] }}">
                                                                @foreach ($parentPermission['children'] as $childPermission)
                                                                    
                                                
                                                                    
                                                                        <div class="sub-child-permissions ml-3"  data-parent-id="{{ $childPermission['id'] }}">

                                                                            <label style="font-size: 16px;width:25%">

                                                                                @php 
                                                                                    $search = array("Module_", "Module_", "Module_","_");
                                                                                    $replace = array("", "", ""," ");
                                                                                    $result =ucfirst(str_replace($search, $replace, $childPermission['name']));
                                                                                @endphp

                                                                                <input 
                                                                                        value="{{$childPermission['name']}}"
                                                                                       
                                                                                       name="permission[]" type="checkbox" class="child-checkbox" 
                                                                                       data-parent-id="{{ $parentPermission['id'] }}" 
                                                                                       data-permission-id="{{ $childPermission['id'] }}"
                                                                                >
                                                                                {{ $result }} : &nbsp;&nbsp;&nbsp;

                                                                                
                                                                                
                                                                            </label>
                                                                            @if (isset($childPermission['children']))
                                                                                @foreach ($childPermission['children'] as $subChildPermission)
                                                                                    <label style="font-size: 14px;">

                                                                                        @php 
                                                                                            $search1 = array("Module_", "Module_", "Module_","_");
                                                                                            $replace1 = array("", "", ""," ");
                                                                                            $result2 =ucfirst(str_replace($search1, $replace1, $subChildPermission['name']));
                                                                                        @endphp
                                                                                        
                                                                                        <input 
                                                                                        value="{{$subChildPermission['name']}}"
                                                                                        
                                                                                        name="permission[]" type="checkbox" class="sub-child-checkbox" 
                                                                                                data-parent-id="{{ $parentPermission['id'] }}" 
                                                                                                data-child-id="{{$childPermission['id']}}" 
                                                                                                data-permission-id="{{ $subChildPermission['id'] }}"
                                                                                        >
                                                                                        {{ $result2 }}&nbsp;&nbsp;
                                                                                    </label>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                </div>
                                                <br />
                                        @endforeach
                                    </div>
                                </div>

                            </div>

                            <div class="form-group col-sm-6">
                                <label class="form-label">Description *</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>

                            <div class="card-footer"></div>
                            <a href="{{url()->previous()}}">  <button type="button" class="btn btn-warning">{{__('Back')}}</button></a>&nbsp;&nbsp;
                            <button type="submit" id="submitButton" class="btn btn-primary float-right"
                                data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..."
                                data-rest-text="Create">Create</button>

                    </div>
                    </form>
                </div>

            </div>
        </div><!-- COL END -->

        <!--  End Content -->

    </div>
    </div>

@stop
@section('inlinejs')
    <script src="{{ asset('admin/assets/multiselectbox/js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript">


$('#checkAll').on('click', function () {
            $('.parent-checkbox, .child-checkbox, .sub-child-checkbox').prop('checked', true);
        });

        // Uncheck All Button Click
        $('#uncheckAll').on('click', function () {
            $('.parent-checkbox, .child-checkbox, .sub-child-checkbox').prop('checked', false);
        });


        // $('.parent-checkbox').change(function () {
        //     var parentId = $(this).data('parent-id');
        //     var isChecked = $(this).prop('checked');

        //     // Check/uncheck all child checkboxes
        //     $('.child-permissions[data-parent-id="' + parentId + '"] .child-checkbox').prop('checked', isChecked);
            
        //     $.each( $('.child-permissions[data-parent-id="' + parentId + '"] .child-checkbox'),function(key,vals){
        //         childpermis = $(vals).attr('data-permission-id');
        //         $('.sub-child-permissions[data-parent-id="'+childpermis+'"] .sub-child-checkbox').prop('checked',isChecked);
        //     } )
        // });

        $('.child-checkbox').change(function () {
            var parent = $(this).attr('data-parent-id');
            var permission = $(this).data('permission-id');
            var isChecked = $(this).prop('checked');

                if(isChecked){
                    $('.sub-child-permissions[data-parent-id="'+permission+'"] .sub-child-checkbox').prop('checked',true);
                }else{
                    $('.sub-child-permissions[data-parent-id="'+permission+'"] .sub-child-checkbox').prop('checked',false);                    
                }

          


        });

        $('.sub-child-checkbox').change(function () {
            var parent = $(this).attr('data-parent-id');
            var child = $(this).attr('data-child-id');
            var permission = $(this).attr('permission-id');
            var isChecked = $(this).prop('checked');

            var length = $('.sub-child-permissions[data-parent-id="'+child+'"] .sub-child-checkbox:checked').length;
            console.log("length",length);
                if(length==0){
                    $('input[type="checkbox"][data-permission-id="'+child+'"]').prop('checked',false);
                }else if(length==1){
                    $('input[type="checkbox"][data-permission-id="'+child+'"]').prop('checked',true);
                }
        });
        
        $(function() {

            $('#permission').multiSelect();
            $('#submitForm').submit(function() {
                var $this = $('#submitButton');
                buttonLoading('loading', $this);
                $('.is-invalid').removeClass('is-invalid state-invalid');
                $('.invalid-feedback').remove();
                $.ajax({
                    url: $('#submitForm').attr('action'),
                    type: "POST",
                    data: $('#submitForm').serialize(),
                    success: function(data) {
                        if (data.status) {
                           location.href = "{{ route('roles-list') }}";
                            $('#submitForm')[0].reset();

                        } else {
                            $.each(data.errors, function(fieldName, field) {
                                $.each(field, function(index, msg) {
                                    $('#' + fieldName).addClass(
                                        'is-invalid state-invalid');
                                    errorDiv = $('#' + fieldName).parent('div');
                                    errorDiv.append(
                                        '<div class="invalid-feedback">' +
                                        msg + '</div>');
                                    errorMsg('Create Role', msg);
                                });
                            });
                        }
                        buttonLoading('reset', $this);

                    },
                    error: function() {
                        errorMsg('Create Role',
                            'There has been an error, please alert us immediately');
                        buttonLoading('reset', $this);
                    }

                });

                return false;
            });



        });
    </script>
@stop
