@extends('layouts.app')

@section('title')
    Home | Category
@endsection

@push('css')

@endpush

@section('content')
    <!-- Start main-content -->
    <section class="page-title acc-banner" style="background-image: url('{{asset('images/'.$category->image)}}')">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-7">
                    <div class="title-outer acc-title">
                        <h1 class="title">{{$category->title}}</h1>
						<p style="color: white!important">{!!$category->description!!}</p>

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
                    <!--End Contact Form -->
                </div>
            </div>
        </div>
    </section>
    <!-- end main-content -->



    <!-- Pay Someone To Do My Online Class -->

    <section class="py-5">
			<div class="sec-title text-center pt-3 mb-3">
				<span class="sub-title">{{$category->extra_field_2}}</span>
				<h2 class="fs-2 pb-4">{{$category->title}} Assignment Help</h2>
			</div>

			<div class="row py-4 justify-content-around position-relative acc-pad">
				<img class="acc-img4" src="{{asset('assets/images/trial25.png')}}"alt="">

				<div class="col-6 position-relative pb-4 acc-img-div">

					<img class="rounded-3 mx-auto z-ind position-relative" src="{{asset(''.$category->extra_field_files_1)}}" alt="">
					<img class="acc-img5" src="{{asset(''.$category->extra_field_files_2)}}" alt="">
					<img class="acc-img6" src="{{asset('assets/images/new_trial11.png')}}" alt="">
				</div>

				<div style="width: 48%;" class="col-6 ms-3">
					{!! $category->extra_field_desc_1 !!}
				</div>

			</div>
    </section>


    <!-- Why Choose  -->
    <section class="bg-light py-5 position-relative">
        <img class="acc-img7" src="{{asset('assets/images/trial25.png')}}" alt="">
        <div class="sec-title text-center mb-3">
            {{-- <span class="sub-title">TAGLINE HEADING</span> --}}
            <h2 class="fs-2 pb-4">Why choose our {{$category->title}} homework help experts?</h2>
        </div>
        <div class="row py-3 justify-content-center acc-sec2-pad">
			@foreach ($experts as $item)
            <div class="col-3">
                <div class="bg-white text-center pt-3">
                    <div class="position-relative pb-4">
                        <img class="rounded-2 acc-sec2-img" src="{{asset('images/'.$item->image)}}" alt="">
                        <div class="shadow-lg acc-sec2-div"></div>
                    </div>
                    <p class="py-4 fs-4 fw-bold black">{{$item->title}}</p>
                </div>
            </div>
			@endforeach
        </div>
    </section>


    <section class="py-5 bg-white">
        <div class="sec-title text-center mb-3 acc-more-pad">
            <span class="sub-title fw-bold">TAGLINE HEADING</span>
            <h2 class="fs-2 pb-4">{{$category->title}} Homework Help topics we do</h2>
        </div>
        <div class="row py-5">
            <div style="margin-top: 2rem;" class="col-6">
				{!! $category->extra_field_desc_2 !!}
            </div>
            <div style="padding-left: 3rem !important;" class="col-6 position-relative">
                <img class="acc-sec4-img" src="{{asset(''.$category->extra_field_files_3)}}" alt="">
                <div class="acc-sec4-div"></div>
            </div>
        </div>
    </section>



    <section class="py-5 bg-light position-relative">
        <img class="accounting-img1" src="{{asset('assets/images/trial25.png')}}" alt="">
        <div class="sec-title text-center pt-4 mb-3">
            <span class="sub-title fw-bold">TAGLINE HEADING</span>
            <h2 class="fs-2 pb-4">Why Choose {{$category->title}} Homework Help Service of CoachOnCouch</h2>
        </div>

        <div class="row acc-sec5-pad  position-relative">
            @foreach ($services as $item)
			<div class="col-6">
				
                <div class="d-flex mb-4">
                    <div class="me-3">
                        <img width="200" src="{{asset('images/'.$item->image)}}" alt="">
                    </div>
                    <div>
                        <p class="acc-head">{{$item->title}}</p>
                        <p class="acc-body">{!!$item->description!!}</p>
                    </div>
                </div>					

            </div>
			@endforeach
        </div>

    </section>



    <!-- Clients Section   -->
    <section class="clients-section bg-white position-relative">
        <img class="accounting-img2" src="{{asset('assets/images/trial26.png')}}" alt="">
        <div class="sec-title text-center pt-5">
            {{-- <span class="sub-title fw-bold">TAGLINE HEADING</span> --}}
            <h2 class="fs-2 pb-4">Our Work Portfolio</h2>
        </div>
        <div class="acc-clients">
            <!-- Sponsors Outer -->
            <div class="sponsors-outer">
                <!--clients carousel-->
                <ul class="clients-carousel pt-0 owl-carousel owl-theme">
                    @foreach ($portfolio as $item)
					<li class="slide-item acc-shadow"> 
                        <a href="#">
                            <img class="pt-2" src="{{asset('images/'.$item->image)}}" alt="">
						</a>
                        <p class="acc-color fs-5 mb-0 fw-bold pt-3">{{$item->title}}</p>
                        <p class="m-0 fs-6 fw-bold black pb-3">{{$item->extra_field_1}}</p>
                        
					</li>						
					@endforeach
                </ul>
            </div>
        </div>
    </section>
    <!--End Clients Section -->


    <section class="py-5 bg-light position-relative">
        <img class="accounting-img3" src="{{asset('assets/images/trial10_new.png')}}" alt="">
        <div class="sec-title text-center pt-3 mb-3">
            <span class="sub-title fw-bold">TAGLINE HEADING</span>
            <h2 class="fs-2 pb-4">More Subjects Homework Help</h2>
        </div>
        <div class="text-center row carousel-home">
			@foreach ($subjects as $item)
            <div class="col-3 py-3">
                <div class="rounded-3 economics" style="background-image:url('{{asset('images/'.$item->image)}}') ">
                    <p class="text-white acc-more-pad fw-bold">{{$item->title}}</p>
                </div>
            </div>
			@endforeach
        </div>
    </section>



    <!-- Other Services  -->

    <div class="py-5 bg-white">
        <div class="sec-title text-center pt-3">
            <span class="sub-title">TAGLINE HEADING</span>
            <h2 class="fs-2">Other Services of CoachOnCouch</h2>
        </div>

        <div class="row position-relative acc-other-pad">
            <img class="acc-img8" src="{{asset('assets/images/trial25.png')}}" alt="">
            <img class="acc-img9"
                src="{{asset('assets/images/services-circ.png')}}" alt="">
            <div class="card col ms-2 acc-other-div">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-white fs-4 pt-2 pb-2"><span class="pb-1 acc-other-border">Assig</span>nment Help</h5>
                    <div class="row">
                        <div class="col-8">
                            <p class="card-text text-white py-2 m-0 acc-card-txt">Lorem ipsum dolor sit amet
                                consectetur, adipisicing elit. Exercitationem voluptatem dolores tempore impedit.</p>
                            <div class="btn-box py-2">
                                <a href="page-about.html" class="px-4 pb-1 rounded-pill bg-white"><span
                                         class="fw-bold acc-other-button">READ MORE</span></a>
                            </div>
                        </div>
                        <img class="col-4 acc-img10" src="{{asset('assets/images/services.png')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="card col ms-2 acc-other-div2">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-black fs-4 pt-2 pb-2"><span class="pb-1 acc-other-border2">Home</span>work Help</h5>
                    <div class="row">
                        <div class="col-8">
                            <p class="card-text black py-2 m-0 acc-card-txt">Lorem ipsum dolor sit amet
                                consectetur, adipisicing elit. Exercitationem voluptatem dolores tempore impedit.</p>
                            <div class="btn-box py-2">
                                <a href="page-about.html" class="px-4 pb-1 rounded-pill bg-dark"><span
                                        style="font-size: small;" class="text-white fw-bold">READ MORE</span></a>
                            </div>
                        </div>
                        <img class="col-4 acc-img10" src="{{asset('assets/images/services.png')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="card col ms-2 acc-other-div">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-white fs-4 pt-2 pb-2"><span class="pb-1 acc-other-border">Discu</span>ssion Board</h5>
                    <div class="row">
                        <div class="col-8">
                            <p class="card-text text-white py-2 m-0 acc-card-txt">Lorem ipsum dolor sit amet
                                consectetur, adipisicing elit. Exercitationem voluptatem dolores tempore impedit.</p>
                            <div class="btn-box py-2">
                                <a href="page-about.html" class="px-4 pb-1 rounded-pill bg-white"><span
                                         class="fw-bold acc-other-button">READ MORE</span></a>
                            </div>
                        </div>
                        <img class="col-4 acc-img10" src="{{asset('assets/images/services.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>



	@include('sections.faq',['faq'=>$faqs,'tag_line'=>'FAQ','heading'=>'Faq','col'=>'col-md-12'])
	@include('sections.testimonials',['type'=>2,'tagline'=>'Testimonials','heading'=>'Testimonials','testimonial'=>$testimonials])

@endsection

@push('js')

@endpush