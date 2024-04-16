<section class="categories-section-current bg-white">
    <div class="  work-section">
        <div class="sec-title text-center">
            <span class="sub-title">{{$tag_line}}</span>
            <h2 class="work-section-head">{{$heading}}</h2>
        </div>

        <div class="row justify-content-center">
            <!-- Category Block -->
            @foreach($works as $K=>$v)
            <div class="category-block-current {{$columns}}">
                <div class="inner-box">
                    @if($media=='image')
                    <img class="mx-auto pb-3" src="{{asset('images/'.$v->image)}}" alt="">
                    @else
                    <div class="icon-box">
                        <i class="icon flaticon-student-2"></i>
                    </div>
                    @endif
                    <h6 class="pt-4 pb-2 fs-2 color2 fw-bold">{{$v->title}}</h6>
                    <p class="work-section-txt">{!! strip_tags($v->description) !!}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>