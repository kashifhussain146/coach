
@extends('layouts.app')

@section('title')
    Home | Privacy Policy
@endsection

@push('css')
<style>
    .fa{
        display: block!important;
    }
    .section-paddding{
        padding: 50px 0!important;
    }
</style>
@endpush

@section('content')

    <!-- Start main-content -->
    <section class="page-title terms-condition-head-section"
        style="padding: 0 70px; min-height: auto !important;">
        <div class="auto-container text-center">

            <div class="title-outer">
                <h1 class="title">PRIVACY POLICY</h1>
            </div>
        </div>
    </section>
    <!-- end main-content -->


    <!-- Content  -->
    <div class="container py-5 privacy-text-cstm">
        {!! $privacypolicy->description !!}
    </div>


@endsection