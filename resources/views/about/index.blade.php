@extends('layouts.master')
@section('title')
    <title>{{ __('lang.about_us') }}</title>
    <meta property="og:title" content="{{ __('lang.about_us') }}" />
    <meta property="og:url" content="{{ route('contactspage.index') }}" />
    <meta property="og:image" content="{{ asset('front/images/favicon.png') }}" />
@endsection
@section('content')

    <!-- ================================
        START BREADCRUMB AREA
    ================================= -->
    <section class="breadcrumb-area bread-bg-5">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title text-white">{{ __('lang.about_us') }}</h2>
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
    START CONTACT AREA
    ================================= -->
    <section class="contact-area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-box">
                        
                        <div class="form-content ">
                            <div class="contact-form-action">
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
                                <form class="row messenger-box-form" method="post"
                                    action="{{route('contacts.store')}}">
                                    @csrf
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box messenger-box-input-wrap">
                                            <label class="label-text" for="name">{{__('lang.name')}}</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" id="name" name="name"
                                                    placeholder="{{__('lang.name')}}" required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box messenger-box-input-wrap">
                                            <label class="label-text" for="phone_number">{{__('lang.phone_number')}}</label>
                                            <div class="form-group">
                                                <span class="la la-phone form-icon"></span>
                                                <input class="form-control" type="number" name="phone_number" id="phone_number"
                                                    placeholder="{{__('lang.phone_number')}}" required>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-12">
                                        <div class="input-box messenger-box-input-wrap">
                                            <label class="label-text" for="message">{{ __('lang.message') }}</label>
                                            <div class="form-group">
                                                <span class="la la-pencil form-icon"></span>
                                                <textarea class="message-control form-control" name="message" id="message"
                                                    placeholder="{{ __('lang.message') }}..." required></textarea>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-lg-12">
                                        <div class="btn-box messenger-box-input-wrap">
                                            <button name="submit" type="submit" class="theme-btn send-message-btn"
                                                id="send-message-btn">{{__('lang.send')}}</button>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </form>
                            </div><!-- end contact-form-action -->
                        </div><!-- end form-content -->
                    </div><!-- end form-box -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title">{{__('lang.contact')}}</h3>
                        </div><!-- form-title-wrap -->
                        <div class="form-content">
                            <div class="address-book">
                                <ul class="list-items contact-address">
                                    <li>
                                        <i class="la la-map-marker icon-element"></i>
                                        <h5 class="title font-size-16 pb-1">{{__('lang.location')}}</h5>
                                        <p class="map__desc">
                                            {{__('lang.address_city')}}
                                        </p>
                                    </li>
                                    <li>
                                        <i class="la la-phone icon-element"></i>
                                        <h5 class="title font-size-16 pb-1">{{__('lang.phone_number')}}</h5>
                                        <p class="map__desc">{{__('lang.phone_number')}}: +(998)-90-950-95-78</p>
                                    </li>
                                    <li>
                                        <i class="la la-envelope-o icon-element"></i>
                                        <h5 class="title font-size-16 pb-1">{{__('lang.email')}}</h5>
                                        <p class="map__desc">diamondtravel@info.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- end form-content -->
                    </div><!-- end form-box -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end contact-area -->
    <!-- ================================
    END CONTACT AREA
    ================================= -->

    <!-- ================================
    START MAP AREA
    ================================= -->
    <section class="map-area padding-bottom-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2995.895557962315!2d69.21599581460055!3d41.33288440733659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8b8be72b6d9d%3A0x750e6cd7eb305648!2zQmVydW5peSBzaG9oIGtvJ2NoYXNpLCDQotC-0YjQutC10L3RgiwgT2B6YmVraXN0b24!5e0!3m2!1suz!2s!4v1631547888511!5m2!1suz!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> </div><!-- end map-container -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end map-area -->
    <!-- ================================
    END MAP AREA
    ================================= -->







@endsection
