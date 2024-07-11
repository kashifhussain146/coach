@extends('layouts.app')

@section('title')
    Services
@endsection


@section('content')


<!-- Start main-content -->
<section class="page-title page-title-services" style="background-image: url(assets/images/contact-bnnr.png);">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-7">
                    <div class="title-outer acc-title">
                        <h1 class="title">Our Services</h1>
                        <p class="text-white ntext">Lorem Ipsum is simply dummy text of the printing and typese
                            tting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer.</p>
                        <!-- <ul class="page-breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li><a href="#">Pages</a></li>
					<li>About</li>
				</ul> -->
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



    <!-- Services Section  -->

    <div class="pt-5 services-page-cstm-sec-two">
        <div class="sec-title text-center service-service-sec">
            <span class="sub-title">TAGLINE HEADING</span>
            <h2 class="fs-1 pb-4">Our Services</h2>
        </div>
        <div class="px-md-5 py-3 position-relative tab-padding-cstm">
            <img class="why-us-img1" src="./assets/images/trial11_new.png" alt="">
            <img class="why-us-img2" src="./assets/images/trial16.png" alt="">
            <div class="py-4 row sec-why-us-inner">
                <div class="py-4 row sec-why-us-inner">
                    @foreach($services as $k=>$v)
                    <div class="card col-6  bg-white border-0" >
                        <div class="card-body p-5  {{ ($k%2!=0)?'why-us-card-org':'why-us-card-blk' }} " style="border-radius:10px;">
                            <img class="mb-4" src="{{asset(''.$v->image)}}" alt="">
                            <h5 class="card-title fw-bold text-white fs-2 pb-3">{{$v->title}}</h5>
                            <p class="home-work-card-txt card-text text-white pb-4">
                               {!! strip_tags($v->description)!!}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                
            </div>
            
        </div>
    </div>
    <!-- End Services Section  -->




    <!-- Frequently Asked Question  -->
    
    @include('sections.faq',['type'=>2,'tag_line'=>'TAGLINE','heading'=>'Frequently Asked Questions','faq'=>$helpFaqs])
    <!--<section class="about-section-three position-relative p-0 mt-0">-->
    <!--    <img class="home-faq-img1" src="./assets/images/trial25.png" alt="">-->
        <!-- <img class="home-faq-img2" src="./assets/images/trial24.png" alt=""> -->
    <!--    <div class="auto-container">-->
    <!--        <div class="row">-->
    <!--            <div class="content-column col-md-12 order-2 wow fadeInRight" data-wow-delay="600ms">-->
    <!--                <div class="inner-column">-->

    <!--                    <div class="sec-title">-->
    <!--                        <div class="section-paddding">-->
    <!--                            <div class="auto-container-inner">-->
    <!--                                <div class="row">-->
    <!--                                    <div class="sec-title">-->
    <!--                                        <span class="sub-title text-end">TAGLINE</span>-->
    <!--                                        <h2 class="home-faq-head">Frequently asked questions?</h2>-->
    <!--                                    </div>-->
    <!--                                </div>-->
                                    <!--Product Tabs-->
    <!--                                <div class="tabs-listing mt-2">-->
    <!--                                    <div class="tab-container">-->
    <!--                                        <h3 class="tabs-ac-style d-md-none active" rel="general">GENERAL</h3>-->
    <!--                                        <div id="general" class="tab-content">-->
    <!--                                            <div class="product-description">-->
    <!--                                                <div class="row">-->
    <!--                                                    <div class="accordion" id="accordionFaq">-->
    <!--                                                        <div class="home-faq">-->
    <!--                                                            <h2 class="accordion-header" id="headingOne">-->
    <!--                                                                <button class="accordion-button fw-bold collapsed"-->
    <!--                                                                    type="button" data-bs-toggle="collapse"-->
    <!--                                                                    data-bs-target="#collapseOne"-->
    <!--                                                                    aria-expanded="false"-->
    <!--                                                                    aria-controls="collapseOne">-->
    <!--                                                                    Lorem Ipsum is simply dummy text of the-->
    <!--                                                                    printing-->
    <!--                                                                </button>-->
    <!--                                                            </h2>-->
    <!--                                                            <div id="collapseOne"-->
    <!--                                                                class="accordion-collapse collapse fw-bold"-->
    <!--                                                                aria-labelledby="headingOne"-->
    <!--                                                                data-bs-parent="#accordionFaq">-->
    <!--                                                                <div class="accordion-body">-->
    <!--                                                                    <p>Lorem Ipsum is simply dummy text of the-->
    <!--                                                                        printing Lorem-->
    <!--                                                                        Ipsum-->
    <!--                                                                        is simply dummy text of the printing and-->
    <!--                                                                        typesetting industryLorem Ipsum is-->
    <!--                                                                        simply-->
    <!--                                                                        dummy text of the printing and-->
    <!--                                                                        typesetting-->
    <!--                                                                        industry</p>-->
    <!--                                                                </div>-->
    <!--                                                            </div>-->
    <!--                                                        </div>-->
    <!--                                                        <div class="home-faq">-->
    <!--                                                            <h2 class="accordion-header" id="headingTwo">-->
    <!--                                                                <button class="accordion-button collapsed fw-bold"-->
    <!--                                                                    type="button" data-bs-toggle="collapse"-->
    <!--                                                                    data-bs-target="#collapseTwo"-->
    <!--                                                                    aria-expanded="false"-->
    <!--                                                                    aria-controls="collapseTwo">-->
    <!--                                                                    Lorem Ipsum is simply dummy text of the-->
    <!--                                                                    printing-->
    <!--                                                                </button>-->
    <!--                                                            </h2>-->
    <!--                                                            <div id="collapseTwo"-->
    <!--                                                                class="accordion-collapse collapse fw-bold"-->
    <!--                                                                aria-labelledby="headingTwo"-->
    <!--                                                                data-bs-parent="#accordionFaq">-->
    <!--                                                                <div class="accordion-body">-->
    <!--                                                                    <p>Lorem Ipsum is simply dummy text of the-->
    <!--                                                                        printing Lorem-->
    <!--                                                                        Ipsum-->
    <!--                                                                        is simply dummy text of the printing and-->
    <!--                                                                        typesetting industry</p>-->
    <!--                                                                </div>-->
    <!--                                                            </div>-->
    <!--                                                        </div>-->
    <!--                                                        <div class="home-faq">-->
    <!--                                                            <h2 class="accordion-header" id="headingThree">-->
    <!--                                                                <button class="accordion-button collapsed fw-bold"-->
    <!--                                                                    type="button" data-bs-toggle="collapse"-->
    <!--                                                                    data-bs-target="#collapseThree"-->
    <!--                                                                    aria-expanded="false"-->
    <!--                                                                    aria-controls="collapseThree">-->

    <!--                                                                    Lorem Ipsum is simply dummy text of the-->
    <!--                                                                    printing-->
    <!--                                                                </button>-->
    <!--                                                            </h2>-->
    <!--                                                            <div id="collapseThree"-->
    <!--                                                                class="accordion-collapse collapse fw-bold"-->
    <!--                                                                aria-labelledby="headingThree"-->
    <!--                                                                data-bs-parent="#accordionFaq">-->
    <!--                                                                <div class="accordion-body">-->
    <!--                                                                    <p>Lorem Ipsum is simply dummy text of the-->
    <!--                                                                        printing Lorem-->
    <!--                                                                        Ipsum-->
    <!--                                                                        is simply dummy text of the printing and-->
    <!--                                                                        typesetting industry</p>-->
    <!--                                                                </div>-->
    <!--                                                            </div>-->
    <!--                                                        </div>-->
    <!--                                                        <div class="home-faq">-->
    <!--                                                            <h2 class="accordion-header" id="headingFour">-->
    <!--                                                                <button class="accordion-button collapsed fw-bold"-->
    <!--                                                                    type="button" data-bs-toggle="collapse"-->
    <!--                                                                    data-bs-target="#collapseFour"-->
    <!--                                                                    aria-expanded="false"-->
    <!--                                                                    aria-controls="collapseFour">-->

    <!--                                                                    Lorem Ipsum is simply dummy text of the-->
    <!--                                                                    printing-->

    <!--                                                                </button>-->
    <!--                                                            </h2>-->
    <!--                                                            <div id="collapseFour"-->
    <!--                                                                class="accordion-collapse collapse fw-bold"-->
    <!--                                                                aria-labelledby="headingFour"-->
    <!--                                                                data-bs-parent="#accordionFaq">-->
    <!--                                                                <div class="accordion-body">-->
    <!--                                                                    <p>Lorem Ipsum is simply dummy text of the-->
    <!--                                                                        printing Lorem-->
    <!--                                                                        Ipsum-->
    <!--                                                                        is simply dummy text of the printing and-->
    <!--                                                                        typesetting industry</p>-->
    <!--                                                                </div>-->
    <!--                                                            </div>-->
    <!--                                                        </div>-->
    <!--                                                    </div>-->
    <!--                                                </div>-->
    <!--                                            </div>-->
    <!--                                        </div>-->


    <!--                                    </div>-->
    <!--                                </div>-->
                                    <!--End Product Tabs-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

                <!-- Image Column -->
                <!-- <div class="image-column col-lg-6 col-md-12">
                    <div class="inner-column wow fadeInLeft">-->
    <!--                    <figure class="image overlay-anim wow fadeInUp mt-5 pt-5"><img class="w-100"-->
    <!--                            src="assets/images/faq-home.png" alt="">-->
    <!--                    </figure>-->

    <!--                </div>-->
    <!--            </div> -->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!--Emd Do My Assignment Section -->





    <!-- Testimonial Section Two -->
    @include('sections.testimonials',['type'=>2,'tagline'=>'TAGLINE HEADING','heading'=>'Testimonials','testimonial'=>$testimonial])
    <!-- End Testimonial Section Two -->
    


@endsection