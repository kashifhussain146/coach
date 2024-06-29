@extends('layouts.app')

@section('title')
    Home | Blogs
    
@endsection

@section('meta')
<meta name="title" content="Blogs | Coach On Couch">
<meta name="description" content="Read the Latest by Coach On Couch Team">
<meta name="keywords" content="blogs, blog, online coaching">



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

    .page-title:before {
        height: auto !important;
    }
    </style>
@endpush

@section('content')
    <!-- Blog Section  -->

    <!-- Start main-content -->
    <section class="page-title" style="min-height: 0px;">
        <div class="auto-container">
            <div class="col-md-7">
                <div class="title-outer">
                    <h1 class="title text-dark">Blogs</h1>
                    <ul class="nav">
                        <a href="{{route('home')}}"><li>Home</li></a> &nbsp; > &nbsp;
                        <a href="{{route('blogs')}}"> <li>blogs</li></a>
                        @if($category)
                        &nbsp; > &nbsp;
                        <li>{{$category->category_name}}</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end main-content -->
    <section class="row carousel-home" >
        <div class="col-8  justify-content-evenly ">
            <div class="row  blog-pad1" style="justify-content: space-between;">
                @if($blogs->count() > 0)
                    @foreach ($blogs as $item)
                        <div class="card col-6 mb-5 blog-sec2-wid">
                            <img class="card-img-top"
                                src="{{asset('images/'.$item->image)}}"
                                alt="Card image cap">
                            <div class="card-body bg-light">
                                <h6 class="blog-sec2-txt"><span style="color: #ff7707 !important;" class="mx-3"> <i
                                            style="transform: rotate(90deg);" class="fa-solid fa-tag"></i></span>{{$item->modelable->category_name}}</h6>
                                <h5 class="black mx-3 py-2">{{ Str::substr($item->title, 0, 80).' '.'...' }}</h5>

                                <div class="row justify-content-between pb-2">
                                    <div class="col-6 fs-6 terms-points">
                                        <i class="fas fa-calendar-alt ms-3 me-2"></i> {{date('d M, Y',strtotime($item->created_at))}} 
                                        {{-- 06 Nov, 2023 --}}
                                    </div>
                                    <div class="col-6 text-end fs-6">
                                        <a class="mx-3 fw-bold" href="{{ route('blog.detail', $item->id) }}">Read More <i
                                                class="fa-solid fa-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>            
                    @endforeach
                @else
                <h3 class="text-center mt-5">No records found</h3>
                @endif


                

            </div>
            {{ $blogs->links() }}
        </div>
        <div class="col-4 pe-5 blog-pad2">
            <div class="bg-light rounded-3">
                <p class="ps-4 pt-5 black fs-4 fw-bold">Search Here</p>
                <hr class="mx-4 mb-4">
                <div class="position-relative pb-2">
                    <form action="" method="get">
                    <input value="{{$search}}" name="search" placeholder="Search your Keyword..." style="width: 80%; font-size: small; font-weight: 500;"
                        class="mx-4 mb-4 py-2 px-4 rounded-3" type="text" name="" id="">
                    <button type="submit" class="rounded-end"
                        style="padding: 0.5rem 1rem; background-color: #ff7707; position: absolute; top: -0.1px;
                        right: 1.5rem;"><i
                            class="fa-solid fa-magnifying-glass text-white"></i></button>
                    </form>

                </div>
            </div>
            <div class="bg-light my-5 rounded-3 blog-pad3">
                <p class="ps-4 black fs-4 fw-bold">Categories</p>
                <hr class="mx-4 mb-4">
                
                <div id="subjects-container">
                    @foreach ($subjectsCategory as $index => $item)
                        <a href="{{route('blogs').'?category='.$item->id}}">
                            <div  class="row justify-content-between bg-white mx-4 my-3 subject-item {{ $index >= 5 ? 'd-none' : '' }}">
                                <p style="margin: 0 !important; padding: 1rem; font-weight: 500;" class="col-6 fs-6">
                                    {{$item->category_name}}
                                </p>
                                <div class="col-6 row justify-content-evenly">
                                    <hr class="col-6" style="transform: rotate(90deg); height: 1px; width: 5px; position: relative; top: 1.8rem; left: 3rem;">
                                    <p style="margin: 0 !important; padding: 1rem; font-weight: 500;" class="col-6 fs-6 text-end">({{$item->blogs_count}})</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                
                @if($subjectsCategory->count() > 5)
                <div class="text-center">
                    <a  id="show-more" class="text-primary" style="text-decoration:underline">Show More</a>
                    <a id="show-less" class="text-primary d-none" style="text-decoration:underline">Show Less</a>
                </div>
                @endif


            </div>
            {{-- <div class="bg-light my-5 rounded-3 blog-pad3">
                <p class="ps-4 black fs-4 fw-bold">Latest Posts</p>
                <hr class="mx-4">
                <div>
                    <div class="row bg-light mx-4 mb-3 py-2">
                        <img style="width: 30%;" class="col-6"
                            src="https://images.unsplash.com/photo-1535025639604-9a804c092faa?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6cb0ceb620f241feb2f859e273634393&auto=format&fit=crop&w=500&q=80"
                            alt="">
                        <div class="col-6">
                            <p class="fs-6" style="margin: 0 !important;">06 Nov, 2023</p>
                            <p class="fs-6 black" style="margin: 0 !important; font-weight: 600;">Recent Post 1</p>
                        </div>
                    </div>
                    <hr class="mx-4">
                    <div class="row bg-light mx-4 mb-3 py-2">
                        <img style="width: 30%;" class="col-6"
                            src="https://images.unsplash.com/photo-1535025639604-9a804c092faa?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6cb0ceb620f241feb2f859e273634393&auto=format&fit=crop&w=500&q=80"
                            alt="">
                        <div class="col-6">
                            <p class="fs-6" style="margin: 0 !important;">10 Nov, 2023</p>
                            <p class="fs-6 black" style="margin: 0 !important; font-weight: 600;">Recent Post 1</p>
                        </div>
                    </div>
                    <hr class="mx-4">
                    <div class="row bg-light mx-4 mb-3 py-2">
                        <img style="width: 30%;" class="col-6"
                            src="https://images.unsplash.com/photo-1535025639604-9a804c092faa?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6cb0ceb620f241feb2f859e273634393&auto=format&fit=crop&w=500&q=80"
                            alt="">
                        <div class="col-6">
                            <p class="fs-6" style="margin: 0 !important;">12 Nov, 2023</p>
                            <p class="fs-6 black" style="margin: 0 !important; font-weight: 600;">Recent Post 1</p>
                        </div>
                    </div>
                    <hr class="mx-4">
                </div>
            </div> --}}
            

        </div>

    </section>
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const showMoreButton = document.getElementById('show-more');
        const showLessButton = document.getElementById('show-less');
        const subjectItems = document.querySelectorAll('.subject-item');

        showMoreButton.addEventListener('click', function () {
            subjectItems.forEach((item, index) => {
                if (index >= 5) {
                    item.classList.remove('d-none');
                }
            });
            showMoreButton.classList.add('d-none');
            showLessButton.classList.remove('d-none');
        });

        showLessButton.addEventListener('click', function () {
            subjectItems.forEach((item, index) => {
                if (index >= 5) {
                    item.classList.add('d-none');
                }
            });
            showMoreButton.classList.remove('d-none');
            showLessButton.classList.add('d-none');
        });
    });

    </script>
@endpush