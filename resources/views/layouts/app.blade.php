<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    @yield('meta')
    {{-- <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link href="{{ asset('assets/plugins/revolution/css/layers.css') }}" rel="stylesheet" type="text/css">
    <!-- REVOLUTION LAYERS STYLES -->
    <link href="{{ asset('assets/plugins/revolution/css/navigation.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    @stack('css')
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <style>
        .error {
            color: red;
        }

        .form-control,
        .input-text {
            height: calc(1.5rem + 23px);
            padding: 8px 6px;
        }

        .credentials .modal-body {
            padding: 0;
        }

        .credentials .btn-close {
            position: absolute;
            right: 0;
            padding: 1em;
        }

        .credentials h1 {
            font-size: 2.3em;
            font-weight: bold;
        }

        .credentials .myform {
            padding: 2em;
            max-width: 100%;
            color: #fff;
            box-shadow: 0 4px 6px 0 rgba(22, 22, 26, 0.18);
        }

        @media (max-width: 576px) {
            .credentials .myform {
                max-width: 100%;
                margin: 0 auto;
            }
        }

        .credentials .form-control:focus {
            box-shadow: inset 0 -1px 0 #7e7e7e;
        }

        .credentials .form-control {
            background-color: inherit;
            color: #fff;
            border: 0;
            border-radius: 0;
            border-bottom: 1px solid #fff;
        }

        .credentials .myform .btn {
            width: 100%;
            font-weight: 800;
            background-color: #fff;
            border-radius: 0;
            padding: 0.5em 0;
        }

        .credentials .myform .btn:hover {
            background-color: inherit;
            color: #fff;
            border-color: #fff;
        }

        .credentials p {
            text-align: center;
            padding-top: 2em;
            color: grey;
        }

        .credentials p a {
            color: #e1e1e1;
            text-decoration: none;
        }

        .credentials p a:hover {
            color: #fff;
        }

        .modal-backdrop {
            --bs-backdrop-bg: #000000bf;
            background-color: #000000bf;
        }
    </style>

</head>

<body>

    <!-- Preloader -->
    <!-- <div class="preloader"></div> -->


    <!-- New Main Header -->
    <header class="main-header header-style-two cstm-main-header-sticky-effect">

        <!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container">
                    <ul class="contact-info-outer">
                        <li class="info-list-header">
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <i class="icon lnr-icon-phone-handset"></i>
                                <!-- <span class="title">Call Anytime</span> -->
                                <a href="tel:{{ widget(6)->extra_field_2 }}"
                                    class="text">{{ widget(6)->extra_field_2 }}</a>
                            </div>
                            <div class="contact-info-box">
                                <i class="icon lnr-icon-envelope"></i>
                                <!-- <span class="title">Send Email</span> -->
                                <a href="mailto:{{ widget(6)->extra_field_3 }}"
                                    class="text">{{ widget(6)->extra_field_3 }}</a>
                            </div>
                        </li>
                        <li>
                            <div class="top-bar-text">
                                <div class="text">First 20 students get 50% discount. Hurry up!</div>
                            </div>
                        </li>
                        <li>
                            <div class="topheader-button">
                                <a href="{{ route('solutions.library') }}" class="sol-lib-btn">Solution Library</a>
                                @if (!Auth()->guard('admin')->user() && !Auth()->user())
                                    <ul class="useful-links" style="display: inline-block;">
                                        <li>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#LoginForm" class="btn login-btn">Login/Register</a>
                                            <!--<a href="javascript:void(0)" data-bs-toggle="modal"-->
                                            <!--    data-bs-target="#LoginFreeLancerForm" class="btn login-btn">Login-->
                                            <!--    Freelancer</a>-->
                                        </li>
                                    </ul>
                                @elseif(Auth()->guard('admin')->user())
                                    @if (Auth()->guard('admin')->user()->roles()->first()->name == 'Free Lancer')
                                        <ul class="useful-links">
                                            <li>
                                                <a href="{{ route('free.lancer.dashboard') }}">Go to Dashboard </a>
                                            </li>
                                        </ul>
                                    @endif

                                @endif
                            </div>
                        </li>
                    </ul>

                    <!-- Mobile Nav toggler -->
                    <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                </div>
            </div>
        </div>
        <!-- Header Upper -->


        <!-- Header Lower -->
        <div id="oneStickyHeader" class="header-lower">
            <div class="auto-container">
                <!-- Main box -->
                <div class="main-box">
                    <!-- Logo -->
                    <div class="logo-box">
                        <div class="logo"><a href="{{ route('home') }}"><img
                                    src="{{asset('assets/images/logo.png')}}" alt="" title="Tronis"></a></div>
                    </div>
                    <!--Nav Box-->
                    <div class="nav-outer tab-dis-none">

                        <nav class="nav main-menu">
                            <ul class="navigation">
                                <!-- <li class="current"><a href="https://stage.webshark.in/coc">Home</a>
                                </li> -->
                                <li class="{{ Request::is('about-us') ? 'current-page-class' : '' }}"><a href="{{ route('about-us') }}">About
                                        Us</a>
                                </li>
                                <li class="dropdown d-flex {{ Request::is('assignment-help') ? 'current-page-class' : '' }}"><a id="assignmentDrop" class="assign-help"
                                        href="{{ route('assignment.help') }}">Assignment Help</a>
                                    <!--<a onclick="dropAssignment()"><i style="font-size: 13px;" class="fa fa-angle-down px-1 my-auto dropvtnassign"></i></a>-->
                                    <!--<ul id="dropElement" class="dropdown-assignment">-->
                                    <!--        <li><a href="https://stage.webshark.in/coc/assignment-help-accounting.html">Accounting</a></li>-->
                                    <!--        <li><a href="https://stage.webshark.in/coc/assignment-help-economics.html">Economics</a></li>-->
                                    <!--         <li><a href="https://stage.webshark.in/coc/assignment-help-maths.html">Math</a></li>-->
                                    <!--         <li><a href="https://stage.webshark.in/coc/assignment-help-statistics.html">Statistics</a></li>-->
                                    <!--         <li><a href="https://stage.webshark.in/coc/assignment-help-calculus.html">Calculus</a></li>-->
                                    <!--         <li><a href="https://stage.webshark.in/coc/assignment-help-english.html">English</a></li>-->
                                    <!--          <li><a href="https://stage.webshark.in/coc/assignment-help-finance.html">Finance</a></li>-->
                                    <!--          <li><a href="https://stage.webshark.in/coc/assignment-help-history.html">History</a></li>-->
                                    <!--         <li><a href="https://stage.webshark.in/coc/assignment-help-psychology.html">Psychology</a></li>-->
                                    <!--          <li><a href="https://stage.webshark.in/coc/assignment-help-management.html">Management</a></li>-->
                                    <!--          <li><a href="https://stage.webshark.in/coc/assignment-help-science.html">Science</a></li>-->
                                    <!--          <li><a href="https://stage.webshark.in/coc/assignment-help-political-science.html">Political Science</a></li>-->
                                    <!--          <li><a href="https://stage.webshark.in/coc/assignment-help-biology.html">Biology</a></li>-->
                                    <!--          <li><a href="https://stage.webshark.in/coc/assignment-help-marketing.html">Marketing</a></li>-->
                                    <!--    </ul>-->
                                </li>
                                <li class="{{ Request::is('take-my-online-class') ? 'current-page-class' : '' }}"><a href="{{ route('take.my.online.class') }}">Take My Online
                                        Class</a></li>
                                <!-- <li class=""><a href="https://stage.webshark.in/coc/solution-library.html">Solution Library</a></li> -->
                                <li class="dropdown d-flex {{ Request::is('services') ? 'current-page-class' : '' }}"><a href="{{ route('services') }}">Services</a>
                                    <!--    <a onclick="dropServices()"><i style="font-size: 13px;" class="fa fa-angle-down px-1 my-auto dropbtnservices"></i></a>-->
                                    <!--<ul id="dropElementServices" class="dropdown-services">-->
                                    <!--        <li><a href="https://stage.webshark.in/coc/discussion-board.html">Discussion Board</a></li>-->
                                    <!--        <li><a href="https://stage.webshark.in/coc/do-my-online-quiz.html">Do My Online Quiz</a></li>-->
                                    <!--         <li><a href="https://stage.webshark.in/coc/do-my-research-paper.html">Do My Research Paper</a></li>-->
                                    <!--          <li><a href="https://stage.webshark.in/coc/do-my-project.html">Do My Project</a></li>-->
                                    <!--           <li><a href="https://stage.webshark.in/coc/take-my-online-exam.html">Take My Online Exam</a></li>-->
                                    <!--    </ul>-->
                                </li>
                                <li class="{{ Request::is('pages/faq') ? 'current-page-class' : '' }}"><a href="{{ route('pages.faq') }}">FAQs</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- Main Menu End-->

                    </div>
                    <!-- Get a quote button -->
                    <div class="get-quote-sec">
                        <a href="{{ route('get-a-quote') }}"
                            class="home-button-header theme-btn btn-style-one bg-theme-color4 bg-dark">Get a Quote</a>
                    </div>
                    <!-- End Get a quote button -->
                    <a id="toggle-btn-phone-cstm" href="javascript:void(0);" style="font-size:36px;" class="icon"
                    onclick="myToggleFunction()">&#9776;</a>
                </div>
                <!-- End Main Box -->
            </div>
        </div>
        <!-- Header Lower -->

        <!--Mobile Menu-->

        <div class="mob-tab-offset-nav">
            <div class="mob-tab-offset-nav-inner">
                <div class="close-btn-nav-cstm"><button>Close</button></div>
                <a href="{{route('about-us')}}">About Us</a>
                <a href="{{route('solutions.library')}}">Solution Library</a>
                <a href="{{route('assignment.help')}}">Assignment Help</a>
                <a href="{{route('take.my.online.class')}}">Take My Online Class</a>
                <a href="{{route('services')}}">Services</a>
                <a href="{{route('pages.faq')}}">FAQs</a>
                <a href="{{route('get-a-quote')}}">Get A Quote</a>
            </div>
        </div>



        <!--Ends Mobile Menu-->


        <!-- New Mobile Menu -->
        <div class="topnav" id="myTopnav">
            <a href="{{ route('home') }}" class="active"><img src="{{ asset('assets/images/logo-2.png') }}"
                    alt=""></a>
            <a href="https://stage.webshark.in/coc/about-us.html">About Us</a>
            <div class="dropdown-phone">
                <button onclick="show()" class="dropbtn">Assignment Help
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="https://stage.webshark.in/coc/assignment-help-accounting.html">Accounting</a>
                    <a href="https://stage.webshark.in/coc/assignment-help-economics.html">Economics</a>
                    <a href="https://stage.webshark.in/coc/assignment-help-maths.html">Math</a>
                    <a href="https://stage.webshark.in/coc/assignment-help-statistics.html">Statistics</a>
                    <a href="https://stage.webshark.in/coc/assignment-help-calculus.html">Calculus</a>
                    <a href="https://stage.webshark.in/coc/assignment-help-english.html">English</a>
                    <a href="https://stage.webshark.in/coc/assignment-help-finance.html">Finance</a>
                    <a href="https://stage.webshark.in/coc/assignment-help-history.html">History</a>
                    <a href="https://stage.webshark.in/coc/assignment-help-psychology.html">Psychology</a>
                    <a href="https://stage.webshark.in/coc/assignment-help-management.html">Management</a>
                    <a href="https://stage.webshark.in/coc/assignment-help-science.html">Science</a>
                    <a href="https://stage.webshark.in/coc/assignment-help-political-science.html">Political
                        Science</a>
                    <a href="https://stage.webshark.in/coc/assignment-help-biology.html">Biology</a>
                    <a href="https://stage.webshark.in/coc/assignment-help-marketing.html">Marketing</a>
                </div>
            </div>
            <a href="https://stage.webshark.in/coc/take-my-online-class.html">Take My Online Class</a>
            <!-- <a href="https://stage.webshark.in/coc/solution-library.html">Solution Library</a> -->
            <div class="dropdown-phone">
                <button onclick="show1()" class="dropbtn">Services
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="https://stage.webshark.in/coc/discussion-board.html">Discussion Board</a>
                    <a href="https://stage.webshark.in/coc/do-my-online-quiz.html">Do My Online Quiz</a>
                    <a href="https://stage.webshark.in/coc/do-my-research-paper.html">Do My Research Paper</a>
                    <a href="https://stage.webshark.in/coc/do-my-project.html">Do My Project</a>
                    <a href="https://stage.webshark.in/coc/take-my-online-exam.html">Take My Online Exam</a>
                </div>
            </div>
            <a id="toggle-btn-phone" href="javascript:void(0);" style="font-size:36px;" class="icon"
                onclick="myToggleFunction()">&#9776;</a>
        </div>
        <!-- End New Mobile Menu -->

        <!-- Sticky Header  -->
        <div class="sticky-header d-none">
            <div class="container-fluid sticky-header-inner-box">
                <div class="inner-container">
                    <!--Logo-->
                    <div class="logo">
                        <a href="{{ route('home') }}" title=""><img
                                src="{{ asset('assets/images/logo.png') }}" alt="" title=""></a>
                    </div>

                    <!--Right Col-->
                    <div class="nav-outer">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-collapse show collapse clearfix">
                                <ul class="navigation clearfix">
                                    <!--Keep This Empty / Menu will come through Javascript-->
                                </ul>
                            </div>
                        </nav><!-- Main Menu End-->

                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                    </div>
                    <!-- Get a quote button -->
                    <div class="get-quote-sec">
                        <a href="https://stage.webshark.in/coc/get-a-quote.html"
                            class="home-button-header theme-btn btn-style-one bg-theme-color4 bg-dark">Get a Quote</a>
                    </div>
                    <!-- End Get a quote button -->
                </div>
            </div>
        </div><!-- End Sticky Menu -->
    </header>
    <!-- End New Main header -->


    @yield('content')


    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="bg-image zoom-two"></div>

        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="auto-container">
                <div class="row">
                    <!--Footer Column-->
                    <div class="footer-column col-xl-4 col-lg-12 col-md-6 col-sm-12 footer-cstm-tab-one">
                        <div class="footer-widget about-widget">
                            <div class="logo"><a href="{{ route('home') }}"><img
                                        src="{{ asset('images/' . widget(7)->extra_image_1) }}" alt=""></a>
                            </div>
                            <div class="text">{!! widget(7)->description !!}</div>

                            <ul class="social-icon-two">
                                <li><a target="_blank" href="{{ widget(7)->extra_field_5 }}"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li><a target="_blank" href="{{ widget(7)->extra_field_6 }}"><i
                                            class="fab fa-facebook-square"></i></a></li>
                                <li><a target="_blank" href="{{ widget(7)->extra_field_7 }}"><i
                                            class="fab fa-pinterest-p"></i></a></li>
                                <li><a target="_blank" href="{{ widget(7)->extra_field_8 }}"><i
                                            class="fab fa-instagram"></i></a></li>
                            </ul>

                            <div class="btn-box">
                                <a href="" class="theme-btn btn-style-one footer-btn"><span
                                        class="btn-title">Contact With Us</span></a>
                                <span class="float-icon icon-arrow"></span>
                            </div>
                        </div>
                    </div>

                    <!--Footer Column-->
                    <div class="footer-column col-xl-2 col-lg-4 col-md-6 col-sm-12 footer-cstm-tab-two">
                        <div class="footer-widget">
                            <h4 class="widget-title">Services</h4>
                            <ul class="user-links">
                                <li><a href="#">Discussion Board</a></li>
                                <li><a href="#">Do My Online Quiz</a></li>
                                <li><a href="#">Do My Research Paper</a></li>
                                <li><a href="#">Do My Project</a></li>
                                <li><a href="#">Take My Online Exam</a></li>
                            </ul>
                        </div>
                    </div>

                    <!--Footer Column-->
                    <div class="footer-column col-xl-2 col-lg-4 col-md-6 col-sm-12 footer-cstm-tab-three">
                        <div class="footer-widget">
                            <h4 class="widget-title">Quick Links</h4>
                            <ul class="user-links">
                                <li><a href="{{ route('about-us') }}">About</a></li>
                                <li><a href="{{ route('pages.faq') }}">FAQ</a></li>
                                <li><a href="{{ route('blogs') }}">Blog</a></li>
                                <li><a href="{{ route('get-a-quote') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <!--Footer Column-->
                    <div class="footer-column col-xl-4 col-lg-4 col-md-6 col-sm-12 footer-cstm-tab-four">
                        <div class="footer-widget contact-widget">
                            <h4 class="widget-title">Get Contact</h4>
                            <div class="widget-content">
                                <ul class="contact-info">
                                    <li>
                                        <p>Phone:</p> <a
                                            href="tel:{{ widget(7)->extra_field_2 }}">{{ widget(7)->extra_field_2 }}</a>
                                    </li>
                                    <li>
                                        <p>Email:</p> <a
                                            href="mailto:{{ widget(7)->extra_field_3 }}">{{ widget(7)->extra_field_3 }}</a>
                                    </li>
                                </ul>
                                <div class="subscribe-form">

                                    <h4 class="widget-title">Newsletter</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing .
                                    </p>
                                    <form method="post" action="#">
                                        <div class="form-group">
                                            <input type="email" name="email" class="email" value=""
                                                placeholder="Email Address" required="">
                                            <button type="button" class="theme-btn btn-style-one"><i
                                                    class="fa fa-long-arrow-alt-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer Bottom-->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="copyright-text">&copy; Copyright 2023 by <a href="">CoachOnCouch</a>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="bottom-link" href="{{ route('pages.termsconditions') }}">Terms of Use |</a>
                        <a class="bottom-link" href="{{ route('pages.policy') }}">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <div class="modal fade credentials" id="LoginForm" tabindex="-1" aria-labelledby="LoginFormLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="myform bg-dark">
                        <h1 class="text-center">Login as Customer</h1>
                        <form method="POST" action="{{ route('login') }}" id="LoginFormData">
                            @csrf
                            <div class="mb-3 mt-4">
                                <label for="email" class="form-label">Email address</label>
                                <input id="email" type="email" class="form-control" name="email" required
                                    autocomplete="off" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="off">

                            </div>
                            <button type="submit" id="submitButton"
                                data-loading-text="<i class='fa fa-spinner fa-spin '></i> Signing..."
                                data-rest-text="Sign In" class="btn btn-light mt-3">Sign In</button>
                            <p>Not a member? <a href="#" data-hideForm="LoginForm" data-showForm="SignUpForm"
                                    class="popupOpen">Signup now</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade credentials" id="SignUpForm" tabindex="-1" aria-labelledby="SignUpFormLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="myform bg-dark">
                        <h1 class="text-center">Signup as Customer</h1>
                        <form method="POST" action="{{ route('register') }}" id="registerForm">
                            @csrf
                            <div class="mb-3 mt-4">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" autocomplete="name" autofocus>
                            </div>

                            <div class="mb-3 mt-4">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>

                                <input id="email" type="email" class="form-control" name="email"
                                    autocomplete="off">

                            </div>

                            <div class="mb-3 mt-4">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control" name="password"
                                    autocomplete="off">
                            </div>

                            <div class="mb-3 mt-4">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="off">
                            </div>

                            <button type="submit" class="btn btn-light mt-3">SignUp</button>
                            <p>Not a member? <a href="#" data-hideForm="SignUpForm" data-showForm="LoginForm"
                                    class="popupOpen">Login now</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="BuyQuestionModal" tabindex="-1" aria-labelledby="BuyQuestionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('cart.addToCart') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        <p style="font-size: 1rem; line-height: 1.5;" class="mb-3 black fw-bold">The order has been
                            purchased multiple times hence originality is not assured.</p>
                        <p style="font-size: 0.9rem; line-height: 1.5;">If you wish to receive and original solution
                            that is plagarism adn AI free click on order and original solution, Or else click Continue
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button style="background-color: black;" type="submit"
                            formaction="{{ route('cart.addToCart') }}" class="btn text-white">Continue</button>
                        <button style="background-color: #ff7707;" type="submit"
                            formaction="{{ route('checkout.question') }}" class="btn btn-primary">Order an original
                            Solution</button>
                    </div>
                </div>
                <input type="hidden" name="question_id" id="question_id" />
                <input type="hidden" name="question" id="question" />
                <input type="hidden" name="subject_category_id" id="subject_category_id" />
                <input type="hidden" name="subject_id" id="subject_id" />
                <input type="hidden" name="price" id="price" />
            </form>
        </div>
    </div>





















    <div class="modal fade credentials" id="LoginFreeLancerForm" tabindex="-1"
        aria-labelledby="LoginFreeLancerFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="myform bg-dark">
                        <h1 class="text-center">Login as Freelancer</h1>
                        <form method="POST" action="{{ route('freelancer.post.login') }}"
                            id="LoginFreeLancerFormData">
                            @csrf
                            <div class="mb-3 mt-4">
                                <label for="email" class="form-label">Email address</label>
                                <input id="email" type="email" class="form-control" name="email"
                                    autocomplete="off" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password"
                                    autocomplete="off">

                            </div>
                            <button type="submit" id="submitButton"
                                data-loading-text="<i class='fa fa-spinner fa-spin '></i> Signing..."
                                data-rest-text="Sign In" class="btn btn-light mt-3">Sign In</button>
                            <p>Not a member? <a href="#" data-hideForm="LoginFreeLancerForm"
                                    data-showForm="SignUpFreeLancerForm" class="popupOpen">Signup now</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade credentials" id="SignUpFreeLancerForm" tabindex="-1"
        aria-labelledby="SignUpFreeLancerFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="myform bg-dark">
                        <h1 class="text-center">Signup as Freelancer</h1>
                        <form method="POST" action="{{ route('freelancer.post.signup') }}"
                            id="registerFreeLancerForm">
                            @csrf
                            <div class="mb-3 mt-4">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" autocomplete="name" autofocus>
                            </div>
                            <span class="text-danger" style="color:red">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>

                            <div class="mb-3 mt-4">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('email') }}" autocomplete="off">
                            </div>

                            <span class="text-danger" style="color:red">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>

                            <div class="mb-3 mt-4">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control"
                                    value="{{ old('email') }}"name="password" autocomplete="off">
                            </div>

                            <span class="text-danger" style="color:red">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>

                            <div class="mb-3 mt-4">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="off">
                            </div>

                            <span class="text-danger" style="color:red">
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </span>

                            <button type="submit" class="btn btn-light mt-3">SignUp</button>
                            <p>Not a member? <a href="#" data-hideForm="SignUpFreeLancerForm"
                                    data-showForm="LoginFreeLancerForm" class="popupOpen">Login now</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- jQuery Validate plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="{{ asset('assets/index.js') }}"></script>
    <script src="https://kit.fontawesome.com/0172345ae2.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/appear.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @stack('js')
