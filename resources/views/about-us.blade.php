@extends('layouts.app')


@section('title')
Coach | About us    
@endsection



@section('meta')
<meta name="title" content="{{ $aboutUs->aboutusmetatitle ?? 'N/A' }}">
<meta name="description" content="{{ $aboutUs->aboutusmetadesc ?? 'N/A' }}">
<meta name="keywords" content="{{ $aboutUs->aboutusmetakeyword ?? 'N/A' }}">
@endsection

@section('content')
    <!-- Banner Section  -->

    <!-- Start main-content -->
    <section class="page-title acc-banner">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-7">
                    <div class="title-outer acc-title">
                        <h1 class="title">About Us</h1>
                        <p class="text-white ntext">{{ $aboutUs->aboutusbannerdesc ?? 'N/A' }}</p>
                        
                    </div>
                </div>
                <div class="col-md-5">
                    <!-- Sign Form -->
                    <div class="signup-form-two wow fadeInLeft">

                        <!--Contact Form-->
                        <form class="" method="post" action="" id="contact-form">
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

    <!-- Know your partners better!  -->

    <section class="bg-light pt-5">
        <div class="sec-title text-center">
            <span class="sub-title">{{ $aboutUs->aboutsectwotagline ?? 'N/A' }}</span>
            <h2 class="fs-1 pb-4">{{ $aboutUs->aboutsectwoheading ?? 'N/A' }}</h2>
        </div>

        <div style="padding: 0 4.5rem;" class="row">
            <div class="col-6">
                <h5 style="color: #ff7707;" class="fw-bold fs-2">{{ $aboutUs->aboutsectwoinnerheadingone ?? 'N/A' }}</h5>
                <p style="font-size: large;" class="black pt-4">{{ $aboutUs->aboutsectwoinnertextone ?? 'N/A' }}</p>
            </div>
            <div class="col-6">
                <h5 style="color: #ff7707;" class="fw-bold fs-2">{{ $aboutUs->aboutsectwoinnerheadingtwo ?? 'N/A' }}</h5>
                <p style="font-size: large;" class="black pt-4">{{ $aboutUs->aboutsectwoinnertexttwo ?? 'N/A' }}</p>
            </div>
        </div>
    </section>

    <!-- Services Section -->

    <div class="bg-light row pt-4 position-relative px-md-5">
        <div class="sec-title text-center">
            <span class="sub-title">{{ $aboutUs->aboutsecthreetagline ?? 'N/A' }}</span>
            <h2 class="home-service">Our Services</h2>
        </div>
        <img class="home-service-img1" src="./assets/images/trial26.png" alt="">
        <img class="home-service-img2" src="./assets/images/trial11_new.png" alt="">

        <div class="row bg-light home-service-section position-relative">
            <img class="home-service-img3" src="./assets/images/trial10_new.png" alt="">
            
            <div class="col-4 bg-light">
                <div class="p-4 bg-white"><a href="#">
                    <div class="p-3 text-center home-service-border">
                        <!-- <img class="w-100" src="assets/images/trial4.png" alt=""> -->
                        @if(!empty($aboutUs->aboutsecthreeimageone))
                            <img src="{{ asset($aboutUs->aboutsecthreeimageone) }}" alt="Image One">
                        @else
                            <p>No image uploaded</p>
                        @endif
                        <p class="fs-4 black mt-4 mb-0 fw-bold">{{ $aboutUs->aboutsecthreeheadone ?? 'N/A' }}</p>
                        <p style="display:none;">{{ $aboutUs->aboutsecthreedescone ?? 'N/A' }}</p>
                    </div>
                </a>
                </div>
            </div>
            <div class="col-4 bg-light">
                <div class="p-4 bg-white"><a href="#">
                    <div class="p-3 text-center home-service-border">
                        <!-- <img class="w-100" src="assets/images/trial5.png" alt=""> -->
                        @if(!empty($aboutUs->aboutsecthreeimagetwo))
                            <img src="{{ asset($aboutUs->aboutsecthreeimagetwo) }}" alt="Image Two">
                        @else
                            <p>No image uploaded</p>
                        @endif
                        <p class="fs-4 black mt-4 mb-0 fw-bold">{{ $aboutUs->aboutsecthreeheadtwo ?? 'N/A' }}</p>
                        <p style="display:none;">{{ $aboutUs->aboutsecthreedesctwo ?? 'N/A' }}</p>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-4 bg-light">
                <div class="p-4 bg-white"><a href="#">
                    <div class="p-3 text-center home-service-border">
                        <!-- <img class="w-100" src="assets/images/trial6.png" alt=""> -->
                        @if(!empty($aboutUs->aboutsecthreeimagethree))
                            <img src="{{ asset($aboutUs->aboutsecthreeimagethree) }}" alt="Image Three">
                        @else
                            <p>No image uploaded</p>
                        @endif
                        <p class="fs-4 black mt-4 mb-0 fw-bold">{{ $aboutUs->aboutsecthreeheadthree ?? 'N/A' }}</p>
                        <p style="display:none;">{{ $aboutUs->aboutsecthreedescthree ?? 'N/A' }}</p>
                    </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="btn-box z-ind text-center mt-5">
            
            <a class="home-button theme-btn btn-style-one bg-theme-color4 bg-dark" href="{{route('services')}}"><span>SEE MORE</span></a>
        </div>
    </div>

        <!-- Take My Online Class  -->

        <section class="bg-light py-5">
            <div class="sec-title text-center">
                <span class="sub-title">{{ $aboutUs->aboutsecfourtagline ?? 'N/A' }}</span>
                <h2 class="fs-1 pb-4">{{ $aboutUs->aboutsecfourheading ?? 'N/A' }}</h2>
            </div>
    
            <div style="padding: 0 4.5rem;" class="row">
                <div class="col-6">
                    <h5 style="color: #ff7707;" class="fw-bold fs-2">{{ $aboutUs->aboutsecfourinnerheadone ?? 'N/A' }}</h5>
                    <p style="font-size: large;" class="black pt-4">{{ $aboutUs->aboutsecfourinnerdescone ?? 'N/A' }}</p>
                </div>
                <div class="col-6">
                    <h5 style="color: #ff7707;" class="fw-bold fs-2">{{ $aboutUs->aboutsecfourinnerheadtwo ?? 'N/A' }}</h5>
                    <p style="font-size: large;" class="black pt-4">{{ $aboutUs->aboutsecfourinnerdesctwo ?? 'N/A' }}</p>
                </div>
            </div>
        </section>
    
    


    <!-- Frequently Asked Question  -->

    <!-- Do My Assignment Section Three -->
    <section class="about-section position-relative p-0" style="background-color: #f8f9fa;">
        <img class="home-faq-img1" src="./assets/images/trial25.png" alt="">
        <img class="home-faq-img2" src="./assets/images/trial24.png" alt="">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-6 col-md-12 order-2 wow fadeInRight" data-wow-delay="600ms">
                    <div class="inner-column">

                        <div class="sec-title">
                            <div class="section-paddding">
                                <div class="auto-container-inner">
                                    <div class="row">
                                        <div class="sec-title">
                                            <span class="sub-title text-end">{{ $aboutUs->aboutsecfaqtagline ?? 'N/A' }}</span>
                                            <h2 class="home-faq-head">Frequently asked questions?</h2>
                                        </div>
                                    </div>
                                    <!--Product Tabs-->
                                    <div class="tabs-listing mt-2">
                                        <div class="tab-container">
                                            <h3 class="tabs-ac-style d-md-none active" rel="general">GENERAL</h3>
                                            <div id="general" class="tab-content">
                                                <div class="product-description">
                                                    <div class="row">
                                                        <div class="accordion" id="accordionFaq">
                                                            <div class="home-faq">
                                                                <h2 class="accordion-header" id="headingOne">
                                                                    <button class="accordion-button fw-bold collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseOne"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseOne">
                                                                        {{ $aboutUs->aboutsecfaqheadone ?? 'N/A' }}
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseOne"
                                                                    class="accordion-collapse collapse fw-bold"
                                                                    aria-labelledby="headingOne"
                                                                    data-bs-parent="#accordionFaq">
                                                                    <div class="accordion-body">
                                                                        <p>{{ $aboutUs->aboutsecfaqdescone ?? 'N/A' }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="home-faq">
                                                                <h2 class="accordion-header" id="headingTwo">
                                                                    <button class="accordion-button collapsed fw-bold"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseTwo"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseTwo">
                                                                        {{ $aboutUs->aboutsecfaqheadtwo ?? 'N/A' }}
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseTwo"
                                                                    class="accordion-collapse collapse fw-bold"
                                                                    aria-labelledby="headingTwo"
                                                                    data-bs-parent="#accordionFaq">
                                                                    <div class="accordion-body">
                                                                        <p>{{ $aboutUs->aboutsecfaqdesctwo ?? 'N/A' }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="home-faq">
                                                                <h2 class="accordion-header" id="headingThree">
                                                                    <button class="accordion-button collapsed fw-bold"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseThree"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseThree">

                                                                        {{ $aboutUs->aboutsecfaqheadthree ?? 'N/A' }}
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseThree"
                                                                    class="accordion-collapse collapse fw-bold"
                                                                    aria-labelledby="headingThree"
                                                                    data-bs-parent="#accordionFaq">
                                                                    <div class="accordion-body">
                                                                        <p>{{ $aboutUs->aboutsecfaqdescthree ?? 'N/A' }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="home-faq">
                                                                <h2 class="accordion-header" id="headingFour">
                                                                    <button class="accordion-button collapsed fw-bold"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseFour"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseFour">

                                                                        {{ $aboutUs->aboutsecfaqheadfour ?? 'N/A' }}

                                                                    </button>
                                                                </h2>
                                                                <div id="collapseFour"
                                                                    class="accordion-collapse collapse fw-bold"
                                                                    aria-labelledby="headingFour"
                                                                    data-bs-parent="#accordionFaq">
                                                                    <div class="accordion-body">
                                                                        <p>{{ $aboutUs->aboutsecfaqdescfour ?? 'N/A' }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <!--End Product Tabs-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12">
                    <div class="inner-column wow fadeInLeft">
                        <figure class="image overlay-anim wow fadeInUp mt-5 pt-5"><img class="w-100"
                                src="{{asset('assets/images/faq-home.png')}}" alt="">
                        </figure>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Emd Do My Assignment Section -->


    <!-- Testimonial Section Two -->
    <section class="testimonial-section-two style-two">
        <div class="circle-one paroller" data-paroller-factor="-0.20" data-paroller-factor-lg="0.20"
            data-paroller-type="foreground" data-paroller-direction="horizontal"></div>
        <div class="circle-two paroller" data-paroller-factor="0.20" data-paroller-factor-lg="-0.20"
            data-paroller-type="foreground" data-paroller-direction="horizontal"></div>
        <div class="auto-container">
            <div class="inner-container">
                <div class="pattern-layer acc-sec6-bg"></div>
                <!-- Sec Title -->
                <div class="sec-title text-center">
                    <span class="sub-title">TAGLINE HEADING</span>
                    <h2>Testimonials</h2>
                </div>
                <div class="testimonial-carousel-two owl-carousel owl-theme">

                    <!-- Testimonial Block Two -->
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="border-layer"></div>
                            <div class="text">From exhibitions and dinners, to celebrations and conferences, the
                                University of Bath is a great place to hold any event.</div>
                            <div class="author-info">
                                <div class="info-inner">
                                    <div class="author-image">
                                        <img src="assets/images/author-1.jpg" alt="" />
                                    </div>
                                    <h6>Mahfuz Riad</h6>
                                    <div class="designation">Online Teacher</div>
                                </div>
                            </div>
                            <div class="quote-icon fa fa-quote-right"></div>
                        </div>
                    </div>

                    <!-- Testimonial Block Two -->
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="border-layer"></div>
                            <div class="text">From exhibitions and dinners, to celebrations and conferences, the
                                University of Bath is a great place to hold any event.</div>
                            <div class="author-info">
                                <div class="info-inner">
                                    <div class="author-image">
                                        <img src="assets/images/author-2.jpg" alt="" />
                                    </div>
                                    <h6>Shopnil mahadi</h6>
                                    <div class="designation">Online Teacher</div>
                                </div>
                            </div>
                            <div class="quote-icon fa fa-quote-right"></div>
                        </div>
                    </div>

                    <!-- Testimonial Block Two -->
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="border-layer"></div>
                            <div class="text">From exhibitions and dinners, to celebrations and conferences, the
                                University of Bath is a great place to hold any event.</div>
                            <div class="author-info">
                                <div class="info-inner">
                                    <div class="author-image">
                                        <img src="{{asset('assets/images/author-1.jpg')}}" alt="" />
                                    </div>
                                    <h6>Alamin Sa</h6>
                                    <div class="designation">Online Teacher</div>
                                </div>
                            </div>
                            <div class="quote-icon fa fa-quote-right"></div>
                        </div>
                    </div>

                    <!-- Testimonial Block Two -->
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="border-layer"></div>
                            <div class="text">From exhibitions and dinners, to celebrations and conferences, the
                                University of Bath is a great place to hold any event.</div>
                            <div class="author-info">
                                <div class="info-inner">
                                    <div class="author-image">
                                        <img src="assets/images/author-2.jpg" alt="" />
                                    </div>
                                    <h6>Mahfuz Riad</h6>
                                    <div class="designation">Online Teacher</div>
                                </div>
                            </div>
                            <div class="quote-icon fa fa-quote-right"></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Section Two -->



    @endsection