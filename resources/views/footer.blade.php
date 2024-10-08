<footer class="footer appear-animate" data-animation-options="{'name': 'fadeIn'}">
    <div class="container">
        <div class="footer-newsletter">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="swiper-slide icon-box icon-box-side text-dark">
                        <div class="icon-box-icon d-inline-flex">
                            <i class="w-icon-envelop3"></i>
                        </div>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-uppercase font-weight-bold">Subscribe To Our Newsletter</h4>
                            <p>Get all the latest information on Events, Sales and Offers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-9 mt-4 mt-lg-0">
                    <form action="{{ url('subscribe/for/newsletter') }}" method="POST"
                        class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                        @csrf
                        @honeypot
                        <input type="email" name="email" class="form-control mr-2 bg-white text-default"
                            placeholder="Your E-mail Address" />
                        <button class="btn btn-primary btn-rounded" type="submit">Subscribe<i
                                class="w-icon-long-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-about m-0">
                        <div class="widget-body">
                            <a href="{{ url('/') }}" class="logo-footer">
                                <img src="{{ url(env('ADMIN_URL') . '/' . $generalInfo->logo_dark) }}"
                                    alt="{{ $generalInfo->company_name }}" style="width: 145px" />
                            </a>

                            <p class="widget-about-title">{{ $generalInfo->company_name }}</p>

                            <div class="footer-about-info">
                                <ul>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="w-icon-map-marker"></i>
                                            {{ $generalInfo->address }}
                                        </a>
                                    </li>
                                    @php
                                        $emailIds = explode(',', $generalInfo->email);
                                        $contactNos = explode(',', $generalInfo->contact);
                                    @endphp

                                    @foreach ($contactNos as $contactNo)
                                        <li>
                                            <a href="tel:{{ $contactNo }}" target="_blank"><i
                                                    class="w-icon-call"></i>{{ $contactNo }}</a>
                                        </li>
                                    @endforeach

                                    @foreach ($emailIds as $emailId)
                                        <li>
                                            <a href="mailto:{{ $emailId }}" target="_blank"><i
                                                    class="w-icon-envelop2"></i>{{ $emailId }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="widget">
                        <h3 class="widget-title">Company</h3>
                        <ul class="widget-body">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('about') }}">About Us</a></li>
                            <li><a href="{{ url('blogs') }}">Blogs</a></li>
                            <li><a href="{{ url('contact') }}">Contact Us</a></li>
                            <li><a href="{{ url('shop') }}">Shops</a></li>
                            <li><a href="{{ url('vendor/shops') }}">Vendor Shops</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4>
                        <ul class="widget-body">
                            <li><a href="{{ url('/home') }}">My Dashboard</a></li>
                            <li><a href="{{ url('/my/orders') }}">My Orders</a></li>
                            <li><a href="{{ url('/my/wishlists') }}">My Wishlist</a></li>
                            <li><a href="{{ url('/my/payments') }}">My Payments</a></li>
                            <li><a href="{{ url('/promo/coupons') }}">Promo/Coupons</a></li>
                            <li><a href="{{ env('VENDOR_URL') }}" target="_blank">Vendor Login</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4>
                        <ul class="widget-body">
                            <li><a href="{{ url('/track/order') }}">Track My Order</a></li>
                            <li><a href="{{ url('/support/tickets') }}">Support Ticket</a></li>
                            <li><a href="{{ url('terms/of/services') }}">Terms & Conditions</a></li>
                            <li><a href="{{ url('privacy/policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ url('shipping/policy') }}">Shipping Policy</a></li>
                            <li><a href="{{ url('return/policy') }}">Return Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Download App</h4>
                        <div class="download-app">
                            <div class="download-app-inner">

                                @if ($generalInfo->play_store_link)
                                    <a href="{{ $generalInfo->play_store_link }}" target="_blank">
                                        <img src="{{ url('assets') }}/images/google-play.svg" alt="" />
                                    </a>
                                @endif

                                @if ($generalInfo->app_store_link)
                                    <a href="{{ $generalInfo->app_store_link }}" target="_blank">
                                        <img src="{{ url('assets') }}/images/app-store.svg" alt="" />
                                    </a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="footer-middle-widget">
                        <h3 class="footer-middle-title">Follow Us</h3>
                        <div class="social-icons social-icons-colored">

                            @if ($generalInfo && $generalInfo->facebook)
                                <a href="{{ $generalInfo->facebook }}" target="_blank"
                                    class="social-icon social-facebook w-icon-facebook"></a>
                            @endif

                            @if ($generalInfo && $generalInfo->twitter)
                                <a href="{{ $generalInfo->twitter }}" target="_blank"
                                    class="social-icon social-twitter w-icon-twitter"></a>
                            @endif

                            @if ($generalInfo && $generalInfo->instagram)
                                <a href="{{ $generalInfo->instagram }}" target="_blank"
                                    class="social-icon social-instagram w-icon-instagram"></a>
                            @endif

                            @if ($generalInfo && $generalInfo->youtube)
                                <a href="{{ $generalInfo->youtube }}" target="_blank"
                                    class="social-icon social-youtube w-icon-youtube"></a>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-sm-6">
                    <div class="footer-middle-widget text-right">
                        <h3 class="footer-middle-title">Payment Method</h3>
                        <div class="footer-middle-img">
                            <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{url(env('ADMIN_URL')."/".$generalInfo->payment_banner)}}" alt=""/>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-2 col-sm-6">
                    <div class="footer-middle-widget">
                        <h3 class="footer-middle-title">Our Concern</h3>
                        <div class="footer-middle-img">
                            <img src="./assets/images/footer/concern.png" alt="concern" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <div class="footer-middle-widget">
                        <h3 class="footer-middle-title">Member of</h3>
                        <div class="footer-middle-img">
                            <img src="./assets/images/footer/member-of.png" alt="member-of" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-1 col-sm-6">
                    <div class="footer-middle-widget verified-by">
                        <h3 class="footer-middle-title">Verified by</h3>
                        <div class="footer-middle-img">
                            <img src="./assets/images/footer/verified-by.png" alt="veified-by" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-1 col-sm-6">
                    <div class="footer-middle-widget">
                        <h3 class="footer-middle-title">DBID</h3>
                        <div class="footer-middle-img">
                            <img src="./assets/images/footer/dbid.png" alt="dbid" />
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="footer-left">
                <p class="copyright text-white">{{$generalInfo->footer_copyright_text}}</p>
            </div>
        </div>
    </div>
</footer>
<!-- End of Footer -->
