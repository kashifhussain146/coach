<!-- Testimonial Section Two -->
@switch($type)
    @case(1)

        @foreach($testimonial as $K=>$v)
        <div class="carousel-item {{ ($K==0)?'active':'' }} ">
            <div class="bg-white px-4 position-relative carousel-icon">
                <svg class="home-card-icon" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 975.036 975.036">
                    <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                </svg>
                <div class="row pt-4">
                    <img class="col-4 carousel-img" src="{{asset('images/'.$v->image)}}" alt="">
                    <div class="col-8">
                        <p class="black fw-bold mb-0">{{$v->title}}</p>
                        <p class="mb-0">{{$v->extra_field_1}}</p>
                    </div>
                </div>

                <p class="py-4">{!! strip_tags($v->description) !!}</p>
            </div>
        </div>
        @endforeach

    @break
    
    @case(2)
    <section class="testimonial-section-two style-two">
        <div class="circle-one paroller" data-paroller-factor="-0.20" data-paroller-factor-lg="0.20"  data-paroller-type="foreground" data-paroller-direction="horizontal"></div>
        <div class="circle-two paroller" data-paroller-factor="0.20" data-paroller-factor-lg="-0.20"  data-paroller-type="foreground" data-paroller-direction="horizontal"></div>
        <div class="pattern-layer-two" style="background-image:url({{asset('assets/images/pattern-10.png')}})"></div>
        <div class="auto-container">
            <div class="inner-container">
                <div class="pattern-layer" style="background-image:url({{asset('assets/images/pattern-9.png')}})"></div>
                <!-- Sec Title -->
                <div class="sec-title text-center">
                    <span class="sub-title">{{$tagline}}</span>
                    <h2>{{$heading}}</h2>
                </div>
                <div class="testimonial-carousel-two owl-carousel owl-theme">
    
                    <!-- Testimonial Block Two -->
                    @foreach($testimonial as $K=>$v)
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="border-layer"></div>
                            <div class="text">From exhibitions and dinners, to celebrations and conferences, the
                                University of Bath is a great place to hold any event.</div>
                            <div class="author-info">
                                <div class="info-inner">
                                    <div class="author-image">
                                        <img src="{{asset('images/'.$v->image)}}" alt="">
                                    </div>
                                    <h6>{{$v->title}}</h6>
                                    <div class="designation">{{$v->extra_field_1}}</div>
                                </div>
                            </div>
                            <div class="quote-icon fa fa-quote-right"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
        @break
    @default
        
@endswitch




