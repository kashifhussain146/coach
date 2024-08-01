@extends('admin.layouts.app')
@section('title')
    <title>Create {{$title}}</title>
@stop

@section('inlinecss')
    <link type="text/css" rel="stylesheet"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
@stop

@section('breadcrum')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{$title}} Create </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{$title}} Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')

    <div class="content-header">
        <div class="side-app">
            @if(isset($loan))
            <form action="{{ route('questions-update',['id'=>$loan->id]) }}" method="POST" enctype="multipart/form-data" id="kt_inbox_compose_form">
            @else
            <form action="{{ route('questions-store') }}" method="POST" enctype="multipart/form-data" id="kt_inbox_compose_form">
            @endif

                @csrf
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class=""><strong> {{$title}} Section </strong> </h5><br />

                            <div class="row">

                            <div class="form-group col-md-6">
                                <label class="form-label">Colleges *</label>
                                <select name="collegeid" id="collegeid" class="form-control select2">
                                    <option value="">Select Colleges</option>
                                    @foreach ($colleges as $item)
                                    <option @if(isset($loan)) @if($loan->collegeid==$item->id) selected @endif @endif  value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label">Courses *</label>
                                <select name="coursesid" id="coursesid" class="form-control select2">
                                    <option value="">Select Courses</option>
                                    @foreach ($course as $item)
                                    <option @if(isset($loan)) @if($loan->coursesid==$item->id) selected @endif @endif  value="{{$item->id}}">{{$item->code}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-6">
                                <label class="form-label">Subjects Category *</label>
                                <select name="subject_category" id="subject_category" class="form-control select2">
                                    <option value="">Select Category</option>
                                    @foreach ($subjectcategory as $item)
                                    <option @if(isset($loan)) @if($loan->subject_category==$item->id) selected @endif @endif  value="{{$item->id}}">{{$item->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-md-6">
                                <label class="form-label">Subjects *</label>
                                <select name="subject" id="subject" class="form-control select2">
                                    <option value="">Select Subject</option>
                                    @if(isset($subjects))
                                        @foreach ($subjects as $item)
                                            <option @if(isset($loan)) @if($loan->subject==$item->id) selected @endif @endif  value="{{$item->id}}">{{$item->subject_name}}</option>                                        
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="form-label">Question </label>
                                <textarea class="form-control" style="height: 300px;" name="question" id="question" placeholder="Enter question..">{{(isset($loan))?$loan->question:''}}</textarea>
                                
                            </div>


                            <div class="form-group col-md-12">
                                <label class="form-label">Answer </label>
                                <textarea class="form-control" style="height: 300px;" name="answer" id="answer" placeholder="Enter answer..">{{(isset($loan))?$loan->answer:''}}</textarea>
                                <p>
                                    Word Count : <span id="word_count"> </span> 
                                    <input type="hidden" name="num_words" value="{{(isset($loan))?$loan->num_words:''}}">
                                </p>
                            </div>   

                            <div class="form-group col-md-6">
                                <label class="form-label">Start Date & Time *</label>
                                <input type="datetime-local" class="form-control" value="{{(isset($loan))?$loan->startdatetime:''}}" name="startdatetime" id="startdatetime"  >
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label">End Date & Time *</label>
                                <input type="datetime-local" class="form-control" value="{{(isset($loan))?$loan->enddatetime:''}}" name="enddatetime" id="enddatetime" >
                            </div>


                            <div class="form-group col-md-6">
                                <label class="form-label">Score *</label>
                                <input type="text" class="form-control" value="{{(isset($loan))?$loan->score:''}}" name="score" id="score"  placeholder="Score..">
                            </div>

                    
                            <div class="form-group col-md-6">
                                <label class="form-label">Type *</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="">Select Type</option>
                                    <option @if(isset($loan)) @if($loan->type=='Q') selected @endif @endif value="Q">Quiz</option>
                                    <option @if(isset($loan)) @if($loan->type=='A') selected @endif @endif value="A">Assignment</option>
                                    <option @if(isset($loan)) @if($loan->type=='T') selected @endif @endif value="T">Test</option>
                                    <option @if(isset($loan)) @if($loan->type=='E') selected @endif @endif value="E">Exam</option>
                                    <option @if(isset($loan)) @if($loan->type=='D') selected @endif @endif value="D">Discussion</option>
                                    <option @if(isset($loan)) @if($loan->type=='P') selected @endif @endif value="P">Paper</option>
                                    <option @if(isset($loan)) @if($loan->type=='R') selected @endif @endif value="R">Project</option>
                                </select>
                                
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label class="form-label">Price *</label>
                                <input type="text" class="form-control" value="{{(isset($loan))?$loan->price:''}}" name="price" id="price"  placeholder="Price..">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="exampleInputFile">Answer File</label>
                                <div class="input-group">
                                  <div class="">
                                    <input name="file_name" id="file_name" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  </div>
                                 
                                </div>
                              </div>

                              <div class="form-group col-md-6">
                                <label class="form-label">Content Visiblity *</label>
                                <select name="visiblity" id="visiblity" class="form-control">
                                    <option @if(isset($loan)) @if($loan->visiblity=='Y') selected @endif @endif value="Y">Active</option>
                                    <option @if(isset($loan)) @if($loan->visiblity=='N') selected @endif @endif value="N">Inactive</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label">Start Date & Time *</label>
                                <input type="date" class="form-control" value="{{(isset($loan))?$loan->expiry_date:''}}" name="expiry_date" id="expiry_date"  >
                            </div>
                            

                            <div class="form-group col-md-6">
                                <label class="form-label">Status *</label>
                                <select name="status" id="status" class="form-control">
                                    <option @if(isset($loan)) @if($loan->status=='Y') selected @endif @endif  value="Y">Active</option>
                                    <option @if(isset($loan)) @if($loan->status=='N') selected @endif @endif value="N">Inactive</option>
                                </select>
                            </div>

                            </div>

                        </div>

                        <div class="card-footer">
                            <a href="{{url()->previous()}}">  <button type="button" class="btn btn-warning">{{__('Back')}}</button></a>&nbsp;&nbsp;
                            <button type="submit" id="submitButton" class="btn btn-primary float-left" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..." data-rest-text="Save">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

@stop
@section('inlinejs')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script>
        $(function() {
            $('.time').daterangepicker()
            CKEDITOR.replace( 'question',{
                                    
                                    toolbar: [{
                                        name: 'clipboard',
                                        items: ['Source','Undo', 'Redo']
                                    }, {
                                        name: 'styles',
                                        items: ['Styles', 'Format']
                                    }, {
                                        name: 'basicstyles',
                                        items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat']
                                    }, {
                                        name: 'paragraph',
                                        items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
                                    }, {
                                        name: 'links',
                                        items: ['Link', 'Unlink']
                                    }, {
                                        name: 'insert',
                                        items: ['Image', 'EmbedSemantic', 'Table']
                                    }, {
                                        name: 'tools',
                                        items: ['Maximize']
                                    }, {
                                        name: 'editing',
                                        items: ['Scayt']
                                    }],
                                    height: 250,

                        });

            var answer = CKEDITOR.replace( 'answer',{
                                    
                                    toolbar: [{
                                        name: 'clipboard',
                                        items: ['Source','Undo', 'Redo']
                                    }, {
                                        name: 'styles',
                                        items: ['Styles', 'Format']
                                    }, {
                                        name: 'basicstyles',
                                        items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat']
                                    }, {
                                        name: 'paragraph',
                                        items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
                                    }, {
                                        name: 'links',
                                        items: ['Link', 'Unlink']
                                    }, {
                                        name: 'insert',
                                        items: ['Image', 'EmbedSemantic', 'Table']
                                    }, {
                                        name: 'tools',
                                        items: ['Maximize']
                                    }, {
                                        name: 'editing',
                                        items: ['Scayt']
                                    }],
                                    height: 250,

                        });
             
                        answer.on('key', function(event) {
                            var content = event.editor.getData();
                            var wordCount = content.replace(/\&nbsp;/g, '').trim().split(/\s+/).length;
                            $("input[name='num_words']").val(wordCount);
                            console.log('Word count: ' + wordCount);
                            document.getElementById('word_count').textContent = wordCount;
                        });

                        answer.on('paste', function(event) {
                            var pastedText = event.data.dataValue;
                            console.log(pastedText);
                            if (pastedText.includes('forbidden_word')) {
                                alert('Pasting the word "forbidden_word" is not allowed.');
                                event.cancel();
                            }else{
                                
                                var wordCount = pastedText.replace(/\&nbsp;/g, '').trim().split(/\s+/).length;
                                $("input[name='num_words']").val(wordCount);
                                console.log('Word count: ' + wordCount);
                                document.getElementById('word_count').textContent = wordCount;

                            }
                        });

            $('#kt_inbox_compose_form').submit(function() {

                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }

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
                            successMsg('Subjects Action', data.msg,'{{ route('questions-list') }}');
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
                        errorMsg('Create Subjects',
                            'There has been an error, please alert us immediately');
                        buttonLoading('reset', $this);
                    }

                });

                return false;
            });
        });

        $(document).on('change','#subject_category',function(){


                $.ajax({
                    url: '{{route('get.subcategory')}}',
                    type: 'GET',
                    data:{category_id:$("#subject_category option:selected").val()},
                    success: function(data){
                        console.log(data.length);
                        if(data.length > 0){
                            $("#subject option").remove();
                            $("#subject").append(`<option value="">Select Subject</option>`)
                            $.each(data,function(key,value){
                                $("#subject").append(`<option value="${value.id}">${value.subject_name}</option>`)
                            });
                        }
                    }
                });
        });
    </script>
@stop
