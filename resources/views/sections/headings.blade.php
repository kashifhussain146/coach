@if($is_circle)

<section class="categories-section-current bg-light">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2>{{$title}}</h2>
        </div>
        <div class="row justify-content-center">
            @foreach ($data as $item)
            <div class="category-block-current col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="inner-box">
                    <div class="icon-box">
                        <i class="icon {{$item->extra_field_1}}"></i>
                    </div>
                    <h6 class="title"><a href="">{{$item->title}}</a></h6>
                    <p>{!!$item->description!!}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@else

<section class="bg-light py-5">
    <div class="sec-title text-center">
        <h2>{{$title}}</h2>
    </div>
    <div style="padding: 0 4rem;" class="row">
        @foreach($customData as $k=>$v)
        <div class="col-6">
            <h5 style="color: #ff7707;" class="fw-bold fs-2"><span class="pb-2" style="border-bottom: 4px solid #ff7707;">{{$v['colored_title']}}</span>{{$v['normal_title']}}</h5>
            <p style="font-size: large;" class="black pt-4">{{$v['description']}}</p>
        </div>
        @endforeach
    </div>

    <div style="padding: 4rem 6rem 0 6rem;">
        <p style="color: black;" class="fw-bold text-center fs-2">Ho<span class="pb-2" style="border-bottom: 4px solid #ff7707;">w it Wo</span>rks ?</p>
            <div class="row py-5">
                @foreach ($data as $item)
                <div class="col-4 text-center">
                    <img src="{{asset('images/'.$item->image)}}" alt="">
                    <p class="black fs-4 fw-bold pt-4">{{$item->title}}</p>
                    <p class="mx-auto black">{!!$item->description!!}</p>
                </div>
                @endforeach
            </div>
    </div>


</section>
@endif