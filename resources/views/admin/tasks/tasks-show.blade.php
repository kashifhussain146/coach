@extends('admin.layouts.app')
@section('title')
    <title>View Tasks</title>
@stop
@section('inlinecss')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@stop

@section('breadcrum')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }} </h1>
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
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3>Task Details</h3>
                    </div>


                    <div class="card-body">
                        <div class="form-group">
                            <label>Start Date & Time:</label>
                            <p>{{ $task->start_date_time }}</p>
                        </div>

                        <div class="form-group">
                            <label>End Date & Time:</label>
                            <p>{{ $task->end_date_time }}</p>
                        </div>

                        <!-- Add other fields here -->

                        <div class="form-group">
                            <label>Task Type:</label>
                            <p>{{ $task->task_type }}</p>
                        </div>



                        <div class="form-group">
                            <label>Actual Length (Assignment):</label>
                            <p>{{ $task->actual_length }}</p>
                        </div>


                        <div class="form-group">
                            <label>Unique Group ID:</label>
                            <p>{{ $task->unique_group_id }}</p>
                        </div>


                        <div class="form-group">
                            <label for="college_name">College Name:</label>
                            <p>{{ $task->college->name }} </p>
                        </div>

                        <div class="form-group">
                            <label for="course_name">Course Name:</label>
                            <p>{{ $task->course->category_name }} </p>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <p>{{ $task->subject->subject_name }}</p>
                        </div>

                        <div class="form-group">
                            <label for="course_code">Course Code:</label>
                            <p>{{ $task->courseCode->code }}</p>
                        </div>


                        <div class="form-group">
                            <label>Number of Words Written:</label>
                            <p>{{ $task->words_written }}</p>
                        </div>


                        <div class="form-group">
                            <label>Deadline Date & Time:</label>
                            <p>{{ $task->deadline_date_time }}</p>
                        </div>

                        <div class="form-group">
                            <label>Score:</label>
                            <p>{{ $task->score }}</p>
                        </div>

                        <div class="form-group">
                            <label>Comments:</label>
                            <p>{{ $task->comments }}</p>
                        </div>

                        <div class="form-group">
                            <label>Work Status :</label>
                            <p>
                                {!! $task->isDeadlineMet
                                    ? '<span class="badge badge-danger">Deadline Not Met</span>'
                                    : '<span class="badge badge-success">Deadline Met</span>' !!}
                            </p>
                        </div>



                        @if (
                            (Auth()->guard('admin')->user()->hasRole('Admin') || Auth()->guard('admin')->user()->hasRole('Admin')) &&
                                $task->status == 'COMPLETED')
                            <div class="form-group">
                                <label>Action :</label>
                                <form class="d-inline-flex" id="publishSolutionLibrary"
                                    action="{{ route('task-publish', ['task' => $task->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-sm btn btn-success">Publish to Solution
                                        Library</button>
                                </form>

                            </div>
                        @endif


                        @if (
                            (Auth()->guard('admin')->user()->hasRole('Admin') || Auth()->guard('admin')->user()->hasRole('Admin')) &&
                                $task->status == 'COMPLETED')
                            <div class="form-group">
                                <label>Re - Assigned :</label>
                                <button type="button" class="reassigned btn-sm btn btn-success">Re-Assigned</button>
                            </div>
                        @endif

                        <div class="form-group">
                            <label>Question file:</label>

                            &nbsp;<a target="_blank" download
                                href="{{ asset('/uploads/questions/' . $task->questions_file) }}">
                                <i class="fa fa-download"></i>
                            </a> &nbsp;&nbsp;
                            <a target="_blank" href="{{ asset('/uploads/questions/' . $task->questions_file) }}">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>


                        @if ($task->answers_file != '')
                            <div class="form-group">
                                <label>Answers file:</label>

                                &nbsp;<a target="_blank" href="{{ asset('/uploads/answers/' . $task->answers_file) }}">
                                    <i class="fa fa-download"></i>
                                </a> &nbsp;&nbsp;
                                <a target="_blank" href="{{ asset('/uploads/answers/' . $task->answers_file) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        @endif



                        <div class="form-group">
                            <label>Comments:</label>
                            <p>{{ $task->comments }}</p>
                        </div>



                        <h3>Question & Answers</h3>
                        <table id="questionTable" class="table table-bordered">
                            <tr>
                                <td>
                                    {!! $task->question !!} <br />
                                    {!! $task->answer !!}
                                </td>
                            </tr>

                        </table>


                    </div>
                        <div style="text-align: center; margin-block: 20px;">
                            <a href="{{url()->previous()}}">  <button type="button" class="btn btn-warning">{{__('Back')}}</button></a>&nbsp;&nbsp;
                        </div>

                </div>
            </div>
        </div>
    </div>





    <!-- View MODAL -->
    <div class="modal fade" id="reAssigned" tabindex="-1" role="dialog" aria-labelledby="reAssignedTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('task-re-assigned', $task->id) }}" id="reAssignedForm" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reAssignedTitle">Re - Assign to
                            {{ $task->proposals ? $task->proposals->user->FullName : '' }} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Reasons : </label>
                                    <input type="text" name="reason" class="summernote" id="summernotes" />
                                    {{-- <textarea type="text" name="reason" id="summernotes" required></textarea> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- View CLOSED -->
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).on('click', '.reassigned', function() {
            $("#reAssigned").modal("show");
        })

        $('#summernotes').summernote({
            height: '300'
        });

        // Custom validation rule for Summernote
        $.validator.addMethod("summernoteRequired", function(value, element) {
            // Get the Summernote reason
            var summernoteContent = $('#summernotes').summernote('isEmpty');
            console.log("summernoteContent", summernoteContent);
            return !summernoteContent;
        }, "This field is required");

        // Initialize jQuery Validate
        $("#reAssignedForm").validate({
            ignore: [], // To ensure hidden fields like summernote are validated
            rules: {
                reason: {
                    summernoteRequired: true
                }
            },
            messages: {
                reason: {
                    summernoteRequired: "Please enter reason in the editor"
                }
            },
            submitHandler: function(form) {
                // You can also submit the form here if needed
                //form.submit();
                console.log("form", form.valid());
            }
        });

        $(document).on('submit', "#reAssignedForm", function() {
            $('.summernote').each(function() {
                $(this).val($(this).summernote('code'));
            });
        })


        $(document).on('submit', '#publishSolutionLibrary', function() {
            var con = confirm('Are you sure you want to publish');
            if (!con) {
                return false;
            }
        })

        document.addEventListener("DOMContentLoaded", function() {
            const table = document.getElementById('questionTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = rows.length - 1; i >= 0; i--) {
                const cells = rows[i].getElementsByTagName('td');
                let isEmptyRow = true;

                for (let j = 0; j < cells.length; j++) {
                    if (cells[j].innerText.trim() !== '') {
                        isEmptyRow = false;
                        break;
                    }
                }

                if (isEmptyRow) {
                    rows[i].parentNode.removeChild(rows[i]);
                }
            }
        });
    </script>
@endpush
