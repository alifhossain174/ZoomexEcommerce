<!DOCTYPE html>
<html lang="en">

@php
    $generalInfo = DB::table('general_infos')
        ->select(
            'logo_dark',
            'logo',
            'fav_icon',
            'company_name',
            'email',
            'address',
            'custom_css',
            'header_script',
            'footer_script',
            'payment_banner',
            'play_store_link',
            'contact',
            'footer_copyright_text',
            'app_store_link',
            'whatsapp',
            'messenger',
            'telegram',
            'youtube',
            'facebook',
            'pinterest',
            'twitter',
            'linkedin',
            'instagram',
            'primary_color',
            'secondary_color',
            'tertiary_color',
            'title_color',
            'paragraph_color',
            'border_color',
            'google_tag_manager_status',
            'google_tag_manager_id',
            'google_analytic_status',
            'google_analytic_tracking_id',
            'fb_pixel_status',
            'fb_pixel_app_id',
            'tawk_chat_status',
            'tawk_chat_link',
            'messenger_chat_status',
            'fb_page_id',
            'short_description',
            'trade_license_no'
        )
        ->where('id', 1)
        ->first();
@endphp

<head>
    <!-- Start Meta Data -->
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- End Meta Data -->

    @stack('site-seo')

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: {
                families: ["Poppins:400,500,600,700,800"]
            },
        };
        (function(d) {
            var wf = d.createElement("script"),
                s = d.scripts[0];
            wf.src = "{{ url('assets') }}/js/webfont.js";
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{ url('assets') }}/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
    <link rel="preload" href="{{ url('assets') }}/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
    <link rel="preload" href="{{ url('assets') }}/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
    <link rel="preload" href="{{ url('assets') }}/fonts/Zomex.woff?png09e" as="font" type="font/woff" crossorigin="anonymous" />

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/vendor/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/vendor/animate/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/vendor/magnific-popup/magnific-popup.min.css" />
    <link rel="stylesheet" href="{{ url('assets') }}/vendor/swiper/swiper-bundle.min.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/css/style.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/css/variable-colors.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/css/toastr.min.css" />

    @yield('header_css')

    <style>
        :root {
            --primary-color: {{ $generalInfo->primary_color }};
            --secondary-color: {{ $generalInfo->secondary_color }};
            --title-color: {{ $generalInfo->title_color }};
            --paragraph-color: {{ $generalInfo->paragraph_color }};
            --border-color: {{ $generalInfo->border_color }};
        }

        /* live search css start */
        ul.live_search_box{
            position: absolute;
            top: 75%;
            left: 0px;
            z-index: 999;
            background: white;
            border: 1px solid lightgray;
            width: 100%;
            padding: 0px;
            border-radius: 0px 0px 4px 4px;
        }
        ul.live_search_box li.live_search_item{
            list-style: none;
            border-bottom: 1px solid lightgray;
        }
        ul.live_search_box li.live_search_item:last-child{
            border-bottom: none;
        }
        ul.live_search_box li.live_search_item a.live_search_product_link{
            display:flex;
            padding: 10px;
            transition: all .1s linear;
        }
        ul.live_search_box li.live_search_item a.live_search_product_link:hover{
            box-shadow: 1px 1px 5px #cecece inset;
        }
        ul.live_search_box li.live_search_item a.live_search_product_link img.live_search_product_image{
            width: 40px;
            height: 40px;
            min-width: 40px;
            min-height: 40px;
            border: 1px solid lightgray;
            border-radius: 4px
        }
        ul.live_search_box li.live_search_item a.live_search_product_link h6.live_search_product_title{
            margin-left: 8px;
            margin-top: 2px;
            margin-bottom: 0px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        ul.live_search_box li.live_search_item a.live_search_product_link span.live_search_product_price{
            display: block;
            margin-top: 2px;
            color: var(--primary-color);
        }
        /* live search css end */

        {!! $generalInfo->custom_css !!}
    </style>

    @if ($generalInfo->google_tag_manager_status)
        <!-- Google Tag Manager -->
        <script>
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', '{{ $generalInfo->google_tag_manager_id }}');
        </script>
        <!-- End Google Tag Manager-->
    @endif

    @if ($generalInfo->google_analytic_status)
        <!-- Google tag (gtag.js) google analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $generalInfo->google_analytic_tracking_id }}" type="53191a76ba85f8f784cbe351-text/javascript"></script>
        <script type="53191a76ba85f8f784cbe351-text/javascript">
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', '{{$generalInfo->google_analytic_tracking_id}}');
        </script>
    @endif

    @if ($generalInfo->fb_pixel_status)
        <!-- Facebook Pixel Code -->
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $generalInfo->fb_pixel_app_id }}');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id={{ $generalInfo->fb_pixel_app_id }}&ev=PageView&noscript=1" />
        </noscript>
        <!-- End Facebook Pixel Code -->
    @endif

    @if ($generalInfo->tawk_chat_status)
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = '{{ $generalInfo->tawk_chat_link }}';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
    @endif

    {!! $generalInfo->header_script !!}
