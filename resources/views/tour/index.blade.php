@extends('layouts.master')
@section('title')
    <title>{{ __('lang.tour_packages') }}</title>
    <meta property="og:title" content="{{ __('lang.tour_packages') }}" />
    <meta property="og:url" content="{{ route('tourspackages.index') }}" />
    <meta property="og:image" content="{{ asset('front/images/favicon.png') }}" />
@endsection
@section('content')


    <!-- ================================
        START BREADCRUMB AREA
    ================================= -->
    <section class="breadcrumb-area bread-bg">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title text-white">{{ __('lang.uzb') }} {{ __('lang.travel') }}</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{ route('home') }}">{{ __('lang.home_page') }}</a></li>
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumb-wrap -->
        <div class="bread-svg-box">
            <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
                <polygon points="100 0 50 10 0 0 0 10 100 10"></polygon>
            </svg>
        </div><!-- end bread-svg -->
    </section><!-- end breadcrumb-area -->
    <!-- ================================
        END BREADCRUMB AREA
    ================================= -->

    <!-- ================================
        START CARD AREA
    ================================= -->
    <section class="card-area section--padding">
        <div class="container">
            <div class="row">
            </div><!-- end row -->
            <div class="row">
                @foreach ($tours as $uztour)
                    <div class="col-lg-4 responsive-column">
                        <div class="card-item">
                            <div class="card-img">
                                <a href="{{ route('tourspackages.show', $uztour->id) }}" class="d-block">
                                    <img src="{{ asset(str_replace('public', 'storage', $uztour->picture)) }}"
                                        alt="Destination-img" height="250px">
                                </a>
                                
                                
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a
                                        href="{{ route('tourspackages.show', $uztour->id) }}">{{ $uztour->city }}</a>
                                </h3>
                                <p class="card-meta">{{ $uztour->country }}</p>
                                <div class="card-rating">
                                    <span class="badge text-white">{{ __('lang.comments') }}</span>
                                    <span
                                        class="review__text">{{ $uztour->comments->where('confirm', true)->count() }}</span>
                                </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__from"></span>
                                        <span class="price__num">{{ number_format($uztour->price) }}
                                            {{ __('lang.currency') }}</span>
                                    </p>
                                    <span class="tour-hour"><a href="{{ route('tourspackages.show', $uztour->id) }}"
                                            class="theme-btn">{{ __('lang.view') }}</a></span>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                    </div><!-- end col-lg-4 -->
                @endforeach

            </div><!-- end row -->

        </div><!-- end container -->
    </section><!-- end card-area -->
    <!-- ================================
        END CARD AREA
    ================================= -->

@endsection
