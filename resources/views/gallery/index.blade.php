@extends('layouts.master')
@section('title')
    <title>{{ __('lang.gallery') }}</title>
    <meta property="og:title" content="{{ __('lang.gallery') }}" />
    <meta property="og:url" content="{{ route('galleriesuser.index') }}" />
    <meta property="og:image" content="{{ asset('front/images/favicon.png') }}" />
@endsection
@section('content')


<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-10">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
    <div class="bread-svg-box">
        <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
    </div><!-- end bread-svg -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START GALLERY AREA
================================= -->
<section class="gallery-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">{{ __('lang.gallery') }}</h2>
                   
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            @foreach ($galleries as $key => $gallery)
            <div class="col-lg-4">
                <div class="gallery-card">
                    <a class="d-block" data-fancybox="gallery" href="{{ asset(str_replace('public', 'storage', $gallery->picture)) }}" data-caption="{{$gallery->name}}">
                        <img src="{{ asset(str_replace('public', 'storage', $gallery->picture)) }}" height="250px">
                    </a>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            @endforeach
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end gallery-area -->
<!-- ================================
    END GALLERY AREA
================================= -->






@endsection
