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

    $categories = DB::table('categories')
                    ->select('name', 'id', 'slug', 'show_on_navbar', 'icon', 'banner_image')
                    ->where('status', 1)
                    ->orderBy('serial', 'asc')
                    ->get();
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
    <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/vendor/swiper/swiper-bundle.min.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/css/style.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/css/variable-colors.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/css/toastr.min.css" />

    @yield('header_css')

    <style>
        a{
            text-decoration: none;
        }
        :root {
            --primary-color: {{ $generalInfo->primary_color }} !important;
            --secondary-color: {{ $generalInfo->secondary_color }} !important;
            --title-color: {{ $generalInfo->title_color }};
            --paragraph-color: {{ $generalInfo->paragraph_color }};
            --border-color: {{ $generalInfo->border_color }};
        }

        .subcategory_box{
            width: 50%;
            float: left;
        }

        .subcategory_box hr:first-of-type {
            margin-right: 20px;
        }

        .subcategory_box a.subcategory_box_link{
            padding: 0px;
            margin: 0px;
            line-height: 14px;
            display: inline-block;
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
            @include('headers.top_header')
            @include('headers.middle_header')
            @include('headers.bottom_header')
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
        <a href="{{ url('/mobile/category') }}" class="sticky-link">
            <i class="w-icon-category"></i>
            <p>Category</p>
        </a>
        <a href="{{ url('/home') }}" class="sticky-link">
            <i class="w-icon-account"></i>
            <p>Account</p>
        </a>
        <div class="cart-dropdown dir-up">
            <a href="{{url('view/cart')}}" class="sticky-link">
                <i class="w-icon-cart"></i>
                <p>Cart</p>
            </a>
        </div>

        <div class="header-search hs-toggle dir-up">
            <a href="javascript:void(0)" class="search-toggle sticky-link">
                <i class="w-icon-search"></i>
                <p>Search</p>
            </a>
            <form action="{{ url('search/for/products') }}" method="GET" class="input-wrapper">
                <input type="text" class="form-control" name="search_keyword" autocomplete="off" placeholder="Search" required />
                <button class="btn btn-search btn-search-sticky-footer d-inline-block bg-primary" type="submit">
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
            <form action="{{ url('search/for/products') }}" method="GET" class="input-wrapper">
                <input type="text" class="form-control" name="search_keyword" autocomplete="off" placeholder="Search" required />
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
                            <a href="{{ url('/vendor/shops') }}">Vendor</a>
                        </li>
                        <li>
                            <a href="{{ url('/about') }}">About Us</a>
                        </li>
                        <li>
                            <a href="{{ url('/blogs') }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ url('/contact') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane" id="categories">
                    <ul class="mobile-menu">
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{ url('shop') }}?category={{$category->slug}}">
                                <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{ url(env('ADMIN_URL')."/".$category->icon) }}" style="height: 18px; width: 18px; border-radius: 50%">
                                {{$category->name}}
                            </a>
                            @php
                                $subcategories = DB::table('subcategories')->where('status', 1)->where('category_id', $category->id)->orderBy('serial', 'asc')->get();
                            @endphp

                            @if(count($subcategories) > 0)
                            <ul>
                                @foreach ($subcategories as $subcategory)
                                <li>
                                    <a href="{{ url('shop') }}?category={{$category->slug}}&subcategory={{$subcategory->slug}}">{{$subcategory->name}}</a>

                                    @php
                                        $childcategories = DB::table('child_categories')->where('status', 1)->where('subcategory_id', $subcategory->id)->get();
                                    @endphp

                                    @if(count($childcategories) > 0)
                                    <ul>
                                        @foreach ($childcategories as $childcategory)
                                        <li><a href="{{ url('shop') }}?category={{$category->slug}}&subcategory={{$subcategory->slug}}&childcategory={{$childcategory->slug}}">{{$childcategory->name}}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                            @endif

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Mobile Menu -->

    @include('newsletter')

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
    <script src="{{ url('assets') }}/vendor/sticky/sticky.js"></script>
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

        $(document).ready(function () {
            $('.btn-search-sticky-footer').on('click', function () {
                $(this).closest('form').submit();
            });
        });


        $('body').on('click', '.addToCart', function() {
            var id = $(this).data('id');
            $.get("{{ url('add/to/cart') }}" + '/' + id, function(data) {
                toastr.options.positionClass = 'toast-bottom-right';
                toastr.options.timeOut = 1000;
                toastr.success("Added to Cart");
                $("#dropdown_box_sidebar_cart").html(data.rendered_cart);
                $("span.cart-count").html(data.cartTotalQty);
            })
            $(this).html("<span class='add__to--cart__text'> Remove</span>");
            $(this).removeClass("addToCart");
            $(this).addClass("removeFromCart");
            $(this).blur();
        });

        $('body').on('click', '.sidebar-product-remove', function() {
            var id = $(this).data('id');

            $.get("{{ url('remove/cart/item') }}" + '/' + id, function(data) {
                $("span.cart-count").html(data.cartTotalQty);
                $("#dropdown_box_sidebar_cart").html(data.rendered_cart);
                $("#view_cart_items").html(data.viewCartItems);
                $("#view_cart_calculation").html(data.viewCartCalculation);
                $("#product_details_cart_qty").val(1);
                $("table.cart-single-product-table tbody").html(data.checkoutCartItems);
                $(".order-review-summary").html(data.checkoutTotalAmount);
            })

            $('.cart-' + id).html("<i class='fi fi-rr-shopping-cart product__items--action__btn--svg'></i><span class='add__to--cart__text'> Add to cart</span>");
            $('.cart-' + id).attr('data-id', id).removeClass("removeFromCart");
            $('.cart-' + id).attr('data-id', id).addClass("addToCart");
            $('.cart-' + id).blur();

            $('.cart-qty-' + id).html("<i class='w-icon-cart'></i><span> Add to cart</span>");
            $('.cart-qty-' + id).attr('data-id', id).removeClass("removeFromCartQty");
            $('.cart-qty-' + id).attr('data-id', id).addClass("addToCartWithQty");
            $('.cart-qty-' + id).blur();
        });

        $('body').on('click', '.quantity__value_details', function() {
            var id = $(this).data('id');
            var quantityInput = this.parentElement.querySelector("input");
            var currentQuantity = parseInt(quantityInput.value);

            if (this.classList.contains("decrease")) {
                quantityInput.value = Math.max(currentQuantity - 1, 1);
            } else if (this.classList.contains("increase")) {
                quantityInput.value = currentQuantity + 1;
            }

            var formData = new FormData();
            formData.append("cart_id", id);
            formData.append("cart_qty", quantityInput.value);
            $.ajax({
                data: formData,
                url: "{{ url('update/cart/qty') }}",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#dropdown_box_sidebar_cart").html(data.rendered_cart);
                    $("#view_cart_items").html(data.viewCartItems);
                    $("#view_cart_calculation").html(data.viewCartCalculation);
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });

        });
    </script>

    @yield('footer_js')

    {!! $generalInfo->footer_script !!}

    <script src="{{ url('assets') }}/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

</body>

</html>