</body>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        // Get the filter button and the close button
        var mobNavBtnMob = document.querySelector('#toggle-btn-phone-cstm');
        var mobNavBtnMobClose = document.querySelector('.close-btn-nav-cstm button');
        var mobNavSolutionContainer = document.querySelector('.mob-tab-offset-nav');

        // Function to open the filter container
        mobNavBtnMob.addEventListener('click', function() {
            mobNavSolutionContainer.style.right = '0%';
        });

        // Function to close the filter container
        function closeNav() {
            mobNavSolutionContainer.style.right = '-100%';
        }

        mobNavBtnMobClose.addEventListener('click', closeNav);

        // Function to close the container when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobNavSolutionContainer.contains(event.target) && !mobNavBtnMob.contains(event.target)) {
                closeNav();
            }
        });
    });
</script>


<!-- <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        // Get the filter button and the close button
        var mobNavBtnMob = document.querySelector('#toggle-btn-phone-cstm');
        var mobNavBtnMobClose = document.querySelector('.close-btn-nav-cstm button');
        var mobNavSolutionContainer = document.querySelector('.mob-tab-offset-nav');

        // Function to open the filter container
        mobNavBtnMob.addEventListener('click', function() {
            mobNavSolutionContainer.style.right = '0%';
        });

        // Function to close the filter container
        mobNavBtnMobClose.addEventListener('click', function() {
            mobNavSolutionContainer.style.right = '-100%';
        });
    });

