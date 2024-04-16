<div class="form-group my-5 list-items">
    <input style="border: 2px solid #ff7707; padding: 0.2rem 1rem;" class="w-100" placeholder="Search Keyword" type="text">
</div>
<p class="black fw-bold fs-5 mx-3">Subjects</p>
<div class="accordion" id="accordionExample">
    @php $counter = 0; @endphp
    @foreach($subjectsCategory as $k1=>$v1)
       
            <div class="accordion-item border-0">
                <h2 class="accordion-header"> <button class="@if(!empty($subject_category_id)) {{ ($subject_category_id==$v1->id)?'accordion-button fw-bold p-1':'accordion-button fw-bold p-1 collapsed' }} @else {{ ($counter==0)?'accordion-button fw-bold p-1':'accordion-button fw-bold p-1 collapsed' }} @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$v1->id}}" aria-expanded="true" aria-controls="collapseOne{{$v1->id}}">{{$v1->category_name}}</button></h2>
                <div id="collapseOne{{$v1->id}}"      class="@if(!empty($subject_category_id)) {{ ($subject_category_id==$v1->id)?'accordion-collapse collapse show':'accordion-collapse collapse' }} @else {{ ($counter==0)?'accordion-collapse collapse show':'accordion-collapse collapse' }}    @endif" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @foreach($v1->subjects as $k=>$v)
                            @php 
                                $questionCount = \App\Models\Questions::where('subject_category',$v1->id)->where('subject',$v->id)->whereHas('subjects')->whereHas('college')->whereHas('category')->Activated()->count();
                            @endphp
                            <a href="{{route('solutions.library.subject.page',['subject_id'=>$v1->id,'topic_id'=>$v->id])}}">
                                <ul class="d-flex justify-content-between" style="margin-bottom: 13px;">
                                    <li class="list-items ms-2">{{$v->subject_name}}</li>
                                    <li class="bg-black px-2 text-white list-items py-1">{{$questionCount}}</li>
                                </ul>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            @php $counter++; @endphp
    @endforeach


</div>