<!-- resources/views/blog-detail.blade.php -->
@extends('layouts.app')

@section('meta')
<meta name="title" content="{{ $blog->meta_title }}">
<meta name="description" content="{{ $blog->meta_description }}">
<meta name="keywords" content="{{ $blog->meta_keywords }}">
<!-- JSON-LD Schema Markup -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ url()->current() }}"
  },
  "headline": "{{ $blog->title }}",
  "image": [
    "{{ asset('images/'.$blog->image) }}"
  ],
  "datePublished": "{{ $blog->created_at->toIso8601String() }}",
  "dateModified": "{{ $blog->updated_at->toIso8601String() }}",
  "publisher": {
    "@type": "Organization",
    "name": "{{ config('app.name') }}",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ asset('path_to_your_logo') }}"
    }
  },
  "description": "{{ $blog->meta_description }}"
}
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 blog-detail-main-column">
            <div class="card">
                <div class="card-header">{{ $blog->title }}</div>

                <div class="card-body">
                    <img src="{{ asset('images/'.$blog->image) }}" class="img-fluid mb-3" alt="Blog Image" width="100%" style="max-height:500px;object-fit:cover;">
                    <h6><span style="color: #ff7707 !important;" class="mx-3"> 
                        <i style="transform: rotate(90deg);" class="fa-solid fa-tag"></i>
                        </span>{{ $blog->modelable->category_name }}</h6>
                    <p class="mt-3">{!! $blog->description !!}</p>
                    <div class="row justify-content-between pb-2">
                        <div class="col-6 fs-6 terms-points">
                            <i class="fas fa-calendar-alt ms-3 me-2"></i> {{ date('d M, Y', strtotime($blog->created_at)) }}
                        </div>
                        <div class="col-6 text-end fs-6">
                            <a class="mx-3 fw-bold" href="{{ route('blogs') }}">Back to Blogs <i class="fa-solid fa-arrow-left ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