</head>

<body class="home">

    @if ($generalInfo->google_tag_manager_status)
        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id={{ $generalInfo->google_tag_manager_id }}" height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->
    @endif

    @if ($generalInfo->messenger_chat_status)
        <a href="{{ $generalInfo->fb_page_id }}" target="_blank" style="position: fixed; right: 10px; width: 60px; bottom: 20px; z-index: 99999;">
            <img src="{{ url('assets') }}/images/messenger_icon.png" style="width: 60px; max-width: 60px">
        </a>
    @endif

    <div class="page-wrapper">

        <!-- Start of Header -->
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">Welcome to {{env('APP_NAME')}}</p>
                    </div>
                    <div class="header-right">
                        <a href="{{$generalInfo->play_store_link}}" target="_blank" class="d-lg-show">Save more on app</a>
                        <span class="divider d-lg-show"></span>
                        <a href="{{ url('vendor/registration') }}" class="d-lg-show">Sell on Zomex</a>
                        <span class="divider d-lg-show"></span>
                        <a href="{{url('track/order')}}" class="d-lg-show">Track Order</a>
                    </div>
                </div>
            </div>
            <!-- End of Header Top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left mr-md-4">
                        <a href="#" class="mobile-menu-toggle w-icon-hamburger" aria-label="menu-toggle"> </a>

                        <a href="{{ url('/') }}" class="logo ml-lg-0">
                            <img src="{{ url(env('ADMIN_URL') . '/' . $generalInfo->logo) }}" alt="{{ $generalInfo->company_name }}" width="144" height="45" />
                        </a>

                        <form action="{{ url('search/for/products') }}" method="GET" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                            @csrf
                            <input type="text" autocomplete="off" @if (isset($search_keyword)) value="{{ $search_keyword }}" @endif name="search_keyword" id="search_keyword" onkeyup="liveSearchProduct()" class="form-control" placeholder="Search for products..." required />
                            <button class="btn btn-search" type="submit">
                                <i class="w-icon-search"></i>
                            </button>
                            <ul class="live_search_box d-none">

                            </ul>
                        </form>

                    </div>
                    <div class="header-right ml-4">
                        <a class="wishlist label-down link d-xs-show" href="{{ url('/view/wishlist') }}">
                            <i class="w-icon-heart"></i>
                            <span class="wishlist-label d-lg-show">Wishlist</span>
                        </a>

                        <div class="dropdown cart-dropdown cart-offcanvas mr-lg-5">
                            <div class="cart-overlay"></div>
                            <a href="#" class="cart-toggle label-down link">
                                <i class="w-icon-cart">
                                    <span class="cart-count">2</span>
                                </i>
                                <span class="cart-label">Cart</span>
                            </a>
                            <div class="dropdown-box" id="dropdown_box_sidebar_cart">

                                @include('sidebar_cart')

                            </div>
                            <!-- End of Dropdown Box -->
                        </div>

                        @auth
                        <a class="wishlist label-down link d-xs-show mr-0" href="{{url('/home')}}">
                            <i class="w-icon-account"></i>
                            <span class="my-account-label d-lg-show">My Account</span>
                        </a>
                        @endauth

                        @guest
                        <a class="wishlist label-down link d-xs-show mr-0" href="{{url('/login')}}">
                            <i class="w-icon-account"></i>
                            <span class="my-account-label d-lg-show">Login/Register</span>
                        </a>
                        @endguest
                    </div>
                </div>
            </div>
            <!-- End of Header Middle -->

            <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
                <div class="container">
                    <div class="inner-wrap">
                        <div class="header-left">
                            <div class="dropdown category-dropdown has-border" data-visible="true">
                                <a href="#" class="category-toggle text-dark" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                                    data-display="static" title="Browse Categories">
                                    <i class="w-icon-category"></i>
                                    <span>Browse Categories</span>
                                </a>

                                <div class="dropdown-box">
                                    <ul class="menu vertical-menu category-menu">
                                        <li>
                                            <a href="{{ url('/shop') }}"> <i class="w-icon-tshirt2"></i>Fashion </a>
                                            <ul class="megamenu">
                                                <li>
                                                    <h4 class="menu-title">Women</h4>
                                                    <hr class="divider" />
                                                    <ul>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">New Arrivals</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Best Sellers</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Trending</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Clothing</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Shoes</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Bags</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Accessories</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Jewlery & Watches</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <h4 class="menu-title">Men</h4>
                                                    <hr class="divider" />
                                                    <ul>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">New Arrivals</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Best Sellers</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Trending</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Clothing</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Shoes</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Bags</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Accessories</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Jewlery & Watches</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="banner-fixed menu-banner menu-banner2">
                                                        <figure>
                                                            <img src="{{ url('assets') }}/images/menu/banner-2.jpg"
                                                                alt="Menu Banner" width="235" height="347" />
                                                        </figure>
                                                        <div class="banner-content">
                                                            <div class="banner-price-info mb-1 ls-normal">
                                                                Get up to
                                                                <strong
                                                                    class="text-primary text-uppercase">20%Off</strong>
                                                            </div>
                                                            <h3 class="banner-title ls-normal">Hot Sales</h3>
                                                            <a href="{{ url('/shop') }}"
                                                                class="btn btn-dark btn-sm btn-link btn-slide-right btn-icon-right">
                                                                Shop Now<i class="w-icon-long-arrow-right"></i> </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}"> <i class="w-icon-home"></i>Home & Garden
                                            </a>
                                            <ul class="megamenu">
                                                <li>
                                                    <h4 class="menu-title">Bedroom</h4>
                                                    <hr class="divider" />
                                                    <ul>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Beds, Frames & Bases</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Dressers</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Nightstands</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Kid's Beds & Headboards</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Armoires</a>
                                                        </li>
                                                    </ul>

                                                    <h4 class="menu-title mt-1">Living Room</h4>
                                                    <hr class="divider" />
                                                    <ul>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Coffee Tables</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Chairs</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Tables</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Futons & Sofa Beds</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Cabinets & Chests</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <h4 class="menu-title">Office</h4>
                                                    <hr class="divider" />
                                                    <ul>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Office Chairs</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Desks</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Bookcases</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">File Cabinets</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Breakroom Tables</a>
                                                        </li>
                                                    </ul>

                                                    <h4 class="menu-title mt-1">Kitchen & Dining</h4>
                                                    <hr class="divider" />
                                                    <ul>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Dining Sets</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Kitchen Storage Cabinets</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Bashers Racks</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Dining Chairs</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Dining Room Tables</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/shop') }}">Bar Stools</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="menu-banner banner-fixed menu-banner3">
                                                        <figure>
                                                            <img src="{{ url('assets') }}/images/menu/banner-3.jpg"
                                                                alt="Menu Banner" width="235" height="461" />
                                                        </figure>
                                                        <div class="banner-content">
                                                            <h4
                                                                class="banner-subtitle font-weight-normal text-white mb-1">
                                                                Restroom</h4>
                                                            <h3
                                                                class="banner-title font-weight-bolder text-white ls-normal">
                                                                Furniture Sale</h3>
                                                            <div
                                                                class="banner-price-info text-white font-weight-normal ls-25">
                                                                Up to
                                                                <span
                                                                    class="text-secondary text-uppercase font-weight-bold">25%
                                                                    Off</span>
                                                            </div>
                                                            <a href="{{ url('/shop') }}"
                                                                class="btn btn-white btn-link btn-sm btn-slide-right btn-icon-right">
                                                                Shop Now<i class="w-icon-long-arrow-right"></i> </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}"> <i class="w-icon-furniture"></i>Furniture
                                            </a>
                                            <ul class="megamenu type2">
                                                <li class="row">
                                                    <div class="col-md-3 col-lg-3 col-6">
                                                        <h4 class="menu-title">Furniture</h4>
                                                        <hr class="divider" />
                                                        <ul>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Sofas & Couches</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Armchairs</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Bed Frames</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Beside Tables</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Dressing Tables</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-6">
                                                        <h4 class="menu-title">Lighting</h4>
                                                        <hr class="divider" />
                                                        <ul>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Light Bulbs</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Lamps</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Celling Lights</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Wall Lights</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Bathroom Lighting</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-6">
                                                        <h4 class="menu-title">Home Accessories</h4>
                                                        <hr class="divider" />
                                                        <ul>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Decorative
                                                                    Accessories</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Candals & Holders</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Home Fragrance</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Mirrors</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Clocks</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-6">
                                                        <h4 class="menu-title">Garden & Outdoors</h4>
                                                        <hr class="divider" />
                                                        <ul>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Garden Furniture</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Lawn Mowers</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Pressure Washers</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">All Garden Tools</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/shop') }}">Outdoor Dining</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-6">
                                                        <div class="banner banner-fixed menu-banner5 br-xs">
                                                            <figure>
                                                                <img src="{{ url('assets') }}/images/menu/banner-5.jpg"
                                                                    alt="Banner" width="410" height="123"
                                                                    style="background-color: #d2d2d2" />
                                                            </figure>
                                                            <div class="banner-content text-right y-50">
                                                                <h4
                                                                    class="banner-subtitle font-weight-normal text-default text-capitalize">
                                                                    New Arrivals</h4>
                                                                <h3
                                                                    class="banner-title font-weight-bolder text-capitalize ls-normal">
                                                                    Amazing Sofa</h3>
                                                                <div
                                                                    class="banner-price-info font-weight-normal ls-normal">
                                                                    Starting at <strong>$125.00</strong></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="banner banner-fixed menu-banner5 br-xs">
                                                            <figure>
                                                                <img src="{{ url('assets') }}/images/menu/banner-6.jpg"
                                                                    alt="Banner" width="410" height="123"
                                                                    style="background-color: #9f9888" />
                                                            </figure>
                                                            <div class="banner-content y-50">
                                                                <h4
                                                                    class="banner-subtitle font-weight-normal text-white text-capitalize">
                                                                    Best Seller</h4>
                                                                <h3
                                                                    class="banner-title font-weight-bolder text-capitalize text-white ls-normal">
                                                                    Chair &amp; Lamp</h3>
                                                                <div
                                                                    class="banner-price-info font-weight-normal ls-normal text-white">
                                                                    From <strong>$165.00</strong></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}"> <i class="w-icon-heartbeat"></i>Healthy &
                                                Beauty </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}" class="font-weight-bold text-primary text-uppercase ls-25">
                                                View All Categories<i class="w-icon-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <nav class="main-nav">
                                <ul class="menu active-underline">
                                    <li class="active">
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/shop') }}">Shop</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/vendor-shop') }}">Vendor</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/blogs') }}">Blog</a>
                                    </li>
                                    <li>
                                        <a href="#">Pages</a>
                                        <ul>
                                            <li><a href="{{ url('/about') }}">About Us</a></li>
                                            <li>
                                                <a href="{{ url('/become/a/vendor') }}">Become A Vendor</a>
                                            </li>
                                            <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                                            <li><a href="{{ url('/faq') }}">FAQs</a></li>
                                            <li><a href="{{ url('/blogs') }}">Blog</a></li>
                                            <li><a href="{{ url('/vendor-shop') }}">Vendor</a></li>
                                            <li><a href="{{ url('/error-404') }}">Error 404</a></li>
                                            <li><a href="{{ url('/wishlist') }}">Wishlist</a></li>
                                            <li><a href="{{ url('/cart') }}">Cart</a></li>
                                            <li><a href="{{ url('/checkout') }}">Checkout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right">
                            <a href="tel:01718182922"><span>Hot Line :</span>01718182922</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End of Header -->

        <!-- Start of Main-->
        <main class="main">
            @yield('content')
        </main>
        <!-- End of Main -->

        @include('footer')
    </div>
    <!-- End of Page Wrapper -->

    <!-- Start of Sticky Footer -->
    <div class="sticky-footer sticky-content fix-bottom">
        <a href="{{ url('/') }}" class="sticky-link active">
            <i class="w-icon-home"></i>
            <p>Home</p>
        </a>
        <a href="{{ url('/category') }}" class="sticky-link">
            <i class="w-icon-category"></i>
            <p>Category</p>
        </a>
        <a href="my-account.html" class="sticky-link">
            <i class="w-icon-account"></i>
            <p>Account</p>
        </a>
        <div class="cart-dropdown dir-up">
            <a href="{{ url('/cart') }}" class="sticky-link">
                <i class="w-icon-cart"></i>
                <p>Cart</p>
            </a>
            <div class="dropdown-box">
                <div class="products">
                    <div class="product product-cart">
                        <div class="product-detail">
                            <h3 class="product-name">
                                <a href="{{ url('/product/details') }}">Beige knitted elas<br />tic runner shoes</a>
                            </h3>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">$25.68</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="{{ url('/product/details') }}">
                                <img src="{{ url('assets') }}/images/cart/product-1.jpg" alt="product"
                                    height="84" width="94" />
                            </a>
                        </figure>
                        <button class="btn btn-link btn-close" aria-label="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="product product-cart">
                        <div class="product-detail">
                            <h3 class="product-name">
                                <a href="{{ url('/product/details') }}">Blue utility pina<br />fore denim dress</a>
                            </h3>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">$32.99</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="{{ url('/product/details') }}">
                                <img src="{{ url('assets') }}/images/cart/product-2.jpg" alt="product"
                                    width="84" height="94" />
                            </a>
                        </figure>
                        <button class="btn btn-link btn-close" aria-label="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="cart-total">
                    <label>Subtotal:</label>
                    <span class="price">$58.67</span>
                </div>

                <div class="cart-action">
                    <a href="{{ url('/cart') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                    <a href="{{ url('/checkout') }}" class="btn btn-primary btn-rounded">Checkout</a>
                </div>
            </div>
            <!-- End of Dropdown Box -->
        </div>

        <div class="header-search hs-toggle dir-up">
            <a href="#" class="search-toggle sticky-link">
                <i class="w-icon-search"></i>
                <p>Search</p>
            </a>
            <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
        </div>
    </div>
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    <a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button">
        <i class="w-icon-angle-up"></i>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
            <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10"
                cx="35" cy="35" r="34" style="stroke-dasharray: 16.4198, 400"></circle>
        </svg>
    </a>
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay"></div>
        <!-- End of .mobile-menu-overlay -->

        <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
        <!-- End of .mobile-menu-close -->

        <div class="mobile-menu-container scrollable">
            <form action="#" method="get" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
            <!-- End of Search Form -->
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#main-menu" class="nav-link active">Main Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="#categories" class="nav-link">Categories</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="main-menu">
                    <ul class="mobile-menu">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>
                            <a href="{{ url('/shop') }}">Shop</a>
                        </li>
                        <li>
                            <a href="{{ url('/vendor-shop') }}">Vendor</a>
                        </li>
                        <li>
                            <a href="{{ url('/blogs') }}">Blog</a>
                        </li>
                        <li>
                            <a href="#">Pages</a>
                            <ul>
                                <li><a href="{{ url('/about') }}">About Us</a></li>
                                <li>
                                    <a href="{{ url('/become/a/vendor') }}">Become A Vendor</a>
                                </li>
                                <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                                <li><a href="{{ url('/faq') }}">FAQs</a></li>
                                <li><a href="{{ url('/blogs') }}">Blog</a></li>
                                <li><a href="{{ url('/vendor-shop') }}">Vendor</a></li>
                                <li><a href="{{ url('/error-404') }}">Error 404</a></li>
                                <li><a href="{{ url('/wishlist') }}">Wishlist</a></li>
                                <li><a href="{{ url('/cart') }}">Cart</a></li>
                                <li><a href="{{ url('/checkout') }}">Checkout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane" id="categories">
                    <ul class="mobile-menu">
                        <li>
                            <a href="{{ url('/shop') }}"> <i class="w-icon-tshirt2"></i>Fashion </a>
                            <ul>
                                <li>
                                    <a href="#">Women</a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/shop') }}">New Arrivals</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Best Sellers</a>
                                        </li>
                                        <li><a href="{{ url('/shop') }}">Trending</a></li>
                                        <li><a href="{{ url('/shop') }}">Clothing</a></li>
                                        <li><a href="{{ url('/shop') }}">Shoes</a></li>
                                        <li><a href="{{ url('/shop') }}">Bags</a></li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Accessories</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Jewlery & Watches</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Men</a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/shop') }}">New Arrivals</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Best Sellers</a>
                                        </li>
                                        <li><a href="{{ url('/shop') }}">Trending</a></li>
                                        <li><a href="{{ url('/shop') }}">Clothing</a></li>
                                        <li><a href="{{ url('/shop') }}">Shoes</a></li>
                                        <li><a href="{{ url('/shop') }}">Bags</a></li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Accessories</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Jewlery & Watches</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('/shop') }}"> <i class="w-icon-home"></i>Home & Garden </a>
                            <ul>
                                <li>
                                    <a href="#">Bedroom</a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/shop') }}">Beds, Frames & Bases</a>
                                        </li>
                                        <li><a href="{{ url('/shop') }}">Dressers</a></li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Nightstands</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Kid's Beds & Headboards</a>
                                        </li>
                                        <li><a href="{{ url('/shop') }}">Armoires</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Living Room</a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/shop') }}">Coffee Tables</a>
                                        </li>
                                        <li><a href="{{ url('/shop') }}">Chairs</a></li>
                                        <li><a href="{{ url('/shop') }}">Tables</a></li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Futons & Sofa Beds</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Cabinets & Chests</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Office</a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/shop') }}">Office Chairs</a>
                                        </li>
                                        <li><a href="{{ url('/shop') }}">Desks</a></li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Bookcases</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">File Cabinets</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Breakroom Tables</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Kitchen & Dining</a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/shop') }}">Dining Sets</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Kitchen Storage Cabinets</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Bashers Racks</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Dining Chairs</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Dining Room Tables</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Bar Stools</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('/shop') }}"> <i class="w-icon-electronics"></i>Electronics </a>
                            <ul>
                                <li>
                                    <a href="#">Laptops &amp; Computers</a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/shop') }}">Desktop Computers</a>
                                        </li>
                                        <li><a href="{{ url('/shop') }}">Monitors</a></li>
                                        <li><a href="{{ url('/shop') }}">Laptops</a></li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Hard Drives &amp; Storage</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Computer Accessories</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">TV &amp; Video</a>
                                    <ul>
                                        <li><a href="{{ url('/shop') }}">TVs</a></li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Home Audio Speakers</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Projectors</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Media Streaming Devices</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Digital Cameras</a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/shop') }}">Digital SLR Cameras</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Sports & Action Cameras</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Camera Lenses</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Photo Printer</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Digital Memory Cards</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Cell Phones</a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/shop') }}">Carrier Phones</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Unlocked Phones</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Phone & Cellphone Cases</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Cellphone Chargers</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('/shop') }}"> <i class="w-icon-furniture"></i>Furniture </a>
                            <ul>
                                <li>
                                    <a href="#">Furniture</a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/shop') }}">Sofas & Couches</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Armchairs</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Bed Frames</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Beside Tables</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Dressing Tables</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Lighting</a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/shop') }}">Light Bulbs</a>
                                        </li>
                                        <li><a href="{{ url('/shop') }}">Lamps</a></li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Celling Lights</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Wall Lights</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Bathroom Lighting</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Home Accessories</a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/shop') }}">Decorative Accessories</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Candals & Holders</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Home Fragrance</a>
                                        </li>
                                        <li><a href="{{ url('/shop') }}">Mirrors</a></li>
                                        <li><a href="{{ url('/shop') }}">Clocks</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Garden & Outdoors</a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/shop') }}">Garden Furniture</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Lawn Mowers</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Pressure Washers</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">All Garden Tools</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/shop') }}">Outdoor Dining</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('/shop') }}"> <i class="w-icon-heartbeat"></i>Healthy & Beauty </a>
                        </li>
                        <li>
                            <a href="{{ url('/shop') }}"> <i class="w-icon-gift"></i>Gift Ideas </a>
                        </li>
                        <li>
                            <a href="{{ url('/shop') }}"> <i class="w-icon-gamepad"></i>Toy & Games </a>
                        </li>
                        <li>
                            <a href="{{ url('/shop') }}"> <i class="w-icon-ice-cream"></i>Cooking </a>
                        </li>
                        <li>
                            <a href="{{ url('/shop') }}"> <i class="w-icon-ios"></i>Smart Phones </a>
                        </li>
                        <li>
                            <a href="{{ url('/shop') }}"> <i class="w-icon-camera"></i>Cameras & Photo </a>
                        </li>
                        <li>
                            <a href="{{ url('/shop') }}"> <i class="w-icon-ruby"></i>Accessories </a>
                        </li>
                        <li>
                            <a href="{{ url('/shop') }}"
                                class="font-weight-bold text-primary text-uppercase ls-25"> View All
                                Categories<i class="w-icon-angle-right"></i> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Mobile Menu -->

    <!-- Start of Newsletter popup -->
    <div class="newsletter-popup mfp-hide">
        <div class="newsletter-content">
            <h4 class="text-uppercase font-weight-normal ls-25">Get Up to<span class="text-primary">25% Off</span>
            </h4>
            <h2 class="ls-25">Sign up to Zomex</h2>
            <p class="text-light ls-10">Subscribe to the Zomex market newsletter to receive updates on special offers.
            </p>
            <form action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-round">
                <input type="email" class="form-control email font-size-md" name="email" id="email2"
                    placeholder="Your email address" required="" />
                <button class="btn btn-dark" type="submit">SUBMIT</button>
            </form>
            <div class="form-checkbox d-flex align-items-center">
                <input type="checkbox" class="custom-checkbox" id="hide-newsletter-popup"
                    name="hide-newsletter-popup" required="" />
                <label for="hide-newsletter-popup" class="font-size-sm text-light">Don't show this popup
                    again.</label>
            </div>
        </div>
    </div>
    <!-- End of Newsletter popup -->

    <!-- Start of Quick View -->
    <div class="product product-single product-popup">
        <div class="row gutter-lg">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="product-gallery product-gallery-sticky">
                    <div class="swiper-container product-single-swiper swiper-theme nav-inner">
                        <div class="swiper-wrapper row cols-1 gutter-no">
                            <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="{{ url('assets') }}/images/products/popup/1-440x494.jpg"
                                        data-zoom-image="{{ url('assets') }}/images/products/popup/1-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900" />
                                </figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="{{ url('assets') }}/images/products/popup/2-440x494.jpg"
                                        data-zoom-image="{{ url('assets') }}/images/products/popup/2-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900" />
                                </figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="{{ url('assets') }}/images/products/popup/3-440x494.jpg"
                                        data-zoom-image="{{ url('assets') }}/images/products/popup/3-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900" />
                                </figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="{{ url('assets') }}/images/products/popup/4-440x494.jpg"
                                        data-zoom-image="{{ url('assets') }}/images/products/popup/4-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900" />
                                </figure>
                            </div>
                        </div>
                        <button class="swiper-button-next"></button>
                        <button class="swiper-button-prev"></button>
                    </div>
                    <div class="product-thumbs-wrap swiper-container"
                        data-swiper-options="{
                      'navigation': {
                          'nextEl': '.swiper-button-next',
                          'prevEl': '.swiper-button-prev'
                      }
                  }">
                        <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                            <div class="product-thumb swiper-slide">
                                <img src="{{ url('assets') }}/images/products/popup/1-103x116.jpg"
                                    alt="Product Thumb" width="103" height="116" />
                            </div>
                            <div class="product-thumb swiper-slide">
                                <img src="{{ url('assets') }}/images/products/popup/2-103x116.jpg"
                                    alt="Product Thumb" width="103" height="116" />
                            </div>
                            <div class="product-thumb swiper-slide">
                                <img src="{{ url('assets') }}/images/products/popup/3-103x116.jpg"
                                    alt="Product Thumb" width="103" height="116" />
                            </div>
                            <div class="product-thumb swiper-slide">
                                <img src="{{ url('assets') }}/images/products/popup/4-103x116.jpg"
                                    alt="Product Thumb" width="103" height="116" />
                            </div>
                        </div>
                        <button class="swiper-button-next"></button>
                        <button class="swiper-button-prev"></button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 overflow-hidden p-relative">
                <div class="product-details scrollable pl-0">
                    <h2 class="product-title">Electronics Black Wrist Watch</h2>
                    <div class="product-bm-wrapper">
                        <figure class="brand">
                            <img src="{{ url('assets') }}/images/products/brand/brand-1.jpg" alt="Brand"
                                width="102" height="48" />
                        </figure>
                    </div>

                    <hr class="product-divider" />

                    <div class="pd-details-info-top">
                        <div class="product-price">
                            <ins class="new-price">$40.00</ins>
                            <del class="old-price">$79.00</del>
                        </div>

                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: 80%"></span>
                                <span class="tooltiptext tooltip-top">4.00</span>
                            </div>
                            <a href="#product-tab-reviews" class="rating-reviews scroll-to">(3 Reviews)</a>
                        </div>

                        <div class="product-link-wrapper pd-wishlist-btn d-flex">
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                        </div>
                    </div>

                    <hr class="product-divider" />

                    <div class="product-form product-variation-form product-color-swatch">
                        <label>Color:</label>
                        <div class="d-flex align-items-center product-variations">
                            <a href="#" class="color" style="background-color: #ffcc01"></a>
                            <a href="#" class="color" style="background-color: #ca6d00"></a>
                            <a href="#" class="color" style="background-color: #1c93cb"></a>
                            <a href="#" class="color" style="background-color: #ccc"></a>
                            <a href="#" class="color" style="background-color: #333"></a>
                        </div>
                    </div>
                    <div class="product-form product-variation-form product-size-swatch">
                        <label class="mb-1">Size:</label>
                        <div class="flex-wrap d-flex align-items-center product-variations">
                            <a href="#" class="size">Small</a>
                            <a href="#" class="size">Medium</a>
                            <a href="#" class="size">Large</a>
                            <a href="#" class="size">Extra Large</a>
                        </div>
                        <a href="#" class="product-variation-clean">Clean All</a>
                    </div>

                    <div class="product-variation-price">
                        <span></span>
                    </div>

                    <div class="product-form">
                        <div class="product-qty-form">
                            <div class="input-group">
                                <input class="quantity form-control" type="number" min="1" max="10000000" />
                                <button class="quantity-plus w-icon-plus"></button>
                                <button class="quantity-minus w-icon-minus"></button>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-buy-now">
                            <span>Buy Now</span>
                        </button>
                        <button class="btn btn-primary btn-cart">
                            <i class="w-icon-cart"></i>
                            <span>Add to Cart</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Quick view -->

    <!-- Plugin JS File -->
    <script src="{{ url('assets') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ url('assets') }}/vendor/jquery.plugin/jquery.plugin.min.js"></script>
    <script src="{{ url('assets') }}/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ url('assets') }}/vendor/zoom/jquery.zoom.js"></script>
    <script src="{{ url('assets') }}/vendor/jquery.countdown/jquery.countdown.min.js"></script>
    <script src="{{ url('assets') }}/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="{{ url('assets') }}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ url('assets') }}/vendor/skrollr/skrollr.min.js"></script>
    <script src="{{ url('assets') }}/js/main.js"></script>

    <script>

        function renderLazyImage() {
            var lazyloadImages;
            if ("IntersectionObserver" in window) {
                lazyloadImages = document.querySelectorAll(".lazy");
                var imageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            var image = entry.target;
                            image.src = image.dataset.src;
                            image.classList.remove("lazy");
                            imageObserver.unobserve(image);
                        }
                    });
                });

                lazyloadImages.forEach(function(image) {
                    imageObserver.observe(image);
                });
            } else {
                var lazyloadThrottleTimeout;
                lazyloadImages = document.querySelectorAll(".lazy");

                function lazyload() {
                    if (lazyloadThrottleTimeout) {
                        clearTimeout(lazyloadThrottleTimeout);
                    }

                    lazyloadThrottleTimeout = setTimeout(function() {
                        var scrollTop = window.pageYOffset;
                        lazyloadImages.forEach(function(img) {
                            if (img.offsetTop < (window.innerHeight + scrollTop)) {
                                img.src = img.dataset.src;
                                img.classList.remove('lazy');
                            }
                        });
                        if (lazyloadImages.length == 0) {
                            document.removeEventListener("scroll", lazyload);
                            window.removeEventListener("resize", lazyload);
                            window.removeEventListener("orientationChange", lazyload);
                        }
                    }, 20);
                }

                document.addEventListener("scroll", lazyload);
                window.addEventListener("resize", lazyload);
                window.addEventListener("orientationChange", lazyload);
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            renderLazyImage();
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function liveSearchProduct(){

            var searchKeyword = $("#search_keyword").val();

            if(searchKeyword && searchKeyword != '' && searchKeyword != null){
                var formData = new FormData();
                formData.append("search_keyword", $("#search_keyword").val());

                $.ajax({
                    data: formData,
                    url: "{{ url('product/live/search') }}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('.live_search_box').removeClass('d-none');
                        $('.live_search_box').html(data.searchResults);
                        renderLazyImage();
                    },
                    error: function(data) {
                        toastr.options.positionClass = 'toast-bottom-right';
                        toastr.options.timeOut = 1000;
                        toastr.error("Something Went Wrong");
                    }
                });
            } else {
                $('.live_search_box').addClass('d-none');
            }

        }
    </script>

    @yield('footer_js')

    {!! $generalInfo->footer_script !!}

    <script src="{{ url('assets') }}/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

</body>

</html>
