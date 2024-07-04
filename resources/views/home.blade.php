@extends('layouts.app')

@section('title')
    Home | COC
@endsection

@push('css')
<!-- REVOLUTION SETTINGS STYLES -->
<link href="{{asset('assets/plugins/revolution/css/settings.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/plugins/revolution/css/layers.css')}}" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
<link href="{{asset('assets/plugins/revolution/css/navigation.css')}}" rel="stylesheet" type="text/css">
<!-- REVOLUTION NAVIGATION STYLES -->
@endpush

@section('content')

  <!-- Banner Section  -->

    <!-- Start main-content -->

    <section class="page-title banner-bg">
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                @foreach ($banner as $k=>$item)
                <button type="button" data-bs-target="#demo" data-bs-slide-to="{{$k}}" class="{{($k==0)?'active':''}} home-form-carousel-button"></button>
                @endforeach
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">

                @foreach ($banner as $k=>$item)
                    <div class="carousel-item {{($k==0)?'active':''}}">
                        <div class="rev_slider_wrapper fullwidthbanner-container tp-mouseover" id="rev_slider_one_wrapper" data-source="gallery" style="overflow: visible; height: 820px;">
                            <div class="rev_slider fullwidthabanner revslider-initialised tp-simpleresponsive rev_redraw_on_blurfocus" id="rev_slider_one" data-version="5.4.1" style="margin-top: 0px; margin-bottom: 0px; height: 820px;" data-slideactive="rs-1">
                                <ul class="tp-revslider-mainul" style="visibility: visible; display: block; overflow: hidden; width: 1519px; height: 100%; max-height: none; left: 0px;">

                                    <!-- Slide 1 -->
                                    <li data-index="rs-1" data-transition="zoomout"
                                        class="tp-revslider-slidesli active-revslide"
                                        style="perspective: 6000px; width: 100%; height: 100%; overflow: hidden; z-index: 20; visibility: inherit; opacity: 1; background-color: rgba(255, 255, 255, 0);">
                                        <!-- MAIN IMAGE -->
                                        <div class="slotholder"
                                            style="position: absolute; top: 0px; left: 0px; z-index: 0; width: 100%; height: 100%; visibility: inherit; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                                            <!--Runtime Modification - Img tag is Still Available for SEO Goals in Source - <img src="images/main-slider/1.jpg" alt="" class="rev-slidebg defaultimg">-->
                                            <div class="tp-dottedoverlay on"></div>
                                            <div class="tp-bgimg defaultimg banner-bg" data-bgcolor="undefined">
                                            </div>
                                        </div>

                                        <div class="tp-parallax-wrap tp-parallax-container"
                                            style="position: absolute; display: block; visibility: visible; left: 869px; top: 83px; z-index: 1; transform: translate3d(0px, 0px, 0px);">
                                            <div class="tp-loop-wrap" style="position:absolute;display:block;;">
                                                <div class="tp-mask-wrap"
                                                    style="position: absolute; display: block; overflow: hidden; transform: matrix(1, 0, 0, 1, 0, 0);">
                                                    <div class="tp-caption tp-resizeme rs-parallaxlevel-1 big-ipad-hidden"
                                                        data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]"
                                                        data-responsive_offset="on" data-type="shape" data-height="none"
                                                        data-whitespace="nowrap" data-width="none"
                                                        data-hoffset="['-260','-50','0','150']"
                                                        data-voffset="['-20','120','120','120']"
                                                        data-x="['right','right','right','right']"
                                                        data-y="['middle','middle','middle','middle']"
                                                        data-frames="[{&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;speed&quot;:1500,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:2000,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:3000,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;mask&quot;:&quot;x:0;y:0;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                                                        id="layer-74376833"
                                                        style="visibility: inherit; transition: none 0s ease 0s; text-align: inherit; line-height: 0px; border-width: 0px; margin: 0px; padding: 0px; letter-spacing: 0px; font-weight: 400; font-size: 18px; white-space: nowrap; min-height: 0px; min-width: 0px; max-height: none; max-width: none; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform-origin: 50% 50% 0px;">

                                                        <figure
                                                            style="transition: none 0s ease 0s; text-align: inherit; line-height: 0px; border-width: 0px; margin: 0px; padding: 0px; letter-spacing: 0px; font-weight: 400; font-size: 18px;">
                                                            <img src="{{ asset('assets/images/trial2.png') }}"
                                                                alt=""
                                                                style="width: 751px; height: 614px; transition: none 0s ease 0s; text-align: inherit; line-height: 0px; border-width: 0px; margin: 0px; padding: 0px; letter-spacing: 0px; font-weight: 400; font-size: 18px;">
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tp-parallax-wrap tp-parallax-container"
                                            style="position: absolute; display: block; visibility: visible; left: -140px; top: 551px; z-index: 1; transform: translate3d(0px, 0px, 0px);">
                                            <div class="tp-loop-wrap" style="position:absolute;display:block;;">
                                                <div class="tp-mask-wrap"
                                                    style="position: absolute; display: block; overflow: hidden; transform: matrix(1, 0, 0, 1, 0, 0);">
                                                    <div class="tp-caption tp-resizeme rs-parallaxlevel-2 big-ipad-hidden"
                                                        data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]"
                                                        data-responsive_offset="on" data-type="shape" data-height="none"
                                                        data-whitespace="nowrap" data-width="none"
                                                        data-hoffset="['-300','-120','-120','-120']"
                                                        data-voffset="['200','100','100','100']"
                                                        data-x="['left','left','left','left']"
                                                        data-y="['middle','middle','middle','middle']"
                                                        data-frames="[{&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;speed&quot;:1500,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:1500,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:3000,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;mask&quot;:&quot;x:0;y:0;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                                                        id="layer-392984567"
                                                        style="visibility: inherit; transition: none 0s ease 0s; text-align: inherit; line-height: 0px; border-width: 0px; margin: 0px; padding: 0px; letter-spacing: 0px; font-weight: 400; font-size: 18px; white-space: nowrap; min-height: 0px; min-width: 0px; max-height: none; max-width: none; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform-origin: 50% 50% 0px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tp-parallax-wrap tp-parallax-container"
                                            style="position: absolute; display: block; visibility: visible; left: 644px; top: 210px; z-index: 1; transform: translate3d(0px, 0px, 0px);">
                                            <div class="tp-loop-wrap" style="position:absolute;display:block;;">
                                                <div class="tp-mask-wrap"
                                                    style="position: absolute; display: block; overflow: hidden; transform: matrix(1, 0, 0, 1, 0, 0);">
                                                    <div class="tp-caption tp-resizeme rs-parallaxlevel-1 big-ipad-hidden"
                                                        data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]"
                                                        data-responsive_offset="on" data-type="shape" data-height="none"
                                                        data-whitespace="nowrap" data-width="none"
                                                        data-hoffset="['-40','120','120','120']"
                                                        data-voffset="['-160','100','100','100']"
                                                        data-x="['center','center','center','center']"
                                                        data-y="['middle','middle','middle','middle']"
                                                        data-frames="[{&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;speed&quot;:1500,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:2000,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:3000,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;mask&quot;:&quot;x:0;y:0;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                                                        id="layer-255729462"
                                                        style="visibility: inherit; transition: none 0s ease 0s; text-align: inherit; line-height: 0px; border-width: 0px; margin: 0px; padding: 0px; letter-spacing: 0px; font-weight: 400; font-size: 18px; white-space: nowrap; min-height: 0px; min-width: 0px; max-height: none; max-width: none; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform-origin: 50% 50% 0px;">
                                                        s
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tp-parallax-wrap"
                                            style="position: absolute; display: block; visibility: visible; left: 891px; top: 123px; z-index: 1;">
                                            <div class="tp-loop-wrap" style="position:absolute;display:block;;">
                                                <div class="tp-mask-wrap"
                                                    style="position: absolute; display: block; overflow: hidden; transform: matrix(1, 0, 0, 1, 0, 0);">
                                                    <div class="tp-caption tp-resizeme" data-paddingbottom="[0,0,0,0]"
                                                        data-paddingleft="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                        data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                                        data-type="shape" data-height="none" data-whitespace="nowrap"
                                                        data-width="none" data-hoffset="['-160','-70','-250','-450']"
                                                        data-voffset="['70','40','60','60']"
                                                        data-x="['right','right','right','right']"
                                                        data-y="['bottom','bottom','bottom','bottom']"
                                                        data-frames="[{&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;speed&quot;:1500,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:1000,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:3000,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;mask&quot;:&quot;x:0;y:0;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                                                        id="layer-863373395"
                                                        style="visibility: inherit; transition: none 0s ease 0s; text-align: inherit; line-height: 0px; border-width: 0px; margin: 0px; padding: 0px; letter-spacing: 0px; font-weight: 400; font-size: 18px; white-space: nowrap; min-height: 0px; min-width: 0px; max-height: none; max-width: none; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform-origin: 50% 50% 0px;">
                                                        <figure class="main-image"
                                                            style="transition: none 0s ease 0s; text-align: inherit; line-height: 0px; border-width: 0px; margin: 0px; padding: 30px; letter-spacing: 0px; font-weight: 400; font-size: 18px;">
                                                            <img src="{{ asset('images/'.$item->image) }}"
                                                                alt=""
                                                                style="width: 569px; height: 567px; transition: none 0s ease 0s; text-align: inherit; line-height: 0px; border-width: 9px; margin: 0px; padding: 0px; letter-spacing: 0px; font-weight: 400; font-size: 18px;">
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tp-parallax-wrap tp-parallax-container"
                                            style="position: absolute; display: block; visibility: visible; left: 750px; top: 491px; z-index: 1; transform: translate3d(0px, 0px, 0px);">
                                            <div class="tp-loop-wrap" style="position:absolute;display:block;;">
                                                <div class="tp-mask-wrap"
                                                    style="position: absolute; display: block; overflow: hidden; transform: matrix(1, 0, 0, 1, 0, 0);">
                                                    <div class="tp-caption tp-resizeme rs-parallaxlevel-1 ipad-hidden big-ipad-hidden"
                                                        data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]"
                                                        data-responsive_offset="on" data-type="shape" data-height="none"
                                                        data-whitespace="nowrap" data-width="none"
                                                        data-hoffset="['100','-50','0','150']"
                                                        data-voffset="['210','120','120','120']"
                                                        data-x="['center','center','center','center']"
                                                        data-y="['middle','middle','middle','middle']"
                                                        data-frames="[{&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;speed&quot;:1500,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:2000,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:3000,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;mask&quot;:&quot;x:0;y:0;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                                                        id="layer-785642782"
                                                        style="visibility: inherit; transition: none 0s ease 0s; text-align: inherit; line-height: 0px; border-width: 0px; margin: 0px; padding: 0px; letter-spacing: 0px; font-weight: 400; font-size: 18px; white-space: nowrap; min-height: 0px; min-width: 0px; max-height: none; max-width: none; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform-origin: 50% 50% 0px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tp-parallax-wrap tp-parallax-container"
                                            style="position: absolute; display: block; visibility: visible; left: 1427px; top: 585px; z-index: 1; transform: translate3d(0px, 0px, 0px);">
                                            <div class="tp-loop-wrap" style="position:absolute;display:block;;">
                                                <div class="tp-mask-wrap"
                                                    style="position: absolute; display: block; overflow: hidden; transform: matrix(1, 0, 0, 1, 0, 0);">
                                                    <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme big-ipad-hidden rs-parallaxlevel-1"
                                                        data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]"
                                                        data-responsive_offset="on" data-type="shape" data-height="auto"
                                                        data-whitespace="nowrap" data-width="none"
                                                        data-hoffset="['-195','-100','-100','-100']"
                                                        data-voffset="['250','-190','-190','-190']"
                                                        data-x="['right','right','right','right']"
                                                        data-y="['middle','middle','middle','middle']"
                                                        data-frames="[{&quot;from&quot;:&quot;x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;speed&quot;:1500,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:1000,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1000,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;mask&quot;:&quot;x:0;y:0;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                                                        id="layer-402173572"
                                                        style="visibility: inherit; transition: none 0s ease 0s; text-align: inherit; line-height: 0px; border-width: 0px; margin: 0px; padding: 0px; letter-spacing: 0px; font-weight: 400; font-size: 18px; white-space: nowrap; min-height: 0px; min-width: 0px; max-height: none; max-width: none; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform-origin: 50% 50% 0px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tp-parallax-wrap"
                                            style="position: absolute; display: block; visibility: visible; left: 160px; top: 216px; z-index: 1;">
                                            <div class="tp-loop-wrap" style="position:absolute;display:block;;">
                                                <div class="tp-mask-wrap"
                                                    style="position: absolute; display: block; overflow: hidden; transform: matrix(1, 0, 0, 1, 0, 0);">
                                                    <div class="tp-caption" data-paddingbottom="[15,15,15,15]"
                                                        data-paddingleft="[15,15,15,15]" data-paddingright="[15,15,15,15]"
                                                        data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                                                        data-type="text" data-height="none"
                                                        data-width="['750','750','750','650']" data-whitespace="normal"
                                                        data-hoffset="['0','0','0','0']"
                                                        data-voffset="['-60','-50','-50','-80']"
                                                        data-x="['left','left','left','left']"
                                                        data-y="['middle','middle','middle','middle']"
                                                        data-textalign="['top','top','top','top']"
                                                        data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                                                        id="layer-800952837"
                                                        style="visibility: inherit; transition: none 0s ease 0s; line-height: 30px; border-width: 0px; margin: 0px; padding: 0px 15px 15px; letter-spacing: 0px; font-weight: 400; font-size: 18px; white-space: normal; min-height: 0px; min-width: 750px; max-height: none; max-width: 750px; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform-origin: 50% 50% 0px;">
                                                        <h1>
                                                            <span style="font-size: 96% !important;" class="black">{{$item->title}}</span>
                                                        </h1>
                                                        <p class="text-black-50 ntext mt-5 mb-4">
                                                            {!! $item->description !!}
                                                        </p>
                                                       <a target="_blank" href="{{ ($item->extra_field_2!='')?$item->extra_field_2:'#'}}">
                                                        <button class="home-button theme-btn btn-style-one bg-theme-color4 bg-dark" type="submit" name="submit-form">{{$item->extra_field_1}}</button>
                                                       </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>






                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Left and right controls/icons -->
            
            <button class="carousel-control-prev banner-carousel-button-left" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <i class="fa-solid fa-angle-left fa-2xl"></i>
            </button>
            
            <button class="carousel-control-next banner-carousel-button-right" type="button" data-bs-target="#demo" data-bs-slide="next">
                <i class="fa-solid fa-angle-right fa-2xl"></i>
            </button>

        </div>
    </section>
    <!-- end main-content -->


    <!-- Services Section -->

    <div class="bg-light row pt-4 px-lg-5 position-relative">
        <div class="sec-title text-center">
            <span class="sub-title">TAGLINE HEADING</span>
            <h2 class="home-service">Our Services</h2>
        </div>

        <img class="home-service-img1" src="{{ asset('assets/images/trial26.png') }}" alt="">
        <img class="home-service-img2" src="{{ asset('assets/images/trial11_new.png') }}" alt="">

        <div class="row bg-light home-service-section position-relative">
            <img class="home-service-img3" src="{{ asset('assets/images/trial10_new.png') }}" alt="">
    
             
            @foreach($category as $k=>$v)
            <div class="col-lg-4 col-sm-12 col-md-6 home-service-col bg-light">
                <div class="p-4 bg-white">
                    <div class="p-3 text-center home-service-border">
                        @if(\File::exists( public_path($v->image) ) && $v->image!='') 
                        <img class="w-100" src="{{ asset(''.$v->image) }}" alt="">
                        @else 
                        <img class="w-100" src="{{ asset('assets/images/trial4.png') }}" alt="">
                        @endif
                        
                        <p class="fs-4 black mt-4 mb-0 fw-bold">{{$v->title}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

    <!-- Take My Home Work Section -->

    <section class="bg-light py-5">
        <div class="pt-5 position-relative home-work-pad">
            <img class="home-work-img1" src="{{ asset('assets/images/service_new.png') }}" alt="">
            <div class="row">
                <div class="col-sm-12 col-md-7 home-work-col home-pattern">
                    <div class="title-outer">
                        <div class="sec-title">
                            <span class="sub-title">TAGLINE HEADING</span>
                            <h2 class="home-work pb-4">Take My Online Homework</h2>
                            <p class="home-work-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque
                                vero
                                quasi nemo nihil
                                optio voluptatibus distinctio. Tempore rem pariatur reiciendis!</p>
                            <p class="home-work-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione
                                corrupti earum
                                ducimus fugit
                                exercitationem nihil commodi quaerat autem voluptatibus optio asperiores sapiente,
                                sint aliquam esse
                                praesentium blanditiis debitis distinctio quis quos. Quis, ab maiores eveniet cum
                                eos suscipit
                                tempore dicta?</p>

                            <button class="home-work-button1 theme-btn btn-style-one bg-theme-color4 bg-dark"
                                type="submit" name="submit-form">Get a Free Quote</button>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5">
                    <!-- Sign Form -->
                    <div class=" position-relative text-white pb-5 home-card-img">
                        <div class="pb-4">
                            <h3 class="fs-2 font-bold mx-4 text-white pb-3 ps-lg-3 home-card-txt">Pay Someone to take
                                my online
                                Assignment</h3>
                            <p class="pb-md-3 mx-4 mx-lg-5 text-white w-75">Lorem ipsum dolor sit amet consectetur
                                adipisicing
                                elit.
                                Sapiente
                                laboriosam
                                excepturi officia labore asperiores suscipit magnam veniam velit ab quo quod architecto
                                error,
                                repellendus deserunt, quasi fuga iure quam beatae reprehenderit repudiandae eligendi est
                                obcaecati.
                            </p>
                            <button
                                class="home-work-button2 theme-btn btn-style-one bg-theme-color4 bg-white mb-5 mx-5">Get
                                a Free Quote</button>
                        </div>
                    </div>
                    <!--End Contact Form -->
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section -->

    <section class="bg-light pt-5 position-relative mob-cstm-testimonial-home-coc">
        <img class="home-form-img1" src="{{ asset('assets/images/trial11_new.png') }}" alt="">
        <img class="w-100 home-form-img2" src="{{ asset('assets/images/trial12_new.png') }}" alt="">
        <div class="pt-5 home-form">
            <div class="row">
                <div class="col-md-7">
                    <div class="title-outer">
                        <div class="sec-title">
                            <span class="sub-title">TAGLINE HEADING</span>
                            <h2 class="fs-1 mb-5">Why Students Love Us</h2>

                            <div id="demonw" class="carousel slide" data-bs-ride="carousel">

                                <!-- Indicators/dots -->
                                <div class="carousel-indicators home-form-carousel">
                                    @foreach($testimonial as $K=>$v)
                                    <button type="button" data-bs-target="#demonw" data-bs-slide-to="{{$K}}"
                                        class="{{ ($K==0)?'active':'' }} home-form-carousel-button"></button>
                                    @endforeach
                                    {{-- <button type="button" data-bs-target="#demonw" data-bs-slide-to="1"
                                        class="home-form-carousel-button"></button>
                                    <button type="button" data-bs-target="#demonw" data-bs-slide-to="2"
                                        class="home-form-carousel-button"></button> --}}
                                </div>

                                <!-- The slideshow/carousel -->
                                <div class="carousel-inner">
                                   @include('sections.testimonials',['type'=>1,'tagline'=>'','heading'=>'','testimonial'=>$testimonial])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <!-- Sign Form -->
                    <div class="signup-form-two wow fadeInLeft">

                        <!--Contact Form-->
                        <form class="rounded-3 shadow-lg" method="post" action="" id="contact-form">
                            <p class="fs-1 black pb-4 fw-bold pt-4 home-cstm-form-signup-one-p">Quick Form</p>
                            <div class="form-group">
                                <input class="mb-3" type="text" name="full_name" placeholder="Name" required>
                            </div>

                            <div class="form-group">
                                <input class="mb-3" type="text" name="Email" placeholder="Email" required>
                            </div>

                            <div class="form-group">
                                <textarea class="home-text" placeholder="Message"></textarea>
                            </div>

                            <div class="form-group py-4">
                                <button class="theme-btn btn-style-one bg-theme-color4 bg-dark w-100" type="submit"
                                    name="submit-form">Submit Now<span class="mx-2"> <i
                                            class="fa-solid fa-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                    <!--End Contact Form -->
                </div>
            </div>
        </div>
    </section>


    <!-- How We Work -->
    @include('sections.works',['works'=>$howWork,'tag_line'=>'TAGLINE HEADING','heading'=>'How we Work','columns'=>'col-xl-4 col-lg-4 col-md-4 col-sm-6','media'=>'image'])

    <!-- Why Choose US -->
    <div class="px-lg-5 bg-light py-3 position-relative">
        <img class="why-us-img1" src="{{ asset('assets/images/trial11_new.png') }}" alt="">
        <img class="why-us-img2" src="{{ asset('assets/images/trial16.png') }}" alt="">
        <div class="sec-title text-center pt-5">
            <span class="sub-title">TAGLINE HEADING</span>
            <h2 class="work-section-head">Why Choose Us</h2>
        </div>
        <div class="row home-why-choose-us-sec-mob-cstm">
            @foreach ($chooseUs as $k=>$item)
            <div class="card col-4" style="border: none;">
                <div class="card-body {{ ($k%2!=0)?'why-us-card-blk':'why-us-card-org' }}">
                    <img class="mb-4" src="{{asset('images/'.$item->image)}}" alt="{{$item->title}}">
                    <h5 class="card-title fw-bold text-white fs-2 pb-3">{{$item->title}}</h5>
                    <p class="home-work-card-txt card-text text-white pb-4">{!! strip_tags($item->description) !!}</p>
                    <div class="btn-box pb-3">
                        <a href="page-about.html" class="px-4 py-2 rounded-pill bg-white"><span
                                class="fs-6 black fw-bold">KNOW MORE</span></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    

    <section class="about-section-three position-relative p-0 home-faq-section-mob-cstm">
        <img class="home-faq-img1" src="{{asset('/assets/images/trial25.png')}}" alt="">
        <img class="home-faq-img2" src="{{asset('/assets/images/trial24.png')}}" alt="">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-6 col-md-12 order-2 wow fadeInRight" data-wow-delay="600ms">
                    <div class="inner-column">

                        <div class="sec-title">
                            <div class="section-paddding">
                                <div class="auto-container">
                                    <div class="row pt-lg-5">
                                        <div class="sec-title">
                                            <span class="sub-title text-end">TAGLINE</span>
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

                                                            @foreach($helpFaqs as $k=>$v)
                                                            <div class="home-faq">
                                                                <h2 class="accordion-header" id="headingOne{{$v->id}}">
                                                                    <button class="accordion-button fw-bold collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseOne{{$v->id}}"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseOne">
                                                                        {{$v->title}}
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseOne{{$v->id}}"
                                                                    class="accordion-collapse collapse fw-bold"
                                                                    aria-labelledby="headingOne{{$v->id}}"
                                                                    data-bs-parent="#accordionFaq">
                                                                    <div class="accordion-body">
                                                                        <p>{!!strip_tags($v->description)!!}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach

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
                        <figure class="image overlay-anim wow fadeInUp"><img class="w-100"
                                src="assets/images/trial23.png" alt="">
                        </figure>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Frequently Asked Question  -->
   


    <div class="pt-4">
        <ul class="orange-section-bg row text-white position-relative">
            <div class="d-flex col-6 col-sm-12 col-lg-3">
                <img class="orange-icons" src="{{ asset('assets/images/orange_icon1.png') }}" alt="">
                <li class="position-relative orange-section"><span class="fw-bolder fs-2">3000+</span><br> Qualified
                    Tutors</li>
            </div>
            <div class="d-flex col-6 col-sm-12 col-lg-3">
                <img class="orange-icons" src="{{ asset('assets/images/orange_icon2.png') }}" alt="">
                <li class="position-relative orange-section"><span class="fw-bolder fs-2">4000+</span><br> Student
                    Enrolled</li>
            </div>
            <div class="d-flex col-6 col-sm-12 col-lg-3">
                <img class="orange-icons" src="{{ asset('assets/images/orange_icon3.png') }}" alt="">
                <li class="position-relative orange-section"><span class="fw-bolder fs-2">10000+</span><br> Order
                    Fulfilled</li>
            </div>
            <div class="d-flex col-6 col-sm-12 col-lg-3">
                <img class="orange-icons" src="{{ asset('assets/images/orange_icon4.png') }}" alt="">
                <li class="position-relative orange-section"><span class="fw-bolder fs-2">55+</span><br>Subjects
                    Solved
                    by us</li>
            </div>

        </ul>
        <!-- <img class="w-full" src="trial27.png')}}" alt=""> -->
    </div>



    <div class="w-100">
        <video class="w-100" src="{{ asset('assets/images/1067634035-preview.mp4') }}" autoplay></video>
    </div>

@endsection

@push('js')
<!--Revolution Slider-->
<script src="{{asset('assets/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('assets/plugins/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('assets/plugins/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('assets/plugins/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{asset('assets/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('assets/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('assets/plugins/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('assets/plugins/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('assets/plugins/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('assets/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('assets/plugins/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script src="{{asset('assets/js/main-slider-script.js')}}"></script>
<!--Revolution Slider-->
@endpush