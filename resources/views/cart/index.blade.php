@extends('layouts.app')

@section('title')
   Home | Cart
@endsection

@push('css')

<style>
.razorpay-payment-button{
    background-color: #ff7707;
    border-radius: var(--bs-border-radius-pill)!important;
    font-size: 1rem!important;
    padding-right: 3rem!important;
    padding-left: 3rem!important;
    color: white;
    padding: 4px;
}
</style>
@endpush

@section('content')
    <section class="page-title"
        style="background-image: url({{asset('assets/images/contact-bnnr.png')}}); padding: 0 70px !important; min-height: auto !important;">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-7">
                    <div class="title-outer">
                        <h1 class="title">Contact Us</h1>
                        <p class="text-white ntext">
                            Lorem Ipsum is simply dummy text of the printing and typese
                            tting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer.
                        </p>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end main-content -->
    
    <section style="padding: 5rem 11rem;">
        <div style="background-color: #ff7707;" class="auto-container w-100 mt-5">
            <p class="fs-6 text-white py-2">
                (1) ITEM ADDED TO THE CART
            </p>
        </div>

        @if(\Route::is('checkout.index'))      
        <section class="acc-sec5-pad text-center">
            <h2 class="mt-4">UPLOAD ASSIGNMENT</h2>
            <form action="{{ route('payment.create') }}" method="POST">
                
                @csrf
                <div class="my-5">
                    <div>
                        <div class="d-flex mb-4 justify-content-center">
                            <div style="width: 15rem;" class="text-start">
                                <p style="font-size: 17px" class="fw-bold black">YOUR NAME :</p>
                            </div>
                            <input name="fullname_c" value="{{$user->fullname}}" style="border: 1px solid black; border-radius: 3px;  max-height: 40px;" class="w-25 fs-6"
                                type="text">
                        </div>
                    </div>
                    <div>
                        <div class="d-flex mb-4 justify-content-center">
                            <div style="width: 15rem;" class="text-start">
                                <p style="font-size: 17px" class="fw-bold black">EMAIL :</p>
                            </div>
                            <input name="email_c" value="{{$user->email}}" style="border: 1px solid black; border-radius: 3px;  max-height: 40px;" class="w-25 fs-6"
                                type="text">
                        </div>
                    </div>
                    <div>
                        <div class="d-flex mb-4 justify-content-center">
                            <div style="width: 15rem;" class="text-start">
                                <p style="font-size: 17px" class="fw-bold black">PHONE NUMBER :</p>
                            </div>
                            <input name="phone_c" style="border: 1px solid black; border-radius: 3px;  max-height: 40px;" class="w-25 fs-6"
                                type="text">
                        </div>
                    </div>
                    <div>
                        <div class="d-flex mb-4 justify-content-center">
                            <div style="width: 15rem;" class="text-start">
                                <p style="font-size: 17px" class="fw-bold black">SUBJECT :</p>
                            </div>
                            <select name="subject_c" style="border: 1px solid black; border-radius: 3px;  max-height: 40px;" class="w-25 fs-6">
                                <option value="">Select</option>
                                @foreach ($subjects as $item)
                                <option {{ ($cart->subject_id==$item->id)?'selected':'' }} value="{{$item->id}}">{{$item->subject_name}}</option>                                    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex mb-4 justify-content-center">
                            <div style="width: 15rem;" class="text-start">
                                <p style="font-size: 17px" class="fw-bold black">COUNTRY :</p>
                            </div>
                            <select name="country_c" style="border: 1px solid black; border-radius: 3px;  max-height: 40px;"
                                class="w-25 fs-6">
                                <option value="India">India</option>
                                <option value="Russia">Russia</option>
                                <option value="China">China</option>
                                <option value="Canada">Canada</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Los Angelas">Los Angelas</option>
                                <option value="Phillipines">Phillipines</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex mb-4 justify-content-center">
                            <div style="width: 15rem;" class="text-start">
                                <p style="font-size: 17px" class="fw-bold black">SERVICE REQUIRED :</p>
                            </div>
                            <select name="service_c" style="border: 1px solid black; border-radius: 3px;  max-height: 40px;"
                                class="w-25 fs-6">
                                <option value="">Select a Service</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex mb-4 justify-content-center">
                            <div style="width: 15rem;" class="text-start">
                                <p style="font-size: 17px" class="fw-bold black">QUESTIONS :</p>
                            </div>
                            <textarea disabled name="question_c" style="border: 1px solid black; border-radius: 3px;" class="w-25 fs-6" >{!!strip_tags($cart->questions)!!}</textarea>
                        </div>
                    </div>
    
    
                </div>

                <script
                        src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="{{ env('RAZORPAY_KEY_ID') }}"
                        data-amount="{{ $cart->price*100 }}"
                        data-buttontext="Pay {{ $cart->price }} USD"
                        data-name="Coach on Coach"
                        data-currency="USD"
                        data-description="Razorpay payment"
                        data-image="{{asset('assets/images/logo.png')}}"
                        data-prefill.name="{{auth()->guard('web')->user()->fullname}}"
                        data-prefill.email="{{auth()->guard('web')->user()->email}}"
                        data-theme.color="#ff7707"
                        >
                </script>
               <input type="hidden" name="amount" value="{{$cart->price*100}}">
            </form>
        </section>
        @else
        @php
            $total = 0;
            $firstCart = $cart->first();

        @endphp
        
        @foreach ($cart as $item)
            @php     $total = $total+$item->price;  @endphp
            <div class="row">
            
                <div class="col-5">
                    <p class="black fs-6 fw-bold">DESCRIPTION</p>
                    <p class="pe-4" style="text-align: justify;">
                        @if($item->question->visiblity=='Y')
                        <span  class="blur">{!! substr(strip_tags(masks($item->question->answer,"x")),0,500)  !!}       </span>
                        @else
                        <span>{!! substr(strip_tags($item->question->answer,"x"),0,500)  !!}</span><br />
                        @endif
                    </p>
                </div>
                <div class="col-3">
                    <p class="black fs-6 fw-bold">SUBJECT</p>
                    <p>{{$item->category->category_name}}</p>
                </div>
                <div class="col-2">
                    <p class="black fs-6 fw-bold">SOLUTION ID</p>
                    <p>{{$item->question->id}}</p>
                </div>
                <div class="col-2">
                    <p class="black fs-6 fw-bold">PRICE</p>
                    <p>{{$item->question->price}}</p>
                </div>
            </div>
        @endforeach

    
    <hr style="height: 4px;">
    <div class="row">
        <div class="col-5">
        </div>

        <div class="col-3">
        </div>
        <div class="col-2">
            <p class="fs-6 fw-bold black">Amount Payable</p>
        </div>
        <div class="col-2">
            <p>${{$total}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
        </div>

        <div class="col-3">
        </div>
        <div class="col-4 text-center">
            <form action="{{ route('payment.create') }}" method="POST">
                @csrf
            <script
                    src="https://checkout.razorpay.com/v1/checkout.js"
                    data-key="{{ env('RAZORPAY_KEY_ID') }}"
                    data-amount="{{ $total*100 }}"
                    data-buttontext="Pay {{ $total }} USD"
                    data-name="Coach on Coach"
                    data-currency="USD"
                    data-description="Razorpay payment"
                    data-image="{{asset('assets/images/logo.png')}}"
                    data-prefill.name="{{auth()->guard('web')->user()->fullname}}"
                    data-prefill.email="{{auth()->guard('web')->user()->email}}"
                    data-theme.color="#ff7707"
                    >
            </script>
           <input type="hidden" name="amount" value="{{$total*100}}">
            </form>
            {{-- <button style="background-color: #ff7707;" class="checkout fs-6 px-5 py-1 text-white rounded-1 text-uppercase position-relative">Checkout</button>                 --}}
        </div>
    </div>

        @endif
    </section>
   
@endsection

@push('js')
<script>

$(document).on('click','.checkout',function(){
    window.location.href='{{route('checkout.index')}}';
});

</script>
@endpush