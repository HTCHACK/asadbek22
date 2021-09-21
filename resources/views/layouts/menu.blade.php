<!-- ================================
            START HEADER AREA
================================= -->
<header class="header-area">
    <div class="header-top-bar padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-left">
                            <ul class="list-items">
                                <li><a href=""><i class="la la-phone mr-1"></i>+(998)-90-950-95-78</a></li>
                                <li><a href=""><i class="la la-envelope mr-1"></i>diamondtravel@info.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="header-menu-wrapper padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-wrapper justify-content-between">
                        <a href="#" class="down-button"><i class="la la-angle-down"></i></a>
                        <div class="logo">
                            <a href="{{ route('home') }}"><img src="{{ asset('front/images/favicon.png') }}"
                                    alt="logo"> DiamondTravel</a>
                            <div class="menu-toggler">
                                <i class="la la-bars"></i>
                                <i class="la la-times"></i>
                            </div><!-- end menu-toggler -->
                        </div><!-- end logo -->
                        <div class="main-menu-content pr-0 ml-0">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('home') }}">{{ __('lang.home_page') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('tourspackages.index') }}">{{ __('lang.tour_packages') }}</a>
                                    </li>
                                    <li><a href="{{ route('galleriesuser.index') }}">{{ __('lang.gallery') }}</a>
                                    </li>
                                    <li><a href="{{ route('contactspage.index') }}">{{ __('lang.about_us') }}</a>
                                    </li>
                                    <li>
                                        <a href="">{{ __('lang.language') }} <i class="la la-angle-down"></i></a>
                                        <ul class="dropdown-menu-item">
                                            @foreach ($languages as $lang)
                                                @if ($lang == 'uz')
                                                    <li> <a href="{{ url()->current() . '/?language=' . $lang }}">
                                                            O'zbek
                                                        </a></li>

                                                @elseif($lang=='en')

                                                    <li> <a href="{{ url()->current() . '/?language=' . $lang }}">
                                                            English
                                                        </a></li>

                                                @elseif($lang=='ru')
                                                    <li><a href="{{ url()->current() . '/?language=' . $lang }}">
                                                            Русский
                                                        </a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- end main-menu-content -->
                        <div class="nav-btn">
                            <a class="theme-btn"
                                href="{{ route('contactspage.index') }}">{{ __('lang.contact') }}</a>
                        </div><!-- end nav-btn -->
                    </div><!-- end menu-wrapper -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-wrapper -->
</header>
<!-- ================================
         END HEADER AREA
================================= -->
