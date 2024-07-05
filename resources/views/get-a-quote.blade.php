@extends('layouts.app')

@section('title')
Coach | Get a Quote
@stop

@section('meta')
<meta name="title" content="{{ $contactUs->contactmetatitle }}">
<meta name="description" content="{{ $contactUs->contactmetadesc }}">
<meta name="keywords" content="{{ $contactUs->contactmetakeyword }}">
@endsection

@section('content')


    <!-- Start main-content -->
    <section class="page-title contact-us-cstm-sec-one" style="background-image: url(assets/images/contact-bnnr.png);">
        <div class="auto-container text-center d-flex">

            <div class="title-outer title-for-banner-get-quote-page text-start " style="position: relative;">
                <h1 class="title">{{ $contactUs->contactmainhead }}</h1>
                <p class="text-white ntext w-50 text-start">{{ $contactUs->contactmaindesc }}</p>
                <button class="home-button theme-btn btn-style-one bg-theme-color4 bg-dark">CONTACT US</button>
            </div>
        </div>
    </section>
    <!-- end main-content -->
    <!-- Query Form  -->
    <div class="signup-form-two wow fadeInLeft mx-auto signup-form-get-quote">
        <!--Contact Form-->
            <form class="rounded-3 shadow-sm text-start get-a-quote-form" method="post" action="" id="contact-form">
                <span style="border-bottom: 3px solid #FF7707 !important;" class="border-bottom py-2 border-dark text-black fs-6 fw-bold">GET A QUOTE</span>
                <p style="margin-top: 10px;" class="fs-1 black py-4 fw-bold form-head">Fill the below details to get a quote from us</p>

                <div class="row">
                    <div class="form-group col-12">
                        <label for="name">Name<span style="color: red;">*</span></label>
                        <input type="text" name="full_name" placeholder="Enter Your Name" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="subject">Which Subject<span style="color: red;">*</span></label>
                        <input type="text" name="Number" id="subject" placeholder="Which Subject Do You Need Help With?" required>
                    </div>
                    <div id="emailSection" class="row" style="display: none;">
                        <div class="form-group col-6">
                            <label for="">Email<span style="color: red;">*</span></label>
                            <input type="text" name="Email" id="emailInput" placeholder="Enter Your Email" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="email">Confirm Email<span style="color: red;">*</span></label>
                            <input type="text" name="cEmail" placeholder="Confirm Email" required>
                        </div>
                        <p>This e-mail ID will be used for all future communications and to give you accurate pricing for your project from the experts.</p>
                    </div>
                    <div id="helpSection" style="display: none;">
                        <div class="form-group col-12">
                            <label for="help-req">Help You Require<span style="color: red;">*</span></label>
                            <select style="color: grey;" name="helpRequire" id="helpRequire">
                                <option value="">What Type of Help You Need?</option>
                                <option value="domyhomework">Do My Homework</option>
                                <option value="takemyonlineclass">Take My Online Class</option>
                                <option value="takemyonlinetest">Take My Online Test</option>
                                <option value="writemypaper">Write My Paper/ Thesis / Dissertation / Essay</option>
                                <option value="takemymathlab">Take My MyMathLab Quiz</option>
                                <option value="domydiscussionboards">Do My Discussion Boards</option>
                            </select>
                            <!-- additionalOptions -->
                            <div id="additionalOptions" style="display: none;">
                                <div class="form-group col-12">
                                    <div class="selectDuration" id="selectClassDuration" style="display: none;">
                                        <label for="help-req">Select Duration of Class<span style="color: red;">*</span></label>
                                        <select style="color: grey;" name="callback" id="clssDuration">
                                            <option value="">Select Duration of Class</option>
                                            <option value="8week">8 Weeks or Less</option>
                                            <option value="9week">9 Weeks</option>
                                            <option value="10week">10 Weeks</option>
                                            <option value="11week">11 Weeks</option>
                                            <option value="12week">12 Weeks</option>
                                            <option value="13week">13 Weeks</option>
                                            <option value="14week">14 Weeks</option>
                                            <option value="15week">15 Weeks</option>
                                            <option value="16week">16 Weeks</option>
                                            <option value="17week">17 Weeks or More</option>
                                        </select>
                                    </div>
                                    <div id="takemyonlinetestbox" style="display: none;">
                                        <div id="testdetails">
                                            <label class="mt-2" for="instruction">Please give test details</label>
                                            <textarea name="testdiscription" id="testdiscription" cols="30" rows="10" ></textarea>
                                        </div>
                                        <div id="attachSyllabus" class="mb-3">
                                            <label for="formFileMultiple" class="form-label">Attach Syllabus</label>
                                            <input style="height: inherit; border: 1px solid grey;" class="border form-control" type="file" id="formFileMultiple" multiple>
                                          </div>
                                    </div>
                                    <div id="fileandinstruction" style="display: block;">
                                        <!-- <label for="assFile">Select File</label> -->
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">For accurate pricing please upload assignment details</label>
                                            <input style="height: inherit; border: 1px solid grey;" class="form-control" type="file" id="formFileMultiple" multiple>
                                          </div>
                                        <label class="mt-2" for="instruction">Please share assignment instructions</label>
                                        <textarea name="" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <div id="levelofPaper">
                                        <label for="levelofPaper">Academic Level of Paper<span style="color: red;">*</span></label>
                                        <select style="color: grey;" name="academicLevel" id="academicLevel">
                                            <option value="">Please Select Academic Level of Paper</option>
                                            <option value="highschool">Highschool</option>
                                            <option value="undergraduate">Undergraduate</option>
                                            <option value="phd">PhD</option>
                                        </select>
                                    </div>
                                    <div id="shareMMLDetails">
                                        <label for="mmlDetails">Please Share MML Details</label>
                                        <textarea name="" id="" cols="30" rows="10"></textarea>
                                        <!-- <input type="number" name="contact-num" id="contact-num" placeholder="Number"> -->
                                    </div>
                                    <div id="fordiscussionboard">
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">Attach a file</label>
                                            <input style="height: inherit; border: 1px solid grey;" class="form-control" type="file" id="formFileMultiple" multiple>
                                          </div>
                                        <label for="discussionBoardQuestion">Please share Forum/Discussion Board Question</label>
                                        <textarea name="" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div id="mlmproblum-number" style="display: none;">
                                    <div>
                                    <label for="phonenumber">Number</label>
                                    <input type="number" name="phonenumcall" id="phonenumcall" placeholder="How Many MLM Problems">
                                    <p style="font-size: 14px;" class="text-black m-0 p-0">Please enter a number from 10 to 20.</p>
                                </div>
                                    
                                </div>
                                <div id="getcallback" class="form-group col-12">
                                    <label for="attachfilefordiscussion">Get Call Back<span style="color: red;">*</span></label>
                                    <select style="color: grey;" name="callback" id="callback">
                                        <option value="">Want Call Back</option>
                                        <option value="wantacall">Yes, Please Call Me Back</option>
                                        <option value="dontwantacall">No, I Don't Want A Call Back</option>
                                    </select>
                                    <div id="phonecall" style="display: none;">
                                        <label for="discountCode">Phone No</label>
                                        <input type="text" placeholder="Enter Your contact Number" name="discount_code" id="discount_code">
                                    </div>
                                    <div id="discountcode">
                                        <label for="discountCode">Discount Code</label>
                                        <input type="text" placeholder="Enter Your Discount Code" name="discount_code" id="discount_code">
                                    </div>
                                </div>
                                <!-- <div class="form-group col-12">
                                    <select style="color: grey;" name="discountcode" id="discountcode">
                                        <option value="Service Required">Service Required</option>
                                    </select>
                                </div> -->
                                <!-- <div class="form-group">
                                    <textarea class="" placeholder="Message"></textarea>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group py-4">
                    <button class="home-button theme-btn btn-style-one bg-theme-color4 bg-dark">Submit<span class="mx-1"> <i
                        class="fa-solid fa-arrow-right"></i></span></button>
                </div>
            </form>
        <!-- End Contact Form -->
    </div>

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
                                        <img src="{{asset('assets/images/author-1.jpg')}}" alt="" />
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
                                        <img src="{{asset('assets/images/author-2.jpg')}}" alt="" />
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
                                        <img src="{{asset('assets/images/author-2.jpg')}}" alt="" />
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

   




    <!-- Have an online Class  -->
    <div style="background-color: #ff7707;" class="py-4 text-center position-relative contact-us-sec-last">
        <img  style="position: absolute; left: -3rem; top: 9rem; width: 8rem;" src="./assets/images/quoteig.png" alt="">
        <img style="position: absolute; right: -2rem; top: 0rem;" src="./assets/images/trailquot2.png" alt="">
        <p class="text-white fs-1 fw-bold pt-5">{{ $contactUs->contactlasthead }}</p>
        <p class="text-white w-75 mx-auto">{{ $contactUs->contactlastdesc }}</p>
        <i class="fa-solid fa-xl fa-envelope text-white inline-block"></i>
        <p style="margin-bottom: 0 !important; display: inline-block;" class="text-white fw-bold inline-block ps-2">EMAIL US : </p>
        <p style="display: inline-block;" class="text-white fw-bold inline-block">{{ $contactUs->contactlastmail }}</p>
    </div>



@endsection