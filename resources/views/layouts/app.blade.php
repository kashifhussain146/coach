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
    <!-- Main Header-->
    <header class="main-header header-style-two">

        <!-- Header Top -->
        <div class="header-top">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="top-left">
                        <div class="text">First 20 students get 50% discount. Hurry up!</div>
                    </div>

                    <div class="top-right">

                        @if (!Auth()->guard('admin')->user() && !Auth()->user())
                            <ul class="useful-links">
                                <li>
                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#LoginForm">Login
                                        Custmer &nbsp;&nbsp;</a>/ &nbsp;&nbsp;
                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#LoginFreeLancerForm">Login Freelancer</a>
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

                        <ul class="social-icon-one light">
                            <li><a target="_blank" href="{{ widget(6)->extra_field_5 }}"><span
                                        class="fab fa-twitter"></span></a></li>
                            <li><a target="_blank" href="{{ widget(6)->extra_field_6 }}"><span
                                        class="fab fa-facebook-square"></span></a></li>
                            <li><a target="_blank" href="{{ widget(6)->extra_field_7 }}"><span
                                        class="fab fa-pinterest-p"></span></a></li>
                            <li><a target="_blank" href="{{ widget(6)->extra_field_8 }}"><span
                                        class="fab fa-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Top -->

        <!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="logo-box">
                        <div class="logo"><a href="{{ route('home') }}"><img
                                    src="{{ asset('images/' . widget(6)->extra_image_1) }}" alt=""
                                    title="Tronis"></a></div>
                    </div>

                    <ul class="contact-info-outer">
                        <li>
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <i class="icon lnr-icon-phone-handset"></i>
                                <span class="title">Call Anytime</span>
                                <a href="tel:{{ widget(6)->extra_field_2 }}"
                                    class="text">{{ widget(6)->extra_field_2 }}</a>
                            </div>
                        </li>
                        <li>
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <i class="icon lnr-icon-envelope"></i>
                                <span class="title">Send Email</span>
                                <a href="mailto:{{ widget(6)->extra_field_3 }}"
                                    class="text">{{ widget(6)->extra_field_3 }}</a>
                            </div>
                        </li>
                        <li>
                            <!-- Contact Info Box -->
                            <div class="contact-info-box">
                                <i class="icon lnr-icon-map"></i>
                                <span class="title">Location</span>
                                <div class="text"> {{ widget(6)->extra_field_4 }}</div>
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
        <div class="header-lower">
            <div class="auto-container">
                <!-- Main box -->
                <div class="main-box">
                    <!--Nav Box-->
                    <div class="nav-outer">

                        <nav class="nav main-menu">
                            <ul class="navigation">
                                <li class="current"><a href="">Home</a>
                                </li>
                                <li class=""><a href="{{ route('about-us') }}">About Us</a>
                                </li>
                                <li class="dropdown"><a href="{{ route('assignment.help') }}">Assignment Help</a>
                                    <ul>
                                        <li><a href="">Accounting</a></li>
                                        <li><a href="">Economics</a></li>
                                        <li><a href="">Math</a></li>
                                        <li><a href="">Statistics</a></li>
                                        <li><a href="">Calculus</a></li>
                                        <li><a href="">English</a></li>
                                        <li><a href="">Finance</a></li>
                                        <li><a href="">History</a></li>
                                        <li><a href="">Psychology</a></li>
                                        <li><a href="">Management</a></li>
                                        <li><a href="">Science</a></li>
                                        <li><a href="">Political Science</a></li>
                                        <li><a href="">Biology</a></li>
                                        <li><a href="">Marketing</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="{{ route('take.my.online.class') }}">Take My Online
                                        Class</a></li>

                                <li class=""><a href="{{ route('blogs') }}">Blogs</a></li>

                                <li class=""><a href="{{ route('solutions.library') }}">Solution Library</a>
                                </li>
                                <li class="dropdown"><a href="#">Services</a>
                                    <ul>
                                        <li><a href="">Discussion Board</a></li>
                                        <li><a href="">Do My Online Quiz</a></li>
                                        <li><a href="">Do My Research Paper</a></li>
                                        <li><a href="">Do My Project</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="{{ route('get-a-quote') }}">Get a Quote</a></li>


                                <!-- <ul>
                                    <li><a href="page-courses.html">Courses List</a></li>-->
                                <!--    <li><a href="page-course-details.html">Course Details</a></li>-->
                                <!--</ul> -->


                            </ul>
                        </nav>
                        <!-- Main Menu End-->

                    </div>
                </div>
                <!-- End Main Box -->
            </div>
        </div>
        <!-- Header Lower -->


        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>

            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            <nav class="menu-box">
                <div class="upper-box">
                    <div class="nav-logo"><a href="{{ route('home') }}"><img
                                src="{{ asset('assets/images/logo-2.png') }}" alt="" title=""></a>
                    </div>
                    <div class="close-btn"><i class="icon fa fa-times"></i></div>
                </div>

                <ul class="navigation clearfix">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </ul>
                <ul class="contact-list-one">
                    <li>
                        <!-- Contact Info Box -->
                        <div class="contact-info-box">
                            <i class="icon lnr-icon-phone-handset"></i>
                            <span class="title">Call Now</span>
                            <a href="tel:+92880098670">+92 (8800) - 98670</a>
                        </div>
                    </li>
                    <li>
                        <!-- Contact Info Box -->
                        <div class="contact-info-box">
                            <span class="icon lnr-icon-envelope1"></span>
                            <span class="title">Send Email</span>
                            <a href="mailto:help@company.com">help@company.com</a>
                        </div>
                    </li>
                    <li>
                        <!-- Contact Info Box -->
                        <div class="contact-info-box">
                            <span class="icon lnr-icon-clock"></span>
                            <span class="title">Send Email</span>
                            Mon - Sat 8:00 - 6:30, Sunday - CLOSED
                        </div>
                    </li>
                </ul>


                <ul class="social-links">
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </nav>
        </div><!-- End Mobile Menu -->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container">
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
                </div>
            </div>
        </div><!-- End Sticky Menu -->

    </header>
    <!--End Main Header -->


    @yield('content')


    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="bg-image zoom-two"></div>

        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="auto-container">
                <div class="row">
                    <!--Footer Column-->
                    <div class="footer-column col-xl-4 col-lg-12 col-md-6 col-sm-12">
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
                    <div class="footer-column col-xl-2 col-lg-4 col-md-6 col-sm-12">
                        <div class="footer-widget">
                            <h4 class="widget-title">Subjects</h4>
                            <ul class="user-links">
                                <li><a href="#">Gallery</a></li>
                                <li><a href="#">News & Articles</a></li>
                                <li><a href="{{ route('pages.faq') }}">FAQ's</a></li>
                                <li><a href="#">Sign In/Registration</a></li>
                                <li><a href="#">Coming Soon</a></li>
                                <li><a href="#">Contacts</a></li>
                            </ul>
                        </div>
                    </div>

                    <!--Footer Column-->
                    <div class="footer-column col-xl-2 col-lg-4 col-md-6 col-sm-12">
                        <div class="footer-widget">
                            <h4 class="widget-title">Quick Links</h4>
                            <ul class="user-links">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Courses</a></li>
                                <li><a href="#">Instructor</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Instructor Profile</a></li>
                            </ul>
                        </div>
                    </div>

                    <!--Footer Column-->
                    <div class="footer-column col-xl-4 col-lg-4 col-md-6 col-sm-12">
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