</script> -->

<script>
    $('#registerForm').validate({
        rules: {
            name: {
                required: true,
                minlength: 2 // Example rule for minimum length
            },
            email: {
                required: true,
                email: true // Validates email format
            },
            password: {
                required: true,
                minlength: 6 // Example rule for minimum password length
            },
            password_confirmation: {
                required: true,
                equalTo: "#registerForm #password" // Ensures password confirmation matches password field
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Name must be at least 2 characters long"
            },
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please enter a password",
                minlength: "Password must be at least 6 characters long"
            },
            password_confirmation: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match"
            }
        },
        submitHandler: function(form) {
            // Form is valid, you can submit the form here
            submitAjax(form)
        }
    });

    $('#LoginFormData').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please enter your password"
            }
        },
        submitHandler: function(form) {
            // Form is valid, you can submit the form here
            submitAjax(form)
        }
    });

    $('#LoginFreeLancerFormData').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please enter your password"
            }
        },
        submitHandler: function(form) {
            // Form is valid, you can submit the form here
            submitAjax(form)
        }
    });

    $('#registerFreeLancerForm').validate({
        rules: {
            name: {
                required: true,
                minlength: 2 // Example rule for minimum length
            },
            email: {
                required: true,
                email: true // Validates email format
            },
            password: {
                required: true,
                minlength: 6 // Example rule for minimum password length
            },
            password_confirmation: {
                required: true,
                equalTo: "#registerFreeLancerForm #password" // Ensures password confirmation matches password field
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Name must be at least 2 characters long"
            },
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please enter a password",
                minlength: "Password must be at least 6 characters long"
            },
            password_confirmation: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match"
            }
        },
        submitHandler: function(form) {
            // Form is valid, you can submit the form here
            submitAjax(form)
        }
    });


    $(document).on('click', '.BuyQuestionModal', function() {

        var question_id = $(this).attr('data-question_id');
        var question = $(this).attr('data-question');
        var subject_category_id = $(this).attr('data-subject_category_id');
        var subject_id = $(this).attr('data-subject_id');
        var price = $(this).attr('data-price');

        $("#BuyQuestionModal").modal("show");

        $("#BuyQuestionModal #question_id").val(question_id);
        $("#BuyQuestionModal #question").val(question);
        $("#BuyQuestionModal #subject_category_id").val(subject_category_id);
        $("#BuyQuestionModal #subject_id").val(subject_id);
        $("#BuyQuestionModal #price").val(price);

    });


    $(document).on('click', '.popupOpen', function() {
        $('.modal').modal('hide');
        let hideForm = $(this).attr('data-hideForm');
        let showForm = $(this).attr('data-showForm');
        $('#' + showForm).modal('show');
        $('#' + hideForm).modal('hide');
    });

    @if (session()->has('error'))
        $('#LoginFreeLancerForm').modal('show');
    @endif

    $(document).on('click', 'input', function() {
        console.log("invalida", $('.invalid-feedback').length);
        if ($('.invalid-feedback').length > 0) {
            //$(this).closest('div').removeClass('invalid-feedback');
            $('.invalid-feedback').remove();
            $(this).removeClass('valid is-invalid state-invalid');
        }
    })

    function submitAjax(formObj) {

        var $this = $('#' + formObj.id + " #submitButton");
        buttonLoading('loading', $this);
        $(".invalid-feedback").remove();
        $.ajax({
            url: $(formObj).attr('action'),
            type: "POST",
            processData: false, // Important!
            contentType: false,
            cache: false,
            data: new FormData($(formObj)[0]),
            success: function(data) {
                if (data.status) {

                    $('#' + formObj.id).prepend(`<div class="alert alert-success">${data.message}</div>`);

                    setTimeout(function() {
                        $(formObj).modal('hide');
                        location.reload();
                    }, 1300);

                    if (data.route) {
                        location.href = data.route;
                    }

                } else {


                    $.each(data.errors, function(fieldName, field) {
                        $.each(field, function(index, msg) {
                            $("#" + formObj.id + " #" + fieldName).addClass(
                                'is-invalid state-invalid');
                            errorDiv = $("#" + formObj.id + " #" + fieldName).parent(
                                'div');
                            errorDiv.append('<div class="invalid-feedback">' + msg +
                                '</div>');
                        });
                    });

                }
                buttonLoading('reset', $this);

            }
        });

    }

    // $('#LoginFormData').submit(function() {
    //     var $this = $('#LoginFormData #submitButton');
    //     buttonLoading('loading', $this);
    //     $('.is-invalid').removeClass('is-invalid state-invalid');
    //     $('.invalid-feedback').remove();
    //     $.ajax({
    //         url: $('#LoginFormData').attr('action'),
    //         type: "POST",
    //         processData: false, // Important!
    //         contentType: false,
    //         cache: false,
    //         data: new FormData($('#LoginFormData')[0]),
    //         success: function(data) {
    //             if (data.status) {

    //                 $("#LoginFormData").prepend(
    //                     `<div class="alert alert-success">${data.message}</div>`)

    //                 setTimeout(function() {
    //                     $('#LoginForm').modal('hide');
    //                     location.reload();
    //                 }, 1300);

    //             } else {
    //                 $.each(data.errors, function(fieldName, field) {
    //                     $.each(field, function(index, msg) {
    //                         $('#LoginFormData #' + fieldName).addClass(
    //                             'is-invalid state-invalid');
    //                         errorDiv = $('#LoginFormData #' + fieldName).parent(
    //                             'div');
    //                         errorDiv.append('<div class="invalid-feedback">' + msg +
    //                             '</div>');
    //                     });
    //                 });

    //             }
    //             buttonLoading('reset', $this);

    //         }
    //     });
    //     return false;
    // });


    // $('#registerForm').submit(function() {
    //     var $this = $('#registerForm #submitButton');
    //     buttonLoading('loading', $this);
    //     $('.is-invalid').removeClass('is-invalid state-invalid');
    //     $('.invalid-feedback').remove();

    //     $.ajax({
    //         url: $('#registerForm').attr('action'),
    //         type: "POST",
    //         processData: false, // Important!
    //         contentType: false,
    //         cache: false,
    //         data: new FormData($('#registerForm')[0]),
    //         success: function(data) {
    //             if (data.status) {

    //                 $("#registerForm").prepend(
    //                     `<div class="alert alert-success">${data.message}</div>`)

    //                 setTimeout(function() {
    //                     $('#LoginForm').modal('hide');
    //                     location.reload();
    //                 }, 1300);

    //             } else {
    //                 $.each(data.errors, function(fieldName, field) {
    //                     $.each(field, function(index, msg) {
    //                         $('#registerForm #' + fieldName).addClass(
    //                             'is-invalid state-invalid');
    //                         errorDiv = $('#registerForm #' + fieldName).parent(
    //                             'div');
    //                         errorDiv.append('<div class="invalid-feedback">' + msg +
    //                             '</div>');
    //                     });
    //                 });

    //             }
    //             buttonLoading('reset', $this);

    //         }
    //     });

    //     return false;
    // });

    function buttonLoading(processType, ele) {
        if (processType == 'loading') {
            ele.html(ele.attr('data-loading-text'));
            ele.attr('disabled', true);
        } else {
            ele.html(ele.attr('data-rest-text'));
            ele.attr('disabled', false);
        }
    }

    function successMsg(heading, message, html = "") {
        box = $('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>' +
            heading + '</strong><hr class="message-inner-separator"><p>' + message + '</p>' + html + '</div>');
        $('.alert-messages-box').append(box);
    }

    function errorMsg(heading, message) {
        box = $('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>' +
            heading + '</strong><hr class="message-inner-separator"><p>' + message + '</p></div>');
        $('.alert-messages-box').append(box);
    }
</script>

</html>
