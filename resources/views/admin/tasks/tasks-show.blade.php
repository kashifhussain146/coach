@extends('admin.layouts.app')
@section('title')
    <title>View Tasks</title>
@stop
@section('inlinecss')

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
                            <label>Question file:</label>

                            &nbsp;<a target="_blank" download href="{{asset(''.$task->questions_file)}}">
                                <i class="fa fa-download"></i>
                            </a> &nbsp;&nbsp;
                            <a target="_blank" href="{{asset(''.$task->questions_file)}}">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>


                        @if($task->answers_file!='')
                            <div class="form-group">
                                <label>Answers file:</label>

                                &nbsp;<a target="_blank" href="{{asset(''.$task->answers_file)}}">
                                    <i class="fa fa-download"></i>
                                </a> &nbsp;&nbsp;
                                <a target="_blank" href="{{asset(''.$task->answers_file)}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        @endif



                        <div class="form-group">
                            <label>Comments:</label>
                            <p>{{ $task->comments }}</p>
                        </div>


                        @if($task->details->count() > 0)
                        <h3>Question  & Answers</h3>                        
                        <table class="table">
                            <tr>
                                <td style="width:500px;">Question</td>
                                <td>Answers</td>
                            </tr>
                        
                            @foreach ($task->details as $item)
                            <tr>
                                <td>{!!$item->questions!!}</td>
                                <td>{!!$item->answers!!}</td>
                            </tr>
                            @endforeach
                        

                        </table>

                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
            @endsection
