
@extends('layouts.app')

@section('title')
    Home | Faq
@endsection

@push('css')
<style>
    .fa{
        display: block!important;
    }
    .section-paddding{
        padding: 50px 0!important;
    }
    .faq-main-section-sec-two-cstm{
        padding-top: 0px !important;
    }
    .tab-content h3.acc-heading{
        margin-bottom: 0px !important;
    }
</style>
@endpush

@section('content')

<section class="page-title faq-main-section-sec-one-cstm" style="background-image: url({{asset('images/'.$banner->widget_data->extra_image_1)}});">
    <div class="auto-container">
        <div class="row">
            <div class="col-md-7">
                <div class="title-outer">
                    <h1 class="title">{{$banner->widget_data->extra_field_1}}</h1>
                    <p class="text-white ntext">{{$banner->widget_data->extra_field_2}}</p>
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

<div class="section-paddding faq-main-section-sec-two-cstm">
    <div class="auto-container">
        <div class="row">
            <div class="sec-title text-center">
                <span class="sub-title">TAGLINE</span>
                <h2>Frequently Asked Questions</h2>
            </div>
        </div>
        <!--Product Tabs-->
        <div class="tabs-listing mt-2">
            <ul class="help-tabs list-unstyled d-flex-wrap border-bottom d-none d-md-flex">
                
                @foreach ($categopry as $key=>$item)
                <li rel="{{$item->title}}" class="{{($key==0)?'active':''}}">
                    <a class="tablink">
                        <i class="fa {{$item->extra_field_1  }} faq-icon"></i>
                        <span class="help-tab-heading">{{$item->title}}</span>
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="tab-container">
                <h3 class="tabs-ac-style d-md-none active" rel="general">GENERAL</h3>
                @foreach ($categopry as $key=>$item)
                <div id="{{$item->title}}" class="tab-content">
                    <div class="product-description">
                        <div class="row">
                            <div class="accordion" id="accordionFaq">
                                <h3 class="acc-heading">{{$item->title}}</h3>
                                @foreach($faqData->filter(function ($faq) use ($item) { return $faq->category==$item->id; }) as $k=>$v)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseOne{{$k}}"
                                                aria-expanded="false" aria-controls="collapseOne{{$k}}">
                                                {!! $v->title !!}
                                            </button>
                                        </h2>
                                        <div id="collapseOne{{$k}}" class="accordion-collapse collapse"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionFaq">
                                            <div class="accordion-body">
                                                <p>{!! $v->description !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- <div id="print" class="tab-content">
                    <div class="product-description">
                        <div class="row">
                            <div class="accordion" id="accordionFaq">
                                <h3 class="acc-heading">ASSIGNMENTS</h3>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                            aria-expanded="false" aria-controls="collapseOne">
                                            1. Lorem Ipsum is simply dummy text of the printing and typesetting industry
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionFaq">
                                        <div class="accordion-body">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            2. Lorem Ipsum is simply dummy text of the printing and typesetting industry
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionFaq">
                                        <div class="accordion-body">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum is simply dummy text of the printing and typesetting industry </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            3. Lorem Ipsum is simply dummy text of the printing and typesetting industry
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionFaq">
                                        <div class="accordion-body">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                            aria-expanded="false" aria-controls="collapseFour">
                                            4. Lorem Ipsum is simply dummy text of the printing and typesetting industry
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionFaq">
                                        <div class="accordion-body">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="gifts" class="tab-content">
                    <div class="product-description">
                        <div class="row">
                            <div class="accordion" id="accordionFaq">
                                <h3 class="acc-heading">DEADLINES</h3>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                            aria-expanded="false" aria-controls="collapseOne">

                                            1. Lorem Ipsum is simply dummy text of the printing and typesetting industry


                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionFaq">
                                        <div class="accordion-body">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">

                                            2. Lorem Ipsum is simply dummy text of the printing and typesetting industry


                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionFaq">
                                        <div class="accordion-body">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="payment" class="tab-content">
                    <div class="product-description">
                        <div class="row">
                            <div class="accordion" id="accordionFaq">
                                <h3 class="acc-heading">PAYMENT</h3>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                            aria-expanded="false" aria-controls="collapseOne">

                                            1. Lorem Ipsum is simply dummy text of the printing and typesetting industry
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionFaq">
                                        <div class="accordion-body">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <!--End Product Tabs-->
    </div>
</div>

@endsection