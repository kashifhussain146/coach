<section class="clients-section">
    <img style="position: absolute; top: 1rem; right: -6rem;"  src="{{asset('/assets/images/trial11_new.png')}}" alt="">
    <img style="position: absolute; bottom: 0; left: -7.5rem;"  src="{{asset('/assets/images/trial11_new.png')}}" alt="">
    <div class="auto-container">
        <div class="sponsors-outer">
            <ul class="clients-carousel owl-carousel owl-theme">
                @foreach ($data as $item)
                <li class="slide-item"> <a href="#"><img src="{{asset('images/'.$item->image)}}" alt=""></a> </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
