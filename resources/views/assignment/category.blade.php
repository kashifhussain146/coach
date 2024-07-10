@extends('layouts.app')

@section('title')
    Home | Category
@endsection

@push('css')

@endpush

@section('content')
		<!-- Start main-content -->
		<section class="page-title page-title-sec-one-assignment" style="background-image: url(assets/images/banner-about.jpg);">
			<div class="auto-container">
				<div class="row">
					<div class="col-md-7">
						<div class="title-outer">
							<h1 class="title">Assignment Help</h1>
							<p class="text-white ntext">Lorem Ipsum is simply dummy text of the printing and typese
								tting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
								1500s, when an unknown printer.</p>
							
						</div>
					</div>
					<div class="col-md-5">
						<!-- Sign Form -->
						<div class="signup-form-two wow fadeInLeft">

							<!--Contact Form-->
							<form method="post" action="" id="contact-form">
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

		<!-- Why Choose Section -->
		<section class="whychoose-section section-paddding page-assignment-sec-two">
			<div class="auto-container">
				<div class="row">
					<div class="sec-title text-center">
                        <br />
						<span class="sub-title">TAGLINE</span>
						<h2>Why Choose Onlie Assignment Help From CoachOnCouch</h2>
					</div>
				</div>
				<div class="row">
					<!-- whychoose Block -->
                    @foreach($category as  $k=>$v)
					<div class="why-block col-lg-4 col-md-6 col-sm-6 wow fadeInUp">
						<div class="inner-box wow fadeInLeft" data-wow-delay="150ms" data-wow-duration="1500ms">
							<div class="border-layer"></div>
							<div class="icon-box">
								<div class="icon lnr-icon-book"></div>
							</div>
							<h4><a href="{{route('assignment.help.details',['module_data_id'=>$v->id])}}">{{$v->title}}</a></h4>
							<!-- <div class="text">{{$v->description}}</div> -->
						</div>
					</div>
                    @endforeach	

				</div>
			</div>
		</section>
		<!-- End Why Choose Section-->


		<!-- About Section -->
		<section class="about-section assignment-sec-two-main-cstm">
			<div class="anim-icons">
				<span class="icon icon-dotted-map"></span>
			</div>
			<div class="auto-container">
				<div class="row">
					<div class="content-column col-lg-6 col-md-12 order-2 wow fadeInRight" data-wow-delay="600ms">
						<div class="inner-column">
							<div class="sec-title">
								<span class="sub-title">Get to know us</span>
								<h2>Urget Homework Help Needed ?</h2>
								<div class="text">Lorem ipsum dolor sit amet consectur adipiscing elit sed eiusmod
									tempor incididunt labore dolore magna aliquaenim ad minim. Sed risus augue, commodo
									ornare felis non, eleifend molestie metus pharetra eleifend.</div>
							</div>

							<ul class="list-style-one two-column">
								<li><i class="icon fa fa-check"></i> Expert trainers</li>
								<li><i class="icon fa fa-check"></i> Online learning</li>
								<li><i class="icon fa fa-check"></i> Lifetime access</li>
								<li><i class="icon fa fa-check"></i> Great results</li>
							</ul>

							<div class="btn-box">
								<a href="{{ route('get-a-quote') }}" class="theme-btn btn-style-one"><span
										class="btn-title">Contact Experts</span></a>
							</div>
						</div>
					</div>

					<!-- Image Column -->
					<div class="image-column col-lg-6 col-md-12 img-sec-three-cstm-assignment">
						<div class="anim-icons">
							<span class="icon icon-dotted-map-2"></span>
							<span class="icon icon-paper-plan"></span>
							<span class="icon icon-dotted-line"></span>
						</div>
						<div class="inner-column wow fadeInLeft">
							<figure class="image-1 overlay-anim wow fadeInUp"><img src="assets/images/about-1.png"
									alt=""></figure>
							<figure class="image-2 overlay-anim wow fadeInRight"><img src="assets/images/about-2.jpg"
									alt=""></figure>
							<div class="experience bounce-y"><span class="count">16</span> Years of Experience</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--End About Section -->

		<!-- Do My Assignment Section Three -->
		<section class="about-section-three assignment-sec-three-main-cstm">
			<div class="auto-container">
				<div class="row">
					<div class="sec-title text-center">
						<span class="sub-title">TAGLINE</span>
						<h2>Do My Assignment For Me</h2>
					</div>
				</div>
				<div class="row">
					<div class="content-column col-lg-6 col-md-12 order-2 wow fadeInRight" data-wow-delay="600ms">
						<div class="inner-column">
							<div class="anim-icons">
								<span class="icon icon-dots-5 bounce-x"></span>
								<span class="icon icon-dots-3 bounce-y"></span>
								<span class="icon icon-star-2 spin-one"></span>
							</div>

							<div class="sec-title">
								<div class="text">Lorem ipsum dolor sit amet consectur adipiscing elit sed eiusmod
									tempor incididunt labore dolore magna aliquaenim ad minim. Sed risus augue, commodo
									ornare felis non, eleifend molestie metus pharetra eleifend.Lorem ipsum dolor sit
									amet consectur adipiscing elit sed eiusmod tempor incididunt labore dolore magna
									aliquaenim ad minim.</div>
								<div class="text">Lorem ipsum dolor sit amet consectur adipiscing elit sed eiusmod
									tempor incididunt labore dolore magna aliquaenim ad minim. Sed risus augue, commodo
									ornare felis non, eleifend molestie metus pharetra eleifend.</div>
								<div class="text">Lorem ipsum dolor sit amet consectur adipiscing elit sed eiusmod
									tempor incididunt labore dolore magna aliquaenim ad minim. Sed risus augue, commodo
									ornare felis non, eleifend molestie metus pharetra eleifend.</div>
							</div>
							<div class="btn-box">
								<a href="{{ route('get-a-quote') }}" class="theme-btn btn-style-one"><span class="btn-title">Discover
										more</span></a>
								<span class="float-icon icon-arrow"></span>
							</div>
						</div>
					</div>

					<!-- Image Column -->
					<div class="image-column col-lg-6 col-md-12">
						<div class="inner-column wow fadeInLeft">
							<div class="anim-icons">
								<span class="icon icon-percent bounce-y"></span>
								<span class="icon icon-star-1 spin-one"></span>
								<span class="icon icon-dots-4 bounce-x"></span>
								<span class="icon icon-wave"></span>
								<span class="icon icon-idea bounce-y"></span>
							</div>
							<figure class="image overlay-anim wow fadeInUp"><img src="assets/images/about-4.png" alt="">
							</figure>

						</div>
					</div>
				</div>
			</div>
		</section>
		<!--Emd Do My Assignment Section -->

		<!-- Categories Section -->
		<section class="categories-section-current">
			<div class="auto-container">
				<div class="anim-icons">
					<span class="icon icon-group-1 bounce-y"></span>
					<span class="icon icon-group-2 bounce-y"></span>
				</div>

				<div class="sec-title text-center">
					<span class="sub-title">TAGLINE HEADING</span>
					<h2>How We Work</h2>
				</div>

				<div class="row justify-content-center">
					<!-- Category Block -->

					@foreach($work as $k=>$v)
					<div class="category-block-current col-xl-3 col-lg-3 col-md-4 col-sm-6">
						<div class="inner-box">
							<div class="icon-box">
								<i class="icon  {{ ($v->icon!='')?$v->icon:'flaticon-student-2'}}"></i>
							</div>
						
							<h6 class="title">{{$v->title}}</h6>
							<p >{!! strip_tags($v->description) !!}</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>
		<!-- End Product Categories -->


		<!-- Clients Section   -->
		<section class="clients-section">
			<div class="auto-container">
				<!-- Sponsors Outer -->
				<div class="sponsors-outer">
					<!--clients carousel-->
					<ul class="clients-carousel owl-carousel owl-theme">
						@foreach($amenities as $K=>$v)
						<li class="slide-item"> <a href="#"><img src="{{asset('images/'.$v->image)}}" alt=""></a> </li>
						@endforeach
					</ul>
				</div>
			</div>
		</section>

		@include('sections.faq',['faq'=>$helpFaqs,'tag_line'=>'FAQ','heading'=>'Faq','col'=>'col-md-12'])
		@include('sections.testimonials',['type'=>2,'tagline'=>'TAGLINE HEADING','heading'=>'Testimonials','testimonial'=>$testimonial])
		
        {{-- @include('sections.clients')
        @include('sections.faq')
        @include('sections.testimonials') --}}

@endsection

@push('js')

@endpush