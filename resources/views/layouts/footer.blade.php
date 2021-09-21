<!-- ================================
       START FOOTER AREA
================================= -->
<section class="footer-area section-bg padding-top-40px padding-bottom-30px">
  
    <div class="section-block mt-4 mb-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 responsive-column">
                <div class="footer-item">
                    <div class="footer-logo padding-bottom-30px">
                        <a href="{{route('home')}}" class="foot__logo"><img src="{{ asset('front/images/favicon.png') }}"
                            alt="logo"> DiamondTravel</a>
                    </div><!-- end logo -->
                    <ul class="list-items pt-3">
                        <li>{{__('lang.address_city')}}</li>
                        <li>+(998)-90-950-95-78</li>
                        <li><a href="">diamondtravel@info.com</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-4 responsive-column">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">{{__('lang.page')}}</h4>
                    <ul class="list-items list--items">
                        <li><a href="{{ route('home') }}">{{ __('lang.home_page') }}</a>
                        </li>
                        <li><a
                                href="{{ route('tourspackages.index') }}">{{ __('lang.tour_packages') }}</a>
                        </li>
                        <li><a href="{{ route('galleriesuser.index') }}">{{ __('lang.gallery') }}</a>
                        </li>
                        <li><a href="{{ route('contactspage.index') }}">{{ __('lang.about_us') }}</a>
                        </li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-4 responsive-column">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">{{__('lang.pay_method')}}</h4>
                    <p class="footer__desc pb-3"></p>
                    <ul class="list-items list--items">
                    <li><img src="{{ asset('front/payme.png') }}" width="74px"
                        height="47px"><img src="{{ asset('front/click.png') }}" width="90px"
                        height="37px" style="padding-left: 1rem"><img src="{{ asset('front/master.png') }}" width="90px"
                        height="37px" style="padding-left: 1rem">
                        <img src="{{ asset('front/visa.png') }}" width="90px"
                        height="37px" style="padding-left: 1rem">
                    </li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end footer-area -->
<!-- ================================
       START FOOTER AREA
================================= -->