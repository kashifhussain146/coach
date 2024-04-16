<!-- FAQ Section -->
<section class="">
    <div class="container">
        <div class="row">
            <div class="sec-title text-center">
                <span class="sub-title">{{$tag_line}}</span>
                <h2>{{$heading}}</h2>
            </div>

            <div class="col {{(isset($col))?$col:''}}">
                <ul class="accordion-box wow fadeInRight">
                    <!--Block-->
                    @foreach($faq as $k=>$v)
                    <li class="accordion block {{($k==0)?'active-block':''}}">
                        <div class="acc-btn {{($k==0)?'active':''}}">{{$v->title}}
                            <div class="icon fa fa-plus"></div>
                        </div>
                        <div class="acc-content {{($k==0)?'current':''}}">
                            <div class="content">
                                <div class="text">{!! strip_tags($v->description) !!}</div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End FAQ Section -->