@extends('layouts.app')

@section('title')
    Home | Solution Library
@endsection

@push('css')

<style>
    .page-item.active .page-link{
        background-color: #ff7707;
        border-color: #ff7707;
    }
    .page-link{
        color:#ff7707;
    }
    .page-link:hover{
        color: #ff7707;
    }
    .pagination{
        justify-content: center;
    }

    .questions p{
        color :#ff7707!important;
    }
</style>
@endpush

@section('content')

    <!-- Start main-content -->
    @if($subject_category_id==null)
    <section class="page-title" style="background-image: url({{asset('assets/images/contact-bnnr.png')}});">

        <div class="auto-container">

            <div class="col-md-7">

                <div class="title-outer">

                    <h1 class="title">Solution Library</h1>

                    <p class="text-white ntext">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>

                </div>

            </div>

        </div>

    </section>
    @else
    <section class="page-title " style="min-height: 50px"></section>
    @endif
    <!-- end main-content -->


    <!-- Results Section  -->

    <div class="row">
        <div class="col-9">
                
                    <div class="p-5 ">
                        <form action="" method="GET">
                            <div class="position-relative">
                                <input class="w-100 mb-4 py-1 px-4 fs-6" value="{{ (isset($_GET['search']))?$_GET['search']:'' }}" style="border: 2px solid #ff7707;" name="search" id="search" placeholder="Search by name" type="search">
                                <select style="top: 0.6rem;right: 35rem;color: grey;width: 15%;" class="position-absolute bg-transparent fs-6 " name="subject_category" id="subject_category">
                                    <option value="">Select Subject</option>
                                    @foreach ($subjectcategory as $item)
                                    <option @if(isset($_GET['subject_category'])) @if($_GET['subject_category']==$item->id) selected @endif @endif value="{{$item->id}}">{{$item->category_name}}</option>
                                    @endforeach
                                </select>
                                <select style="top: 0.6rem; right: 22rem;color: grey;width: 17%;" class="position-absolute bg-transparent fs-6" name="subject" id="subject">
                                    <option value="">Select Topic</option>
                                    @if(count($topics) > 0)
                                        @foreach ($topics as $item)
                                        <option @if(isset($_GET['subject'])) @if($_GET['subject']==$item->id) selected @endif @endif value="{{$item->id}}">{{$item->subject_name}}</option>
                                        @endforeach
                                    @endif

                                </select>

                            
                                <select style="    top: 0.6rem;
                                right: 10rem;
                                color: grey;
                                width: 15%" class="position-absolute bg-transparent fs-6" name="subject_code" id="subject_code">
                                    <option value="">Select Code</option>
                                    @foreach ($courseCode as $item)
                                    <option value="{{$item->id}}">{{$item->code}}</option>
                                    @endforeach
                                </select>


                                <button type="submit" style="background-color: #ff7707; padding: 0.35rem 0;" class="fs-6 px-5 searchBtn position-absolute end-0">Search</button>
                            </div>
                        </form>
                        <div id="solutions_library">
                            @if(count($questions) > 0)
                                @include('sections.solution-library-landing',['courseCode'=>$courseCode,'questions'=>$questions,'subject_category_id'=>$subject_category_id])
                            @else
                                <h2 class="text-center" >No  records found</h2>
                            @endif
                        </div>

                    </div>
               
        </div>


        <div class="col-3 pe-5 border-start border-3 border-light-subtle">
            @if(count($subjectsCategory) > 0)
                @include('sections.sidebar-subjects',['subjectsCategory'=>$subjectsCategory,'subject_category_id'=>$subject_category_id,'topic_id'=>$topic_id])
            @else
                <h2 class="text-center" >No  records found</h2>
            @endif
        </div>

    </div>


@endsection

@push('js')

<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select2').select2();
});

$(document).on('change','#subject_category',function(){
    
    //$.LoadingOverlay("show");

    $.ajax({
        url: '{{route('get.ajax.subcategory')}}',
        type: 'GET',
        data:{category_id:$("#subject_category option:selected").val()},
        success: function(data){
            $.LoadingOverlay("hide");
            if(data.html != ''){
                //$("#solutions_library").html(data.html);
                if(data.subject.length > 0){
                    $("#subject option").remove();
                    $("#subject").append(`<option value="">Select Subject</option>`)
                    $.each(data.subject,function(key,value){
                        $("#subject").append(`<option value="${value.id}">${value.subject_name}</option>`)
                    });
                }
            }
            else{
                $("#solutions_library").html("<p class='text-danger'> No records found </p>");                
            }
        }
    });
});



// $(document).on('change','#subject',function(){
    
//     $.LoadingOverlay("show");

//     $.ajax({
//         url: '{{route('get.ajax.subjects')}}',
//         type: 'GET',
//         data:{category_id:$("#subject_category option:selected").val(),subject_id:$("#subject option:selected").val()},
//         success: function(data){
//             $.LoadingOverlay("hide");
//             if(data.html != ''){
//                 $("#solutions_library").html(data.html);
//             }else{
//                 $("#solutions_library").html("<p class='text-danger'> No records found </p>");                
//             }
//         }
//     });
// });

// $(document).on('click','.searchBtn',function(){

//     $.LoadingOverlay("show");

//     $.ajax({
//         url: '{{route('get.ajax.subjects')}}',
//         type: 'GET',
//         data:{category_id:$("#subject_category option:selected").val(),subject_id:$("#subject option:selected").val(),'search':$("#search").val()},
//         success: function(data){
//             $.LoadingOverlay("hide");
//             if(data.html != ''){
//                 $("#solutions_library").html(data.html);
//             }else{
//                 $("#solutions_library").html("<p class='text-danger'> No records found </p>");                
//             }
//         }
//     });

// })


</script>
@endpush