@extends('layouts.master')
@section('title')
    <title>{{ __('lang.travel_with_us') }}</title>
    <meta property="og:title" content="{{ __('lang.travel_with_us') }}" />
    <meta property="og:image" content="{{ asset('front/images/favicon.png') }}" />
@endsection
@section('content')


<example-component></example-component>

<section class="hero-wrapper hero-wrapper7">
    <div class="hero-box">

        <div id="fullscreen-slide-contain">
            <ul class="slides-container">
                <li><img src="{{asset('front/images/hero-bg2.jpg')}}" alt=""></li>
                <li><img src="{{asset('front/images/hero--bg2.jpg')}}" alt=""></li>
                <li><img src="{{asset('front/images/hero--bg3.jpg')}}" alt=""></li>
            </ul>
        </div><!-- End background slider -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-content pb-5 text-center">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-70 pb-3">{{__('lang.around_the_world')}} {{__('lang.world')}}</h2>
                            <p class="sec__desc font-size-30 font-weight-medium">{{__('lang.discover_world_with_us')}}</p>
                        </div>
                    </div><!-- end hero-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
</section><!-- end hero-wrapper -->


<section class="card-area section--padding">
    <div class="container">
        <div class="row" style="padding-bottom:3rem">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 style="text-align: center">{{__('lang.around_the_world')}} {{__('lang.world')}}</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
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


<section class="card-area section--padding">
    <div class="container">
        <div class="row" style="padding-bottom:3rem">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 style="text-align: center">{{__('lang.uzb')}} {{__('lang.travel')}}</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row">
            @foreach ($uzbtours as $uztour)
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
@endsection
