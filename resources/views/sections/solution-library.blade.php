<p class="black">Showing {{$questions->currentPage()}}-{{$questions->perPage()}} of {{$questions->total()}} results</p>
@foreach($questions as $k=>$v)
<div style="box-shadow: rgba(255, 119, 7, 1) 0px 1px 8px, white 0px 1px 2px;" class="py-4 mb-5">
    <div class="px-4">
        <div class="row w-50">
            <div class="col-4 w-25">
                <p style="background-color: #ff7707; font-size: small;" class="text-white text-center rounded-pill">{{ ($v->category!='')?$v->category->category_name:'' }}</p>
            </div>
            @if($v->subjects!='')
            <div class="col-4 w-25">
                <p style="background-color: #ff7707; font-size: small;" class="text-white text-center rounded-pill">{{ ($v->subjects!='')?$v->subjects->subject_name:'' }}</p>
            </div>
            @endif
            <div class="col-4 w-25">
                <p style="background-color: #ff7707; font-size: small;" class="text-white text-center rounded-pill"> Solutions ID {{ $v->id }}</p>
            </div>
        </div>

        <p class="fs-6 mb-1">{{$v->college->name}} </p>
        
        <div class="questions">
            <strong style="font-weight: 700">Q.{{++$k}} </strong> {!! substr( strip_tags($v->question) ,0,500).'...' !!}
        </div>
        
        <div>
            @if( strtotime($v->expiry_date) < strtotime(date('Y-m-d')))
                @if($v->visiblity=='Y')
                <strong style="font-weight: 700">Ans.</strong> {!! substr(strip_tags(masks($v->answer,"x")),0,500)  !!}
                @else
                <strong style="font-weight: 700">Ans.</strong> {!! substr(strip_tags($v->answer,"x"),0,500)  !!}
                @endif
            @else
                <strong style="font-weight: 700">Ans.</strong> {!! substr(strip_tags($v->answer,"x"),0,500)  !!}
            @endif

        </div>

        <div class="row mt-3 mb-3">
            <ul class="col-6 d-flex">
                <li class="list-items">{{$v->num_words}} words</li>
                <li class="ms-3 list-items">{{$v->views_count}} views</li>
                <li class="ms-3 list-items">ID {{$v->id}}</li>
            </ul>
        </div>


        <div class="row">
            <div class="col-12">
                <div>
                    <button style="background-color: #ff7707;float:right;margin-right:10px" class="fs-6 px-3 fw-bold text-white">${{$v->price}} | Buy Now</button>
                    <button style="background-color: #ff7707;float:right;margin-right:10px" class="fs-6 px-3 fw-bold text-white">Get an Original Solution</button>
                </div>

            </div>
        </div>
    </div>
</div>
@endforeach
