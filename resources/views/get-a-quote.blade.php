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
            <form class="rounded-3 shadow-sm text-start get-a-quote-form" method="post" action="{{ route('submit.quote') }}" id="contact-form" enctype="multipart/form-data">
                @csrf
                <span style="border-bottom: 3px solid #FF7707 !important;" class="border-bottom py-2 border-dark text-black fs-6 fw-bold">GET A QUOTE</span>
                <p style="margin-top: 10px;" class="fs-1 black py-4 fw-bold form-head">Fill the below details to get a quote from us</p>

                <div class="row">
                    <div class="form-group col-12">
                        <label for="name">Name<span style="color: red;">*</span></label>
                        <input type="text" name="full_name" id="full_name" placeholder="Enter Your Name" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="subject">Which Subject<span style="color: red;">*</span></label>
                        <input type="text" name="subject" id="subject" placeholder="Which Subject Do You Need Help With?" required>
                    </div>
                    <div id="emailSection" class="row" style="display: none;">
                        <div class="form-group col-6">
                            <label for="email">Email<span style="color: red;">*</span></label>
                            <input type="email" name="email" id="email" placeholder="Enter Your Email" required>
                            <small id="emailError" style="color: red; display: none;">Emails do not match or invalid email format</small>
                        </div>
                        <div class="form-group col-6">
                            <label for="confirmEmail">Confirm Email<span style="color: red;">*</span></label>
                            <input type="email" name="confirm_email" id="confirmEmail" placeholder="Confirm Email" required>
                        </div>
                        <p>This e-mail ID will be used for all future communications and to give you accurate pricing for your project from the experts.</p>
                    </div>
                    <div id="helpSection" style="display: none;">
                        <div class="form-group col-12">
                            <label for="helpRequire">Help You Require<span style="color: red;">*</span></label>
                            <select style="color: grey;" name="help_require" id="helpRequire">
                                <option value="">What Type of Help You Need?</option>
                                <option value="domyhomework">Do My Homework</option>
                                <option value="takemyonlineclass">Take My Online Class</option>
                                <option value="takemyonlinetest">Take My Online Test</option>
                                <option value="writemypaper">Write My Paper/ Thesis / Dissertation / Essay</option>
                                <option value="takemymathlab">Take My MyMathLab Quiz</option>
                                <option value="domydiscussionboards">Do My Discussion Boards</option>
                            </select>
                        </div>
                        <!-- Additional Fields Here -->
                        <div id="additionalOptions" style="display: none;">
                            <div id="selectClassDuration" class="form-group col-12" style="display: none;">
                                <label for="classDuration">Select Duration of Class<span style="color: red;">*</span></label>
                                <select style="color: grey;" name="class_duration" id="classDuration">
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
                                <div class="form-group col-12">
                                    <label class="mt-2" for="testDetails">Please give test details</label>
                                    <textarea name="test_details" id="testDetails" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group col-12 mb-3">
                                    <label for="syllabusFile">Attach Syllabus</label>
                                    <input style="height: inherit; border: 1px solid grey;" class="form-control" type="file" id="syllabusFile" name="syllabus_file">
                                </div>
                            </div>
                            <div id="fileAndInstruction" class="form-group col-12" style="display: none;">
                                <div class="mb-3">
                                    <label for="assignmentDetailsFile">For accurate pricing please upload assignment details</label>
                                    <input style="height: inherit; border: 1px solid grey;" class="form-control" type="file" id="assignmentDetailsFile" name="assignment_details_file">
                                </div>
                                <label class="mt-2" for="assignmentInstructions">Please share assignment instructions</label>
                                <textarea name="assignment_instructions" id="assignmentInstructions" cols="30" rows="10"></textarea>
                            </div>
                            <div id="academicLevel" class="form-group col-12" style="display: none;">
                                <label for="academicLevelSelect">Academic Level of Paper<span style="color: red;">*</span></label>
                                <select style="color: grey;" name="academic_level" id="academicLevelSelect">
                                    <option value="">Please Select Academic Level of Paper</option>
                                    <option value="highschool">Highschool</option>
                                    <option value="undergraduate">Undergraduate</option>
                                    <option value="phd">PhD</option>
                                </select>
                            </div>
                            <div id="mmlDetailsSection" class="form-group col-12" style="display: none;">
                                <label for="mmlDetails">Please Share MML Details</label>
                                <textarea name="mml_details" id="mmlDetails" cols="30" rows="10"></textarea>
                                <label for="mlmProblemsNumber">Number of MLM Problems</label>
                                <input type="number" name="mlm_problems_number" id="mlmProblemsNumber" placeholder="How Many MLM Problems" min="10" max="20">
                                <p style="font-size: 14px;" class="text-black m-0 p-0">Please enter a number from 10 to 20.</p>
                            </div>
                            <div id="discussionBoardSection" class="form-group col-12" style="display: none;">
                                <div class="mb-3">
                                    <label for="discussionBoardFile">Attach a file</label>
                                    <input style="height: inherit; border: 1px solid grey;" class="form-control" type="file" id="discussionBoardFile" name="discussion_board_file">
                                </div>
                                <label for="discussionBoardQuestion">Please share Forum/Discussion Board Question</label>
                                <textarea name="discussion_board_question" id="discussionBoardQuestion" cols="30" rows="10"></textarea>
                            </div>
                            <div id="callbackSection" class="form-group col-12">
                                <label for="callback">Get Call Back<span style="color: red;">*</span></label>
                                <select style="color: grey;" name="callback" id="callback">
                                    <option value="">Want Call Back</option>
                                    <option value="yes">Yes, Please Call Me Back</option>
                                    <option value="no">No, I Don't Want A Call Back</option>
                                </select>
                                <div id="phoneCall" style="display: none;">
                                    <label for="phoneNumber">Phone No</label>
                                    <input type="text" placeholder="Enter Your contact Number" name="phone_number" id="phoneNumber">
                                </div>
                            </div>
                            <div id="discountCodeSection" class="form-group col-12">
                                <label for="discountCode">Discount Code</label>
                                <input type="text" placeholder="Enter Your Discount Code" name="discount_code" id="discountCode">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const subjectInput = document.getElementById('subject');
        const emailSection = document.getElementById('emailSection');
        const emailInput = document.getElementById('email');
        const confirmEmailInput = document.getElementById('confirmEmail');
        const emailError = document.getElementById('emailError');
        const helpSection = document.getElementById('helpSection');
        const helpRequire = document.getElementById('helpRequire');
        const additionalOptions = document.getElementById('additionalOptions');
        const classDuration = document.getElementById('selectClassDuration');
        const onlineTestBox = document.getElementById('takemyonlinetestbox');
        const fileAndInstruction = document.getElementById('fileAndInstruction');
        const academicLevel = document.getElementById('academicLevel');
        const mmlDetailsSection = document.getElementById('mmlDetailsSection');
        const discussionBoardSection = document.getElementById('discussionBoardSection');
        const callbackSection = document.getElementById('callbackSection');
        const phoneCall = document.getElementById('phoneCall');
        const discountCodeSection = document.getElementById('discountCodeSection');

        // Show email section when subject is filled
        subjectInput.addEventListener('input', function() {
            if (subjectInput.value.trim() !== '') {
                emailSection.style.display = 'block';
            } else {
                emailSection.style.display = 'none';
                helpSection.style.display = 'none';
            }
        });

        // Show help section when email and confirm email are valid
        confirmEmailInput.addEventListener('input', function() {
            if (emailInput.value === confirmEmailInput.value && validateEmail(emailInput.value)) {
                emailError.style.display = 'none';
                helpSection.style.display = 'block';
            } else {
                emailError.style.display = 'block';
                helpSection.style.display = 'none';
            }
        });

        // Show additional options based on selected help requirement
        helpRequire.addEventListener('change', function() {
            const selectedOption = helpRequire.value;
            additionalOptions.style.display = 'block';
            classDuration.style.display = 'none';
            onlineTestBox.style.display = 'none';
            fileAndInstruction.style.display = 'none';
            academicLevel.style.display = 'none';
            mmlDetailsSection.style.display = 'none';
            discussionBoardSection.style.display = 'none';
            callbackSection.style.display = 'block';
            discountCodeSection.style.display = 'block';

            switch (selectedOption) {
                case 'takemyonlineclass':
                    classDuration.style.display = 'block';
                    break;
                case 'takemyonlinetest':
                    onlineTestBox.style.display = 'block';
                    break;
                case 'domyhomework':
                    fileAndInstruction.style.display = 'block';
                    break;
                case 'writemypaper':
                    fileAndInstruction.style.display = 'block';
                    academicLevel.style.display = 'block';
                    break;
                case 'takemymathlab':
                    mmlDetailsSection.style.display = 'block';
                    break;
                case 'domydiscussionboards':
                    discussionBoardSection.style.display = 'block';
                    break;
                default:
                    additionalOptions.style.display = 'none';
                    break;
            }
        });

        // Show phone number input if callback is selected
        document.getElementById('callback').addEventListener('change', function() {
            if (this.value === 'yes') {
                phoneCall.style.display = 'block';
            } else {
                phoneCall.style.display = 'none';
            }
        });

        function validateEmail(email) {
            const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return re.test(email);
        }
    });
</script>




@endsection