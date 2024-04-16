@extends('admin.layouts.app')

@section('breadcrum')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Email Template </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Email Template </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')
    <style>
        .box {
            border-top: 0px !important;
        }
    </style>
    <div class="content-header">
        <!-- Main content -->
        <section class="side-app">

            <!-- Default box -->
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title">Add Email Template </h3>

                    <div class="card-tools float-right">
                        <a href="{{ route('emailtemplates') }}" class="btn btn-primary btn-sm"> <i
                                class="fa fa-arrow-left"></i> Back</a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- general form elements -->
                          

                                <!-- /.box-header -->
                                <!-- form start -->


                                @if (@$emailtemplate)
                                    {!! Form::model($emailtemplate, [
                                        'url' => route('emailtemplates.update', @$emailtemplate->id),
                                        'id' => 'form_emailtemplate',
                                        'method' => 'POST',
                                        'role' => 'form',
                                    ]) !!}
                                @else
                                    {!! Form::open([
                                        'url' => route('emailtemplates.store'),
                                        'id' => 'form_emailtemplate',
                                        'method' => 'POST',
                                        'role' => 'form',
                                    ]) !!}
                                @endif
                               
                                    <div class="row">
                                        <div class="col-md-6 d-none">
                                            <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                                                {!! Form::label('type', 'Type:', ['class' => 'control-label']) !!}
                                                <span class="asterisk">*</span>
                                                {!! Form::select('type', config('constants.email_template_types'), @$emailtemplate->type, [
                                                    'class' => 'selectpicker form-control',
                                                    'data-live-search' => 'true',
                                                    'data-size' => '8',
                                                ]) !!}
                                                <span class="help-block"> {{ $errors->first('type', ':message') }} </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
                                                {!! Form::label('subject', 'Subject: ', ['class' => 'control-label']) !!}
                                                <span class="asterisk">*</span>
                                                {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Subject']) !!}
                                                <span class="help-block"> {{ $errors->first('subject', ':message') }}
                                                </span>
                                            </div>
                                        </div>
                                    
                                        <div class="col-sm-6">
                                            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                                                {{ Form::label('status', 'Status') }}<span class="asterisk">*</span>
                                                {!! Form::select('status', ['' => 'Select', '1' => 'Active', '0' => 'InActive'], null, [
                                                    'class' => 'form-control',
                                                ]) !!}
                                                <span class="help-block"> {{ $errors->first('status', ':message') }} </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('template') ? 'has-error' : '' }}">
                                        {!! Form::label('template', 'Template:', ['class' => 'control-label']) !!}
                                        <span class="asterisk">*</span>
                                        {!! Form::textarea('template', null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Template content',
                                            'id' => 'editor1',
                                        ]) !!}
                                        <span class="help-block"> {{ $errors->first('template', ':message') }} </span>
                                    </div>

                               
                                    <button type="submit" class="btn btn-primary btn-sm ">Submit</button>
                               

                                {!! Form::close() !!}

                            
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->

                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@stop

@push('js')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function() {
            CKEDITOR.replace('editor1', {
                // Remove the redundant buttons from toolbar groups defined above.
                removeButtons: 'Font,Iframe,PageBreak,Flash,bootstrapTabs,Copy,Save,Print,Preview,Subscript,Superscript,Anchor,Styles,Specialchar'
                // removeButtons: 'Iframe,PageBreak,Flash,bootstrapTabs,Copy,Save,Print,Preview,Subscript,Superscript,Anchor,Specialchar'
            });


        })
    </script>

    <script>
        $(document).ready(function() {

            $('#form_emailtemplate').validate({
                rules: {
                    type: {
                        required: true,
                    },
                    subject: {
                        required: true,

                    },
                    status: {
                        required: true
                    },
                    template: {
                        required: true
                    },
                },
                messages: {

                },
                errorElement: 'div',
                errorClass: 'help-block',
                highlight: function(element, errorClass, validClass) {
                    $(element).parents("div.form-group").addClass('has-error');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).parents(".has-error").removeClass('has-error');
                }
            })
        });
    </script>
@endpush
