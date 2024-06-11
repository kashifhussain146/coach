@extends('admin.layouts.app')
@section('title')
    <title>Create Course Code</title>
@stop

@section('inlinecss')
    <link type="text/css" rel="stylesheet"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@stop

@section('breadcrum')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Course Code Create </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Course Code Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')

    <div class="content-header">
        <div class="side-app">
            @if (isset($loan))
                <form action="{{ route('course-code-update', ['id' => $loan->id]) }}" method="POST"
                    enctype="multipart/form-data" id="kt_inbox_compose_form">
                @else
                    <form action="{{ route('course-code-store') }}" method="POST" enctype="multipart/form-data"
                        id="kt_inbox_compose_form">
            @endif

            @csrf
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class=""><strong> Course Code </strong> </h5><br />
                        <div class="form-group">
                            <label class="form-label">Code *</label>
                            <input type="text" class="form-control" value="{{ isset($loan) ? $loan->code : '' }}"
                                name="code" id="code" placeholder="Title..">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Status *</label>
                            <select name="status" id="status" class="form-control">
                                <option @if (isset($loan)) @if ($loan->status == 'Y') selected @endif
                                    @endif value="Y">Active</option>
                                <option @if (isset($loan)) @if ($loan->status == 'N') selected @endif
                                    @endif value="N">Inactive</option>
                            </select>

                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" id="submitButton" class="btn btn-primary float-left"
                            data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..."
                            data-rest-text="Save">Save</button>
                    </div>
                </div>
            </div>
            </form>
        </div>

    </div>

@stop
@section('inlinejs')

    <script>
        $(function() {




            $('#kt_inbox_compose_form').submit(function() {




                var $this = $('#submitButton');
                buttonLoading('loading', $this);
                $('.is-invalid').removeClass('is-invalid state-invalid');
                $('.invalid-feedback').remove();
                $.ajax({
                    url: $('#kt_inbox_compose_form').attr('action'),
                    type: "POST",
                    processData: false, // Important!
                    contentType: false,
                    cache: false,
                    data: new FormData($('#kt_inbox_compose_form')[0]),
                    success: function(data) {
                        if (data.status) {
                            var btn = '';
                            successMsg('Course Code', data.msg,
                                '{{ route('course-code-list') }}');
                            $('#kt_inbox_compose_form')[0].reset();

                        } else {
                            $.each(data.errors, function(fieldName, field) {
                                $.each(field, function(index, msg) {
                                    $('#' + fieldName).addClass(
                                        'is-invalid state-invalid');
                                    errorDiv = $('#' + fieldName).parent('div');
                                    errorDiv.append(
                                        '<div class="invalid-feedback">' +
                                        msg + '</div>');
                                });
                            });
                            errorMsg('Errors', 'Input Error');
                        }
                        buttonLoading('reset', $this);

                    },
                    error: function() {
                        errorMsg('Create Course Code',
                            'There has been an error, please alert us immediately');
                        buttonLoading('reset', $this);
                    }

                });

                return false;
            });
        });
    </script>
@stop
