
@extends('layouts.app')

@section('title')
    Home | Thank you
@endsection

@push('css')
<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
<style>
@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
</style>

@endpush

@section('content')

<header class="site-header" id="header">
    <h1 class="" data-lead-id="site-header-title">YOUR ORDER HAS BEEN RECEIVED !</h1>
</header>

<div class="main-content">
    <i style="font-size:120px" class="fa fa-check main-content__checkmark" id="checkmark"></i>
    <p class="main-content__body" data-lead-id="main-content-body">Thank you for your payment <br /> Your Payment ID #: {{$payment_id}}</p>

    <br />

   <a href="{{route('solutions.library.question.page',['question_id'=>$payment->question_id])}}"> <button class="btn btn-success">Go to Question Page</button></a>
</div>

<footer class="site-footer" id="footer">
    <p class="site-footer__fineprint" id="fineprint">Copyright @ {{date('Y')}} | All Rights Reserved</p>
</footer>

@endsection