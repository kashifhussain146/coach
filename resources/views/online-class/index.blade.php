@extends('layouts.app')

@section('title')
    Home | Category
@endsection

@push('css')
@endpush

@section('content')
    <!-- Start main-content -->
    <section class="page-title" style="background-image: url('{{ asset('images/' . $category->image) }}');">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-7">
                    <div class="title-outer">
                        <h1 class="title">{{ $category->title }}</h1>
                        <p class="text-white ntext">{!! $category->description !!}</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <!-- Sign Form -->
                    <div class="signup-form-two wow fadeInLeft">

                        <!--Contact Form-->
                        <form class="mx-4" method="post" action="" id="contact-form">
                            <div class="form-group">
                                <input type="text" name="full_name" placeholder="Your name" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="Email" placeholder="Email Address" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="Phone" placeholder="Phone Number" required>
                            </div>

                            <div class="form-group">
                                <textarea class="" placeholder="Message"></textarea>
                            </div>

                            <div class="form-group">
                                <button class="theme-btn btn-style-one bg-theme-color4" type="submit"
                                    name="submit-form">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->
        </div>
    </section>


    <!-- Pay Someone To Do My Online Class -->
    <section class="py-5">
        <div style="margin-bottom: 1rem !important;" class="sec-title text-center">
            <span class="sub-title">TAGLINE HEADING</span>
            <h2 class="fs-1 pb-4">{{ $category->extra_field_1 }}</h2>
        </div>

        <div style="padding: 0 5rem 2rem 5rem;" class="row">
            <div class="col-6">
                <p style="font-size: large !important;" class="fs-5 black">{{ $category->extra_field_2 }}</p>
            </div>
            <div class="col-6">
                <p style="font-size: large !important;" class="fs-5 black">{{ $category->extra_field_3 }}</p>
            </div>
        </div>


        <div style="padding: 0 5rem;" class="row py-4 justify-content-around position-relative">
            <img style="position: absolute; top: 6rem; right: -3rem; width: 8rem;" src="./assets/images/trial25.png"
                alt="">
            <div style="width: 35% !important;" class="col-6 position-relative">
                <img style="position: relative; z-index: 10;" class="rounded-3 mx-auto"
                    src="./assets/images/online_class1.png" alt="">
                <img style="position: absolute; bottom: -3.5rem; right: -5.5rem; z-index: 20; width: 45%;"
                    src="./assets/images/online_class2.png" alt="">
                <img style="position: absolute; bottom: -3rem; left: -3.5rem; z-index: 0;"
                    src="./assets/images/new_trial11.png" alt="">
            </div>
            <div style="width: 58%;" class="col-6">
                <div class="row">
                    <div class="col-3 text-end">
                        <img src="./assets/images/online_class3.png" alt="">
                    </div>
                    <div class="col-9">
                        <p style="margin: 0 !important; color: black; font-weight: 600;">{{ $category->extra_field_4 }}</p>
                        <p style="margin: 0.5rem 0 !important; font-size: medium; line-height: 1.5; color: black;">
                            {{ $category->extra_field_5 }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 text-end">
                        <img src="./assets/images/online_class3.png" alt="">
                    </div>
                    <div class="col-9">
                        <p style="margin: 0 !important; color: black; font-weight: 600;">{{ $category->extra_field_6 }}</p>
                        <p style="margin: 0.5rem 0 !important; font-size: medium; line-height: 1.5; color: black;">
                            {{ $category->extra_field_7 }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 text-end">
                        <img src="./assets/images/online_class3.png" alt="">
                    </div>
                    <div class="col-9">
                        <p style="margin: 0 !important; color: black; font-weight: 600;">{{ $category->extra_field_8 }}</p>
                        <p style="margin: 0.5rem 0 !important; font-size: medium; line-height: 1.5; color: black;">
                            {{ $category->extra_field_9 }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 text-end">
                        <img src="./assets/images/online_class3.png" alt="">
                    </div>
                    <div class="col-9">
                        <p style="margin: 0 !important; color: black; font-weight: 600;">{{ $category->extra_field_10 }}
                        </p>
                        <p style="margin: 0.5rem 0 !important; font-size: medium; line-height: 1.5; color: black;">
                            {{ $category->extra_field_11 }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 text-end">
                        <img src="./assets/images/online_class3.png" alt="">
                    </div>
                    <div class="col-9">
                        <p style="margin: 0 !important; color: black; font-weight: 600;">{{ $category->extra_field_12 }}
                        </p>
                        <p style="margin: 0.5rem 0 !important; font-size: medium; line-height: 1.5; color: black;">
                            {{ $category->extra_field_13 }}</p>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- Take My Online Class  -->



    @php

        $mainHead1 = $category->extra_field_15;
        $text1 = $mainHead1; // Replace with your actual string
        $coloredPart1 = substr($text1, 0, 5);
        $rest1 = substr($text1, 5);

        $mainHead2 = $category->extra_field_17;
        $text2 = $mainHead2; // Replace with your actual string
        $coloredPart2 = substr($text2, 0, 5);
        $rest2 = substr($text2, 5);

        $customData = [
            ['colored_title' => $coloredPart1, 'normal_title' => $rest1, 'description' => $category->extra_field_16],
            ['colored_title' => $coloredPart2, 'normal_title' => $rest2, 'description' => $category->extra_field_18],
        ];
    @endphp
    @include('sections.headings', [
        'is_circle' => 0,
        'data' => $works,
        'title' => $category->title,
        'customData' => $customData,
    ])

    <!-- Why use  -->

    <section class="py-5 position-relative">
        <div class="sec-title text-center">
            <span class="sub-title">TAGLINE HEADING</span>
            <h2 class="fs-1 pb-4">Why Use CoachOnCouch Online Class Help Service</h2>
        </div>

        <img style="position: absolute; bottom: 0; left: -2rem;" src="{{ asset('/assets/images/trial26.png') }}"
            alt="">
        <img style="position: absolute; top: 0; right: 0;" src="{{ asset('/assets/images/trial10_new.png') }}"
            alt="">
        <div style="padding: 0 4rem 4rem 4rem;" class="row justify-content-evenly">
            @foreach ($services as $k => $v)
                <div class="col-3" style="background-color: #ff7707; width: 20%; text-align: center;">
                    <img style="width: 40% !important;" class="py-3" src="{{ asset('images/' . $v->image) }}"
                        alt="">
                    <h5 class="text-white mx-4 fs-4">{{ $v->title }}</h5>
                    <p style="font-size: medium; line-height: 1.5;" class="text-white mx-4">{!! $v->description !!}</p>
                </div>
            @endforeach
        </div>
    </section>

    @include('sections.clients', ['data' => $colleges])
    @include('sections.faq', [
        'faq' => $faqs,
        'tag_line' => 'FAQ',
        'heading' => 'Faq',
        'col' => 'col-md-12',
    ])
    @include('sections.testimonials', [
        'type' => 2,
        'tagline' => 'Testimonials',
        'heading' => 'Testimonials',
        'testimonial' => $testimonials,
    ])
@endsection

@push('js')
@endpush
