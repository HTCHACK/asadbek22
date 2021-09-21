@extends('layouts.master')
@section('title')
    <title>{{ $tour->title }}</title>

    <meta property="og:title" content="{{ $tour->title }}" />
    <meta property="og:url" content="{{ route('tourspackages.show', $tour->id) }}" />
    <meta property="og:image" content="{{ asset(str_replace('public', 'storage', $tour->picture)) }}" />
@endsection

@section('content')

    <!-- ================================
        START BREADCRUMB TOP BAR
    ================================= -->
    <section class="breadcrumb-top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-list breadcrumb-top-list">
                        <ul class="list-items bg-transparent radius-none p-0">
                            <li><a href="{{ route('home') }}">{{ __('lang.home_page') }}</a></li>
                            <li>{{ $tour->city }}</li>
                            <li>{{ $tour->country }}</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end breadcrumb-top-bar -->
    <!-- ================================
        END BREADCRUMB TOP BAR
    ================================= -->

    <!-- ================================
        START BREADCRUMB AREA
    ================================= -->
    <section class="breadcrumb-area" style="background: url({{ asset(str_replace('public', 'storage', $tour->picture)) }});
        background-size:cover;
        background-position:center">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumb-wrap -->
    </section><!-- end breadcrumb-area -->
    <!-- ================================
        END BREADCRUMB AREA
    ================================= -->

    <!-- ================================
        START TOUR DETAIL AREA
    ================================= -->
    <section class="tour-detail-area padding-bottom-90px">
        <div class="single-content-navbar-wrap menu section-bg" id="single-content-navbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-content-nav" id="single-content-nav">
                            <ul>
                                <li><a data-scroll="description" href="#description"
                                        class="scroll-link active">{{ __('lang.description') }}</a></li>
                                <li><a data-scroll="location-map" href="#location-map"
                                        class="scroll-link">{{ __('lang.location') }}</a></li>
                                <li><a data-scroll="reviews" href="#reviews"
                                        class="scroll-link">{{ __('lang.comments') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end single-content-navbar-wrap -->
        <div class="single-content-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-content-wrap padding-top-60px">
                            <div id="description" class="page-scroll">
                                <div class="single-content-item pb-4">
                                    <h3 class="title font-size-26">{{ $tour->city }}</h3>

                                </div><!-- end single-content-item -->
                                <div class="section-block"></div>
                                <div class="section-block"></div>
                                <div class="single-content-item padding-top-40px padding-bottom-40px">
                                    <h3 class="title font-size-20">{{ __('lang.description') }}</h3>
                                    <p class="py-3">{{ $tour->content }}</p>

                                </div><!-- end single-content-item -->
                                <div class="section-block"></div>
                            </div><!-- end description -->
                            <div id="location-map" class="page-scroll">
                                <div class="single-content-item padding-top-40px padding-bottom-40px">
                                    <h3 class="title font-size-20">{{ __('lang.location') }}</h3>
                                    <div class="gmaps padding-top-30px">
                                        {!! $tour->location !!}
                                    </div>
                                </div><!-- end single-content-item -->
                                <div class="section-block"></div>
                            </div><!-- end location-map -->
                            <div id="reviews" class="page-scroll">
                                <div class="section-block"></div>
                            </div><!-- end reviews -->
                            <div class="review-box">
                                <div class="single-content-item padding-top-40px">
                                    <h3 class="title font-size-20">{{ $tour->comments->where('confirm', true)->count() }}
                                        {{ __('lang.comments') }}</h3>
                                    <div class="comments-list padding-top-50px">
                                        @foreach ($tour->comments->where('confirm', true) as $key => $comment)
                                            <div class="comment">
                                                <div class="comment-avatar">
                                                    <img class="avatar__img" alt=""
                                                        src="{{ asset('front/images/team8.jpg') }}">
                                                </div>
                                                <div class="comment-body">
                                                    <div class="meta-data">
                                                        <h3 class="comment__author">{{ $comment->name }}</h3>
                                                        <div class="meta-data-inner d-flex">
                                                            <p class="comment__date">
                                                                {{ $comment->created_at->diffForHumans() }}</p>
                                                        </div>
                                                    </div>
                                                    <p class="comment-content">
                                                        {{ $comment->content }}
                                                    </p>

                                                </div>
                                            </div><!-- end comments -->
                                        @endforeach
                                    </div><!-- end comments-list -->
                                    <div class="comment-forum padding-top-40px">
                                        <div class="form-box">
                                            <div class="form-title-wrap">
                                                <h3 class="title">{{ __('lang.add_comment') }}</h3>
                                            </div><!-- form-title-wrap -->
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul style="list-style:none;">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @elseif (session('success'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            <div class="form-content">
                                                <div class="rate-option p-2">

                                                </div><!-- end rate-option -->
                                                <div class="contact-form-action">
                                                    <form action="{{ route('usercomments.create', $tour->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-6 responsive-column">
                                                                <div class="input-box">
                                                                    <label
                                                                        class="label-text">{{ __('lang.name') }}</label>
                                                                    <div class="form-group">
                                                                        <span class="la la-user form-icon"></span>
                                                                        <input class="form-control" type="text"
                                                                            name="name"
                                                                            placeholder="{{ __('lang.name') }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 responsive-column">
                                                                <div class="input-box">
                                                                    <label
                                                                        class="label-text">{{ __('lang.phone_number') }}</label>
                                                                    <div class="form-group">
                                                                        <span class="la la-phone form-icon"></span>
                                                                        <input class="form-control" type="number"
                                                                            name="phone_number"
                                                                            placeholder="{{ __('lang.phone_number') }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="input-box">
                                                                    <label
                                                                        class="label-text">{{ __('lang.comment') }}</label>
                                                                    <div class="form-group">
                                                                        <span class="la la-pencil form-icon"></span>
                                                                        <textarea class="message-control form-control"
                                                                            name="content"
                                                                            placeholder="{{ __('lang.comment') }}"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="btn-box">
                                                                    <button type="submit"
                                                                        class="theme-btn">{{ __('lang.add_comment') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div><!-- end contact-form-action -->
                                            </div><!-- end form-content -->
                                        </div><!-- end form-box -->
                                    </div><!-- end comment-forum -->
                                </div><!-- end single-content-item -->
                            </div><!-- end review-box -->
                        </div><!-- end single-content-wrap -->
                    </div><!-- end col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="sidebar single-content-sidebar mb-0">
                            <div class="sidebar-widget single-content-widget">
                                <div class="sidebar-widget-item">
                                    <div class="sidebar-book-title-wrap mb-3">
                                        <h3>{{ __('lang.buy_tour') }}</h3>
                                       
                                        <p><span class="text-form"></span><span
                                                class="text-value ml-2 mr-1">{{ $tour->price }}</span>
                                            {{ __('lang.currency') }}<span class="before-price"></span></p>
                                    </div>
                                </div><!-- end sidebar-widget-item -->
                                <div class="sidebar-widget-item">
                                    <div class="contact-form-action">
                                         {{-- @livewire('order-tour', ['tour_id'=>$tour->id]) --}}
                                    </div>
                                </div><!-- end sidebar-widget-item -->
                            </div><!-- end sidebar-widget -->
                            <div class="sidebar-widget single-content-widget">
                                <h3 class="title stroke-shape">{{__('lang.order')}}</h3>
                                <div class="enquiry-forum">
                                    <div class="form-box">
                                        <div class="form-content">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul style="list-style:none;">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @elseif (session('ordersuccess'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('ordersuccess') }}
                                                </div>
                                            @endif
                                            <div class="contact-form-action">
                                                <form method="post" action="{{ route('orders.store', $tour->id) }}">
                                                    @csrf
                                                    <input name="tour_id" wire:model="tour_id" type="hidden" value="{{ $tour->id }}">
                                                    <div class="input-box">
                                                        <label class="label-text">{{__('lang.name')}}</label>
                                                        <div class="form-group">
                                                            <span class="la la-user form-icon"></span>
                                                            <input class="form-control" type="text" name="name"
                                                                placeholder="{{__('lang.name')}}">
                                                        </div>
                                                    </div>
                                                    <div class="input-box">
                                                        <label class="label-text">{{__('lang.phone_number')}}</label>
                                                        <div class="form-group">
                                                            <span class="la la-phone form-icon"></span>
                                                            <input class="form-control" type="number" name="phone_number"
                                                                placeholder="{{__('lang.phone_number')}}">
                                                        </div>
                                                    </div>
                                                    <div class="btn-box">
                                                        <button type="submit" class="theme-btn">{{__('lang.order')}}</button>
                                                    </div>
                                                </form>
                                            </div><!-- end contact-form-action -->
                                        </div><!-- end form-content -->
                                    </div><!-- end form-box -->
                                </div><!-- end enquiry-forum -->
                            </div><!-- end sidebar-widget -->

                        </div><!-- end sidebar -->
                    </div><!-- end col-lg-4 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end single-content-box -->
    </section><!-- end tour-detail-area -->
    <!-- ================================
        END TOUR DETAIL AREA
    ================================= -->


@endsection
