@extends('master')

@push('site-seo')
    @php
        $generalInfo = DB::table('general_infos')
            ->select(
                'meta_title',
                'meta_og_title',
                'meta_keywords',
                'meta_description',
                'meta_og_description',
                'meta_og_image',
                'company_name',
                'email',
                'fav_icon',
            )
            ->where('id', 1)
            ->first();
    @endphp

    <meta name="keywords" content="{{ $generalInfo ? $generalInfo->meta_keywords : '' }}" />
    <meta name="description" content="{{ $generalInfo ? $generalInfo->meta_description : '' }}" />
    <meta name="author" content="{{ $generalInfo ? $generalInfo->company_name : '' }}" />
    <meta name="copyright" content="{{ $generalInfo ? $generalInfo->company_name : '' }}">
    <meta name="url" content="{{ env('APP_URL') }}">

    <title>
        @if ($generalInfo && $generalInfo->meta_title)
            {{ $generalInfo->meta_title }}
        @else
            {{ $generalInfo->company_name }}
        @endif
    </title>
    @if ($generalInfo && $generalInfo->fav_icon)
        <link rel="icon" href="{{ env('ADMIN_URL') . '/' . $generalInfo->fav_icon }}" type="image/x-icon" />
    @endif

    <!-- Open Graph general (Facebook, Pinterest)-->
    <meta property="og:title"
        content="@if ($generalInfo && $generalInfo->meta_og_title) {{ $generalInfo->meta_og_title }} @else {{ $generalInfo->company_name }} @endif" />
    <meta property="og:type" content="Ecommerce" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta property="og:image" content="{{ env('ADMIN_URL') . '/' . $generalInfo->meta_og_image }}" />
    <meta property="og:site_name" content="{{ $generalInfo ? $generalInfo->company_name : '' }}" />
    <meta property="og:description" content="{{ $generalInfo->meta_og_description }}" />
    <!-- End Open Graph general (Facebook, Pinterest)-->
@endpush

@section('content')
    <!-- Start of Main-->
    <main class="main">
        <section class="intro-section">
            <div class="swiper-container swiper-theme nav-inner pg-inner swiper-nav-lg animation-slider pg-xxl-hide nav-xxl-show nav-hide"
                data-swiper-options="{
                    'slidesPerView': 1,
                    'autoplay': {
                        'delay': 8000,
                        'disableOnInteraction': false
                    }
                }">
                <div class="swiper-wrapper">
                    <div class="swiper-slide banner banner-fixed intro-slide intro-slide1"
                        style="background-image: url({{ url('assets') }}/images/demos/demo1/sliders/slide-1.jpg); background-color: #ebeef2">
                        <div class="container">
                            <figure class="slide-image skrollable slide-animate">
                                <img src="{{ url('assets') }}/images/demos/demo1/sliders/shoes.png" alt="Banner"
                                    data-bottom-top="transform: translateY(10vh);"
                                    data-top-bottom="transform: translateY(-10vh);" width="474" height="397" />
                            </figure>
                        </div>
                        <!-- End of .container -->
                    </div>
                    <!-- End of .intro-slide1 -->

                    <div class="swiper-slide banner banner-fixed intro-slide intro-slide2"
                        style="background-image: url({{ url('assets') }}/images/demos/demo1/sliders/slide-2.jpg); background-color: #ebeef2">
                        <div class="container">
                            <figure class="slide-image skrollable slide-animate"
                                data-animation-options="{
                                    'name': 'fadeInUpShorter',
                                    'duration': '1s'
                                }">
                                <img src="{{ url('assets') }}/images/demos/demo1/sliders/men.png" alt="Banner"
                                    data-bottom-top="transform: translateX(10vh);"
                                    data-top-bottom="transform: translateX(-10vh);" width="480" height="633" />
                            </figure>
                        </div>
                        <!-- End of .container -->
                    </div>
                    <!-- End of .intro-slide2 -->

                    <div class="swiper-slide banner banner-fixed intro-slide intro-slide3"
                        style="background-image: url({{ url('assets') }}/images/demos/demo1/sliders/slide-3.jpg); background-color: #f0f1f2">
                        <div class="container">
                            <figure class="slide-image skrollable slide-animate"
                                data-animation-options="{
                                    'name': 'fadeInDownShorter',
                                    'duration': '1s'
                                }">
                                <img src="{{ url('assets') }}/images/demos/demo1/sliders/skate.png" alt="Banner"
                                    data-bottom-top="transform: translateY(10vh);"
                                    data-top-bottom="transform: translateY(-10vh);" width="310" height="444" />
                            </figure>

                            <!-- End of .container -->
                        </div>
                    </div>
                    <!-- End of .intro-slide3 -->
                </div>
                <div class="swiper-pagination"></div>
                <button class="swiper-button-next"></button>
                <button class="swiper-button-prev"></button>
            </div>
            <!-- End of .swiper-container -->
        </section>
        <!-- End of .intro-section -->

        <div class="container">
            <div class="swiper-container appear-animate icon-box-wrapper br-sm mt-6 mb-6"
                data-swiper-options="{
                    'slidesPerView': 1,
                    'loop': false,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 2
                        },
                        '768': {
                            'slidesPerView': 3
                        },
                        '1200': {
                            'slidesPerView': 4
                        }
                    }
                }">
                <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
                    <div class="swiper-slide icon-box icon-box-side icon-box-primary">
                        <span class="icon-box-icon icon-shipping">
                            <i class="w-icon-truck"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title font-weight-bold mb-1">Free Shipping & Returns</h4>
                            <p class="text-default">For all orders over $99</p>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box icon-box-side icon-box-primary">
                        <span class="icon-box-icon icon-payment">
                            <i class="w-icon-bag"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title font-weight-bold mb-1">Secure Payment</h4>
                            <p class="text-default">We ensure secure payment</p>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-money">
                        <span class="icon-box-icon icon-money">
                            <i class="w-icon-money"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title font-weight-bold mb-1">Money Back Guarantee</h4>
                            <p class="text-default">Any back within 30 days</p>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-chat">
                        <span class="icon-box-icon icon-chat">
                            <i class="w-icon-chat"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title font-weight-bold mb-1">Customer Support</h4>
                            <p class="text-default">Call or email us 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Iocn Box Wrapper -->

            <div class="title-link-wrapper mb-3 appear-animate">
                <h2 class="title title-deals mb-1">Flash Sale</h2>
                <div class="product-countdown-container font-size-sm text-dark align-items-center">
                    <label>Offer Ends in: </label>
                    <div class="product-countdown countdown-compact ml-1 font-weight-bold" data-until="+10d"
                        data-relative="true" data-compact="true">10days,00:00:00</div>
                </div>
                <a href="shop-boxed-banner.html" class="font-weight-bold ls-25">View All<i
                        class="w-icon-long-arrow-right"></i></a>
            </div>
            <!-- End of .title-link-wrapper -->

            <div class="swiper-container swiper-theme product-deals-wrapper appear-animate mb-7"
                data-swiper-options="{
            'spaceBetween': 20,
            'slidesPerView': 2,
            'breakpoints': {
                '576': {
                    'slidesPerView': 2
                },
                '768': {
                    'slidesPerView': 3
                },
                '992': {
                    'slidesPerView': 5
                }
            }
        }">
                <div class="swiper-wrapper row cols-lg-5 cols-md-4 cols-2">
                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-1-1.jpg" alt="Product" width="300"
                                        height="338" />
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="Product" width="300"
                                        height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">Women's Comforter</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product" width="300"
                                        height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                    <label class="product-label label-discount">-35%</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">White Valise</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                        class="old-price">৳22,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product" width="300"
                                        height="338" />
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product" width="300"
                                        height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">Brown Leather Shoes</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>

                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 80%"></span>
                                        <span class="tooltiptext tooltip-top">4.00</span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(6 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-4.jpg" alt="Product" width="300"
                                        height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">Portable Flashlight</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                        class="old-price">৳60,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-5.jpg" alt="Product" width="300"
                                        height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">USB Charger</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <!-- End of Product Deals Warpper -->

            <!-- Start of Banner Fashion -->
            <div class="banner banner-fashion appear-animate br-sm mb-9"
                style="background-image: url({{url('assets')}}/images/demos/demo1/banners/4.jpg); background-color: #383839">
                <div class="banner-content align-items-center">
                    <div class="content-left d-flex align-items-center">
                        <div class="banner-price-info font-weight-bolder text-secondary text-uppercase lh-1 ls-25">
                            25
                            <sup class="font-weight-bold">%</sup><sub class="font-weight-bold ls-25">Off</sub>
                        </div>
                        <hr class="banner-divider bg-white mt-0 mb-0 mr-8" />
                    </div>
                    <div class="content-right d-flex align-items-center flex-1 flex-wrap">
                        <div class="banner-info mb-0 mr-auto pr-4">
                            <h3 class="banner-title text-white font-weight-bolder text-uppercase ls-25">For Today's Fashion
                            </h3>
                            <p class="text-white mb-0">
                                Use code
                                <span class="text-dark bg-white font-weight-bold ls-50 pl-1 pr-1 d-inline-block">Black
                                    <strong>12345</strong></span>
                                to get best offer.
                            </p>
                        </div>
                        <a href="shop.html" class="btn btn-white btn-outline btn-rounded btn-icon-right">Shop Now<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- End of Banner Fashion -->

            <!-- Start of category-section top-category -->
            <section class="category-section top-category bg-grey pt-10 pb-10 appear-animate">
                <div class="container pb-2">
                    <h2 class="title justify-content-center pt-1 ls-normal mb-2">Popular Categories</h2>
                    <div class="row cols-lg-6 cols-md-5 cols-sm-3 cols-2">
                        <div class="category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop.html" class="category-media">
                                <img src="{{url('assets')}}/images/demos/demo1/categories/2-1.jpg" alt="Category" width="130"
                                    height="130" />
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Fashion</h4>
                                <a href="shop.html" class="btn btn-primary btn-link btn-underline">Shop Now</a>
                            </div>
                        </div>
                        <div class="category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop.html" class="category-media">
                                <img src="{{url('assets')}}/images/demos/demo1/categories/2-2.jpg" alt="Category" width="130"
                                    height="130" />
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Furniture</h4>
                                <a href="shop.html" class="btn btn-primary btn-link btn-underline">Shop Now</a>
                            </div>
                        </div>
                        <div class="category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop.html" class="category-media">
                                <img src="{{url('assets')}}/images/demos/demo1/categories/2-3.jpg" alt="Category" width="130"
                                    height="130" />
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Shoes</h4>
                                <a href="shop.html" class="btn btn-primary btn-link btn-underline">Shop Now</a>
                            </div>
                        </div>
                        <div class="category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop.html" class="category-media">
                                <img src="{{url('assets')}}/images/demos/demo1/categories/2-4.jpg" alt="Category" width="130"
                                    height="130" />
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Sports</h4>
                                <a href="shop.html" class="btn btn-primary btn-link btn-underline">Shop Now</a>
                            </div>
                        </div>
                        <div class="category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop.html" class="category-media">
                                <img src="{{url('assets')}}/images/demos/demo1/categories/2-5.jpg" alt="Category" width="130"
                                    height="130" />
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Games</h4>
                                <a href="shop.html" class="btn btn-primary btn-link btn-underline">Shop Now</a>
                            </div>
                        </div>
                        <div class="category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop.html" class="category-media">
                                <img src="{{url('assets')}}/images/demos/demo1/categories/2-6.jpg" alt="Category" width="130"
                                    height="130" />
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Computers</h4>
                                <a href="shop.html" class="btn btn-primary btn-link btn-underline">Shop Now</a>
                            </div>
                        </div>
                        <div class="category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop.html" class="category-media">
                                <img src="{{url('assets')}}/images/demos/demo1/categories/2-1.jpg" alt="Category" width="130"
                                    height="130" />
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Fashion</h4>
                                <a href="shop.html" class="btn btn-primary btn-link btn-underline">Shop Now</a>
                            </div>
                        </div>
                        <div class="category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop.html" class="category-media">
                                <img src="{{url('assets')}}/images/demos/demo1/categories/2-2.jpg" alt="Category" width="130"
                                    height="130" />
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Furniture</h4>
                                <a href="shop.html" class="btn btn-primary btn-link btn-underline">Shop Now</a>
                            </div>
                        </div>
                        <div class="category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop.html" class="category-media">
                                <img src="{{url('assets')}}/images/demos/demo1/categories/2-3.jpg" alt="Category" width="130"
                                    height="130" />
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Shoes</h4>
                                <a href="shop.html" class="btn btn-primary btn-link btn-underline">Shop Now</a>
                            </div>
                        </div>
                        <div class="category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop.html" class="category-media">
                                <img src="{{url('assets')}}/images/demos/demo1/categories/2-4.jpg" alt="Category" width="130"
                                    height="130" />
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Sports</h4>
                                <a href="shop.html" class="btn btn-primary btn-link btn-underline">Shop Now</a>
                            </div>
                        </div>
                        <div class="category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop.html" class="category-media">
                                <img src="{{url('assets')}}/images/demos/demo1/categories/2-5.jpg" alt="Category" width="130"
                                    height="130" />
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Games</h4>
                                <a href="shop.html" class="btn btn-primary btn-link btn-underline">Shop Now</a>
                            </div>
                        </div>
                        <div class="category category-classic category-absolute overlay-zoom br-xs">
                            <a href="shop.html" class="category-media">
                                <img src="{{url('assets')}}/images/demos/demo1/categories/2-6.jpg" alt="Category" width="130"
                                    height="130" />
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">Computers</h4>
                                <a href="shop.html" class="btn btn-primary btn-link btn-underline">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End of category-section top-category -->

            <!-- Start Most Popular Area -->
            <section class="most-popular-product mt-9">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-8 col-12">
                        <h2 class="title justify-content-center ls-normal mb-4">Most Popular</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="most-popular-grid">
                            <div id="mp-item-0">
                                <a href="#" class="mp-product text-center">
                                    <div class="mp-product-img">
                                        <img src="{{url('assets')}}/images/popular-product/1.png" alt="product" />
                                    </div>
                                    <div class="mp-product-info">
                                        <h4>Hdmi Cable</h4>
                                        <p>183,666 <span>Products</span></p>
                                    </div>
                                </a>
                            </div>
                            <div id="mp-item-1">
                                <a href="#" class="mp-product d-flex">
                                    <div class="mp-product-img">
                                        <img src="{{url('assets')}}/images/popular-product/2.png" alt="product" />
                                    </div>
                                    <div class="mp-product-info">
                                        <h4>Coach Bag</h4>
                                        <p>4,720<span>Products</span></p>
                                    </div>
                                </a>
                            </div>
                            <div id="mp-item-2">
                                <a href="#" class="mp-product d-flex">
                                    <div class="mp-product-img">
                                        <img src="{{url('assets')}}/images/popular-product/3.png" alt="product" />
                                    </div>
                                    <div class="mp-product-info">
                                        <h4>Fossil Watch</h4>
                                        <p>6,419 <span>Products</span></p>
                                    </div>
                                </a>
                            </div>
                            <div id="mp-item-3">
                                <a href="#" class="mp-product d-flex">
                                    <div class="mp-product-img">
                                        <img src="{{url('assets')}}/images/popular-product/4.png" alt="product" />
                                    </div>
                                    <div class="mp-product-info">
                                        <h4>Sony Wh1000xm3</h4>
                                        <p>16,415 <span>Products</span></p>
                                    </div>
                                </a>
                            </div>
                            <div id="mp-item-4">
                                <a href="#" class="mp-product d-flex">
                                    <div class="mp-product-img">
                                        <img src="{{url('assets')}}/images/popular-product/5.png" alt="product" />
                                    </div>
                                    <div class="mp-product-info">
                                        <h4>LED Light</h4>
                                        <p>997612 <span>Products</span></p>
                                    </div>
                                </a>
                            </div>
                            <div id="mp-item-5">
                                <a href="#" class="mp-product text-center">
                                    <div class="mp-product-img">
                                        <img src="{{url('assets')}}/images/popular-product/6.png" alt="product" />
                                    </div>
                                    <div class="mp-product-info">
                                        <h4>Weighing Scale</h4>
                                        <p>22,666 <span>Products</span></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Most Popular Area -->

            <div class="row category-banner-wrapper appear-animate pt-8">
                <div class="col-md-6 mb-4">
                    <div class="banner banner-fixed br-xs">
                        <figure>
                            <img src="{{url('assets')}}/images/demos/demo1/categories/1-1.jpg" alt="Category Banner" width="610"
                                height="160" style="background-color: #ecedec" />
                        </figure>
                        <div class="banner-content y-50 mt-0">
                            <h5 class="banner-subtitle font-weight-normal text-dark">
                                Get up to
                                <span class="text-secondary font-weight-bolder text-uppercase ls-25">20% Off</span>
                            </h5>
                            <h3 class="banner-title text-uppercase">Sports Outfits<br /><span
                                    class="font-weight-normal text-capitalize">Collection</span></h3>
                            <div class="banner-price-info font-weight-normal">
                                Starting at
                                <span class="text-secondary font-weight-bolder">$170.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="banner banner-fixed br-xs">
                        <figure>
                            <img src="{{url('assets')}}/images/demos/demo1/categories/1-2.jpg" alt="Category Banner" width="610"
                                height="160" style="background-color: #636363" />
                        </figure>
                        <div class="banner-content y-50 mt-0">
                            <h5 class="banner-subtitle font-weight-normal text-capitalize">New Arrivals</h5>
                            <h3 class="banner-title text-white text-uppercase">Accessories<br /><span
                                    class="font-weight-normal text-capitalize">Collection</span></h3>
                            <div class="banner-price-info text-white font-weight-normal text-capitalize">
                                Only From
                                <span class="text-secondary font-weight-bolder">$90.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Category Banner Wrapper -->

            <!-- Start of Brands Wrapper -->
            <h2 class="title title-underline mt-9 mb-4 ls-normal appear-animate">Our Clients</h2>
            <div class="brands-wrapper mb-9 appear-animate">
                <div class="row gutter-no cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                    <div class="brand-col">
                        <figure class="brand-wrapper">
                            <img src="{{url('assets')}}/images/demos/demo1/brands/1.png" alt="Brand" width="410"
                                height="186" />
                        </figure>
                        <figure class="brand-wrapper">
                            <img src="{{url('assets')}}/images/demos/demo1/brands/2.png" alt="Brand" width="410"
                                height="186" />
                        </figure>
                    </div>
                    <div class="brand-col">
                        <figure class="brand-wrapper">
                            <img src="{{url('assets')}}/images/demos/demo1/brands/3.png" alt="Brand" width="410"
                                height="186" />
                        </figure>
                        <figure class="brand-wrapper">
                            <img src="{{url('assets')}}/images/demos/demo1/brands/4.png" alt="Brand" width="410"
                                height="186" />
                        </figure>
                    </div>
                    <div class="brand-col">
                        <figure class="brand-wrapper">
                            <img src="{{url('assets')}}/images/demos/demo1/brands/5.png" alt="Brand" width="410"
                                height="186" />
                        </figure>
                        <figure class="brand-wrapper">
                            <img src="{{url('assets')}}/images/demos/demo1/brands/6.png" alt="Brand" width="410"
                                height="186" />
                        </figure>
                    </div>
                    <div class="brand-col">
                        <figure class="brand-wrapper">
                            <img src="{{url('assets')}}/images/demos/demo1/brands/7.png" alt="Brand" width="410"
                                height="186" />
                        </figure>
                        <figure class="brand-wrapper">
                            <img src="{{url('assets')}}/images/demos/demo1/brands/8.png" alt="Brand" width="410"
                                height="186" />
                        </figure>
                    </div>
                    <div class="brand-col">
                        <figure class="brand-wrapper">
                            <img src="{{url('assets')}}/images/demos/demo1/brands/9.png" alt="Brand" width="410"
                                height="186" />
                        </figure>
                        <figure class="brand-wrapper">
                            <img src="{{url('assets')}}/images/demos/demo1/brands/10.png" alt="Brand" width="410"
                                height="186" />
                        </figure>
                    </div>
                    <div class="brand-col">
                        <figure class="brand-wrapper">
                            <img src="{{url('assets')}}/images/demos/demo1/brands/11.png" alt="Brand" width="410"
                                height="186" />
                        </figure>
                        <figure class="brand-wrapper">
                            <img src="{{url('assets')}}/images/demos/demo1/brands/12.png" alt="Brand" width="410"
                                height="186" />
                        </figure>
                    </div>
                </div>
            </div>
            <!-- End of Brands Wrapper -->

            <!-- Start Vendor Section -->
            <section class="info-head-section mb-10 mb-lg-7">
                <h2 class="title title-left mb-5" style="margin-top: 2px">Zommerce Mall</h2>
                <div class="show-code-action">
                    <div class="row cols-lg-3 cols-sm-2 cols-1">
                        <!-- End of Vendor widget 1 -->
                        <div class="vendor-widget">
                            <div class="vendor-widget-2">
                                <div class="vendor-details">
                                    <figure class="vendor-logo">
                                        <a href="vendor-shop-details.html">
                                            <img src="{{url('assets')}}/images/vendor/brand/1.jpg" alt="Vendor Logo" width="80"
                                                height="80" />
                                        </a>
                                    </figure>
                                    <div class="vendor-personal">
                                        <h4 class="vendor-name">
                                            <a href="vendor-shop-details.html">OAIO Store</a>
                                        </h4>
                                        <span class="vendor-product-count">(27 Products)</span>
                                        <p class="vendor-location">Dhaka</p>
                                        <a href="vendor-shop-details.html" class="btn btn-primary btn-icon-right"> Visit
                                            Store<i class="w-icon-long-arrow-right"></i> </a>
                                    </div>
                                </div>
                                <div class="vendor-products row cols-3 gutter-sm">
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/1.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/2.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/3.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Vendor widget 2 -->
                        <div class="vendor-widget">
                            <div class="vendor-widget-2">
                                <div class="vendor-details">
                                    <figure class="vendor-logo">
                                        <a href="vendor-shop-details.html">
                                            <img src="{{url('assets')}}/images/vendor/brand/2.jpg" alt="Vendor Logo" width="80"
                                                height="80" />
                                        </a>
                                    </figure>
                                    <div class="vendor-personal">
                                        <h4 class="vendor-name">
                                            <a href="vendor-shop-details.html">Trident Store</a>
                                        </h4>
                                        <span class="vendor-product-count">(11 Products)</span>
                                        <p class="vendor-location">Badda,Dhaka</p>
                                        <a href="vendor-shop-details.html" class="btn btn-primary btn-icon-right"> Visit
                                            Store<i class="w-icon-long-arrow-right"></i> </a>
                                    </div>
                                </div>
                                <div class="vendor-products row cols-3 gutter-sm">
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/4.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/5.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/6.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Vendor widget 3 -->
                        <div class="vendor-widget">
                            <div class="vendor-widget-2">
                                <div class="vendor-details">
                                    <figure class="vendor-logo">
                                        <a href="vendor-shop-details.html">
                                            <img src="{{url('assets')}}/images/vendor/brand/3.jpg" alt="Vendor Logo" width="80"
                                                height="80" />
                                        </a>
                                    </figure>
                                    <div class="vendor-personal">
                                        <h4 class="vendor-name">
                                            <a href="vendor-shop-details.html">Pam Store</a>
                                        </h4>
                                        <span class="vendor-product-count">(16 Products)</span>
                                        <p class="vendor-location">Gulshan,Dhaka</p>
                                        <a href="vendor-shop-details.html" class="btn btn-primary btn-icon-right"> Visit
                                            Store<i class="w-icon-long-arrow-right"></i> </a>
                                    </div>
                                </div>
                                <div class="vendor-products row cols-3 gutter-sm">
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/7.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/8.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/9.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Vendor widget 4 -->
                        <div class="vendor-widget">
                            <div class="vendor-widget-2">
                                <div class="vendor-details">
                                    <figure class="vendor-logo">
                                        <a href="vendor-shop-details.html">
                                            <img src="{{url('assets')}}/images/vendor/brand/1.jpg" alt="Vendor Logo" width="80"
                                                height="80" />
                                        </a>
                                    </figure>
                                    <div class="vendor-personal">
                                        <h4 class="vendor-name">
                                            <a href="vendor-shop-details.html">OAIO Store</a>
                                        </h4>
                                        <span class="vendor-product-count">(27 Products)</span>
                                        <p class="vendor-location">Mirpur,Dhaka</p>
                                        <a href="vendor-shop-details.html" class="btn btn-primary btn-icon-right"> Visit
                                            Store<i class="w-icon-long-arrow-right"></i> </a>
                                    </div>
                                </div>
                                <div class="vendor-products row cols-3 gutter-sm">
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/1.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/2.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/3.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Vendor widget 5 -->
                        <div class="vendor-widget">
                            <div class="vendor-widget-2">
                                <div class="vendor-details">
                                    <figure class="vendor-logo">
                                        <a href="vendor-shop-details.html">
                                            <img src="{{url('assets')}}/images/vendor/brand/2.jpg" alt="Vendor Logo" width="80"
                                                height="80" />
                                        </a>
                                    </figure>
                                    <div class="vendor-personal">
                                        <h4 class="vendor-name">
                                            <a href="vendor-shop-details.html">Trident Store</a>
                                        </h4>
                                        <span class="vendor-product-count">(11 Products)</span>
                                        <p class="vendor-location">Fatullah</p>
                                        <a href="vendor-shop-details.html" class="btn btn-primary btn-icon-right"> Visit
                                            Store<i class="w-icon-long-arrow-right"></i> </a>
                                    </div>
                                </div>
                                <div class="vendor-products row cols-3 gutter-sm">
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/4.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/5.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/6.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Vendor widget 6 -->
                        <div class="vendor-widget">
                            <div class="vendor-widget-2">
                                <div class="vendor-details">
                                    <figure class="vendor-logo">
                                        <a href="vendor-shop-details.html">
                                            <img src="{{url('assets')}}/images/vendor/brand/3.jpg" alt="Vendor Logo" width="80"
                                                height="80" />
                                        </a>
                                    </figure>
                                    <div class="vendor-personal">
                                        <h4 class="vendor-name">
                                            <a href="vendor-shop-details.html">Pam Store</a>
                                        </h4>
                                        <span class="vendor-product-count">(16 Products)</span>
                                        <p class="vendor-location">Narayangang</p>
                                        <a href="vendor-shop-details.html" class="btn btn-primary btn-icon-right"> Visit
                                            Store<i class="w-icon-long-arrow-right"></i> </a>
                                    </div>
                                </div>
                                <div class="vendor-products row cols-3 gutter-sm">
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/7.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/8.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="vendor-product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/vendor/element/product/9.jpg" alt="Vendor Product"
                                                    width="300" height="338" />
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Vendor Section -->

            <div class="tab tab-with-title tab-nav-boxed appear-animate">
                <h2 class="title">Special Offer</h2>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab-1">New Arrivals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-2">Best Seller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-3">Most Popular</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-4">View All</a>
                    </li>
                </ul>
            </div>
            <!-- End of Tab Title-->
            <div class="tab-content appear-animate">
                <div class="tab-pane active" id="tab-1">
                    <div class="row grid-type products">
                        <div class="product-wrap lg-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                        <label class="product-label label-discount">-35%</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">White Valise</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                            class="old-price">৳22,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                            width="300" height="338" />
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">Brown Leather Shoes</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(6 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-4.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">Portable Flashlight</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                            class="old-price">৳60,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-5.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">USB Charger</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-1-1.jpg" alt="Product"
                                            width="300" height="338" />
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">Women's Comforter</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                        <label class="product-label label-discount">-35%</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">White Valise</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                            class="old-price">৳22,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                            width="300" height="338" />
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">Brown Leather Shoes</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(6 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-2">
                    <div class="row grid-type products">
                        <div class="product-wrap lg-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                        <label class="product-label label-discount">-35%</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">White Valise</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                            class="old-price">৳22,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                            width="300" height="338" />
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">Brown Leather Shoes</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(6 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-4.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">Portable Flashlight</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                            class="old-price">৳60,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-5.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">USB Charger</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-1-1.jpg" alt="Product"
                                            width="300" height="338" />
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">Women's Comforter</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                        <label class="product-label label-discount">-35%</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">White Valise</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                            class="old-price">৳22,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                            width="300" height="338" />
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">Brown Leather Shoes</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(6 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-3">
                    <div class="row grid-type products">
                        <div class="product-wrap lg-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                        <label class="product-label label-discount">-35%</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">White Valise</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                            class="old-price">৳22,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                            width="300" height="338" />
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">Brown Leather Shoes</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(6 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-4.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">Portable Flashlight</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                            class="old-price">৳60,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-5.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">USB Charger</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-1-1.jpg" alt="Product"
                                            width="300" height="338" />
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">Women's Comforter</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                        <label class="product-label label-discount">-35%</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">White Valise</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                            class="old-price">৳22,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                            width="300" height="338" />
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">Brown Leather Shoes</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(6 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-4">
                    <div class="row grid-type products">
                        <div class="product-wrap lg-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                        <label class="product-label label-discount">-35%</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">White Valise</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                            class="old-price">৳22,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                            width="300" height="338" />
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">Brown Leather Shoes</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(6 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-4.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">Portable Flashlight</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                            class="old-price">৳60,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-5.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">USB Charger</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-1-1.jpg" alt="Product"
                                            width="300" height="338" />
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">Women's Comforter</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                        <label class="product-label label-discount">-35%</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">White Valise</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                            class="old-price">৳22,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-details.html">
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                            width="300" height="338" />
                                        <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">New</label>
                                    </div>
                                    <div class="product-label-fixed">
                                        <label>Zomex <span>Choice</span></label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name">
                                        <a href="product-details.html">Brown Leather Shoes</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                        <a href="product-details.html" class="rating-reviews">(6 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Tab Content -->
        </div>

        <!-- Start Banner Area -->
        <div class="intro-banner appear-animate">
            <div class="container">
                <div class="row cols-lg-3 cols-sm-2 cols-1">
                    <figure class="banner banner-fixed br-sm">
                        <img src="{{url('assets')}}/images/demos/demo3/categories/1.jpg" alt="Category Banner" width="400"
                            height="200" style="background-color: #3c3c3c" />
                        <div class="banner-content y-50">
                            <h5 class="banner-subtitle text-primary text-uppercase font-weight-bold ls-25">Top Products
                            </h5>
                            <h3 class="banner-title text-white font-weight-bold">Tranding NIKE<br />Sneaker</h3>
                            <a href="shop.html" class="btn btn-white btn-link btn-underline btn-icon-right"> Shop Now<i
                                    class="w-icon-long-arrow-right"></i> </a>
                        </div>
                    </figure>

                    <figure class="banner banner-fixed br-sm">
                        <img src="{{url('assets')}}/images/demos/demo3/categories/2.jpg" alt="Category Banner" width="400"
                            height="200" style="background-color: #e1e1e1" />
                        <div class="banner-content y-50">
                            <h5 class="banner-subtitle text-primary text-uppercase font-weight-bold ls-25">New Arrivals
                            </h5>
                            <h3 class="banner-title ls-25">Vegan Friendly<br />Makeup</h3>
                            <a href="shop.html" class="btn btn-dark btn-link btn-underline btn-icon-right"> Shop Now<i
                                    class="w-icon-long-arrow-right"></i> </a>
                        </div>
                    </figure>
                    <figure class="banner banner-fixed br-sm">
                        <img src="{{url('assets')}}/images/demos/demo3/categories/3.jpg" alt="Category Banner" width="400"
                            height="200" style="background-color: #57585d" />
                        <div class="banner-content y-50">
                            <h5 class="banner-subtitle text-primary text-uppercase font-weight-bold ls-25">Best Seller
                            </h5>
                            <h3 class="banner-title text-white font-weight-bold ls-15">Fashion Apple<br />Accessories</h3>
                            <a href="shop.html" class="btn btn-white btn-link btn-underline btn-icon-right"> Shop Now<i
                                    class="w-icon-long-arrow-right"></i> </a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
        <!-- End Banner Area -->

        <!-- Start Product Slider Area -->
        <div class="container">
            <div class="title-link-wrapper mb-3 appear-animate">
                <h2 class="title title-deals mb-1">Men Collection</h2>
                <a href="shop-boxed-banner.html" class="font-weight-bold ls-25">View All<i
                        class="w-icon-long-arrow-right"></i></a>
            </div>
            <!-- End of .title-link-wrapper -->

            <div class="swiper-container swiper-theme product-deals-wrapper appear-animate mb-7"
                data-swiper-options="{
            'spaceBetween': 20,
            'slidesPerView': 2,
            'breakpoints': {
                '576': {
                    'slidesPerView': 2
                },
                '768': {
                    'slidesPerView': 3
                },
                '992': {
                    'slidesPerView': 5
                }
            }
        }">
                <div class="swiper-wrapper row cols-lg-5 cols-md-4 cols-2">
                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-1-1.jpg" alt="Product"
                                        width="300" height="338" />
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="Product"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">Women's Comforter</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                    <label class="product-label label-discount">-35%</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">White Valise</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                        class="old-price">৳22,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                        width="300" height="338" />
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">Brown Leather Shoes</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>

                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 80%"></span>
                                        <span class="tooltiptext tooltip-top">4.00</span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(6 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-4.jpg" alt="Product"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">Portable Flashlight</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                        class="old-price">৳60,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-5.jpg" alt="Product"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">USB Charger</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-1-1.jpg" alt="Product"
                                        width="300" height="338" />
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="Product"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">Women's Comforter</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <!-- End of Product Deals Warpper -->
        </div>
        <!-- End Product Slider Area -->

        <!-- Start Product Slider Area -->
        <div class="product-wrapper-1 appear-animate mb-5">
            <div class="container">
                <div class="title-link-wrapper pb-1 mb-4">
                    <h2 class="title ls-normal mb-0">Women Collection</h2>
                    <a href="shop-boxed-banner.html" class="font-size-normal font-weight-bold ls-25 mb-0">More
                        Products<i class="w-icon-long-arrow-right"></i></a>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-4 mb-4">
                        <div class="banner h-100 br-sm"
                            style="background-image: url({{url('assets')}}/images/demos/demo1/banners/2.jpg); background-color: #ebeced">
                            <div class="banner-content content-top">
                                <h5 class="banner-subtitle font-weight-normal mb-2">Weekend Sale</h5>
                                <hr class="banner-divider bg-dark mb-2" />
                                <h3 class="banner-title font-weight-bolder ls-25 text-uppercase">
                                    New Arrivals<br />
                                    <span class="font-weight-normal text-capitalize">Collection</span>
                                </h3>
                                <a href="shop.html" class="btn btn-dark btn-outline btn-rounded btn-sm">shop Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- End of Banner -->
                    <div class="col-lg-9 col-sm-8">
                        <div class="swiper-container swiper-theme"
                            data-swiper-options="{
                        'spaceBetween': 20,
                        'slidesPerView': 2,
                        'breakpoints': {
                            '992': {
                                'slidesPerView': 3
                            },
                            '1200': {
                                'slidesPerView': 4
                            }
                        }
                    }">
                            <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                                <div class="swiper-slide product-col">
                                    <div class="product-wrap product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/demos/demo2/products/1-1-1.jpg" alt="Product"
                                                    width="300" height="338" />
                                                <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="Product"
                                                    width="300" height="338" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quickview"></a>
                                            </div>
                                            <div class="product-label-group">
                                                <label class="product-label label-new">New</label>
                                            </div>
                                            <div class="product-label-fixed">
                                                <label>Zomex <span>Choice</span></label>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-details.html">Women's Comforter</a>
                                            </h4>
                                            <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                                    class="old-price">৳11,000</del></div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                                <span class="sold-item">Sold (1530)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrap product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/demos/demo2/products/1-5.jpg" alt="Product"
                                                    width="300" height="338" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quickview"></a>
                                            </div>
                                            <div class="product-label-group">
                                                <label class="product-label label-new">New</label>
                                            </div>
                                            <div class="product-label-fixed">
                                                <label>Zomex <span>Choice</span></label>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-details.html">USB Charger</a>
                                            </h4>
                                            <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                                    class="old-price">৳11,000</del></div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                                <span class="sold-item">Sold (1530)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product-col">
                                    <div class="product-wrap product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product"
                                                    width="300" height="338" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quickview"></a>
                                            </div>
                                            <div class="product-label-group">
                                                <label class="product-label label-new">New</label>
                                                <label class="product-label label-discount">-35%</label>
                                            </div>
                                            <div class="product-label-fixed">
                                                <label>Zomex <span>Choice</span></label>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-details.html">White Valise</a>
                                            </h4>
                                            <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                                    class="old-price">৳22,000</del></div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                                <span class="sold-item">Sold (1530)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrap product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                                    width="300" height="338" />
                                                <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                                    width="300" height="338" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quickview"></a>
                                            </div>
                                            <div class="product-label-group">
                                                <label class="product-label label-new">New</label>
                                            </div>
                                            <div class="product-label-fixed">
                                                <label>Zomex <span>Choice</span></label>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-details.html">Brown Leather Shoes</a>
                                            </h4>
                                            <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                                    class="old-price">৳11,000</del></div>

                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 80%"></span>
                                                    <span class="tooltiptext tooltip-top">4.00</span>
                                                </div>
                                                <a href="product-details.html" class="rating-reviews">(6 Reviews)</a>
                                                <span class="sold-item">Sold (1530)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product-col">
                                    <div class="product-wrap product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/demos/demo2/products/1-4.jpg" alt="Product"
                                                    width="300" height="338" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quickview"></a>
                                            </div>
                                            <div class="product-label-group">
                                                <label class="product-label label-new">New</label>
                                            </div>
                                            <div class="product-label-fixed">
                                                <label>Zomex <span>Choice</span></label>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-details.html">Portable Flashlight</a>
                                            </h4>
                                            <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                                    class="old-price">৳60,000</del></div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                                <span class="sold-item">Sold (1530)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrap product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/demos/demo2/products/1-5.jpg" alt="Product"
                                                    width="300" height="338" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quickview"></a>
                                            </div>
                                            <div class="product-label-group">
                                                <label class="product-label label-new">New</label>
                                            </div>
                                            <div class="product-label-fixed">
                                                <label>Zomex <span>Choice</span></label>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-details.html">USB Charger</a>
                                            </h4>
                                            <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                                    class="old-price">৳11,000</del></div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                                <span class="sold-item">Sold (1530)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product-col">
                                    <div class="product-wrap product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                                    width="300" height="338" />
                                                <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                                    width="300" height="338" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quickview"></a>
                                            </div>
                                            <div class="product-label-group">
                                                <label class="product-label label-new">New</label>
                                            </div>
                                            <div class="product-label-fixed">
                                                <label>Zomex <span>Choice</span></label>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-details.html">Brown Leather Shoes</a>
                                            </h4>
                                            <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                                    class="old-price">৳11,000</del></div>

                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 80%"></span>
                                                    <span class="tooltiptext tooltip-top">4.00</span>
                                                </div>
                                                <a href="product-details.html" class="rating-reviews">(6 Reviews)</a>
                                                <span class="sold-item">Sold (1530)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrap product">
                                        <figure class="product-media">
                                            <a href="product-details.html">
                                                <img src="{{url('assets')}}/images/demos/demo2/products/1-4.jpg" alt="Product"
                                                    width="300" height="338" />
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Add to wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quickview"></a>
                                            </div>
                                            <div class="product-label-group">
                                                <label class="product-label label-new">New</label>
                                            </div>
                                            <div class="product-label-fixed">
                                                <label>Zomex <span>Choice</span></label>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-details.html">Portable Flashlight</a>
                                            </h4>
                                            <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                                    class="old-price">৳60,000</del></div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                                <span class="sold-item">Sold (1530)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Product Wrapper 1 -->

        <!-- Start Product Slider Area -->
        <div class="container">
            <div class="title-link-wrapper mb-3 appear-animate">
                <h2 class="title title-deals mb-1">For You</h2>
                <a href="shop-boxed-banner.html" class="font-weight-bold ls-25">View All<i
                        class="w-icon-long-arrow-right"></i></a>
            </div>
            <!-- End of .title-link-wrapper -->

            <div class="product-deals-wrapper appear-animate mb-7">
                <div class="row cols-lg-5 cols-md-4 cols-2">
                    <div class="product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-1-1.jpg" alt="Product"
                                        width="300" height="338" />
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="Product"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">Women's Comforter</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                    <label class="product-label label-discount">-35%</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">White Valise</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                        class="old-price">৳22,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                        width="300" height="338" />
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">Brown Leather Shoes</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>

                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 80%"></span>
                                        <span class="tooltiptext tooltip-top">4.00</span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(6 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-4.jpg" alt="Product"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">Portable Flashlight</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                        class="old-price">৳60,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-5.jpg" alt="Product"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">USB Charger</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-1-1.jpg" alt="Product"
                                        width="300" height="338" />
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="Product"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">Women's Comforter</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                    <label class="product-label label-discount">-35%</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">White Valise</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                        class="old-price">৳22,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                        width="300" height="338" />
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">Brown Leather Shoes</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>

                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 80%"></span>
                                        <span class="tooltiptext tooltip-top">4.00</span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(6 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-4.jpg" alt="Product"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">Portable Flashlight</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                        class="old-price">৳60,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="product-details.html">
                                    <img src="{{url('assets')}}/images/demos/demo2/products/1-5.jpg" alt="Product"
                                        width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                                <div class="product-label-fixed">
                                    <label>Zomex <span>Choice</span></label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="product-details.html">USB Charger</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-details.html" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product Slider Area -->
    </main>
    <!-- End of Main -->

    {{-- <div class="container mt-10 pt-2">

        @php $flagLoop = 0; @endphp
        @foreach ($featuredFlags as $featuredFlag)
            @if ($flagLoop > 0)
                @include('homepage_sections.flag_wise_products')
            @endif
            @php $flagLoop++ @endphp
        @endforeach

        @include('homepage_sections.bottom_banner')
        @include('homepage_sections.recommended')
        @include('homepage_sections.top_brands')
        @include('homepage_sections.blogs')

    </div> --}}
@endsection

{{-- @section('footer_js')
    <script>
        var finishedFetchProducts = 0;

        function loadMoreProducts() {

            $("#load_more_btn").html("Loading...");

            // fetching product start
            if (finishedFetchProducts == 0) {
                var formData = new FormData();
                formData.append("product_fetch_skip", Number($(".recommended_product_section").children("div").length));

                $.ajax({
                    data: formData,
                    url: "{{ url('fetch/more/products') }}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $("#load_more_btn").html("Load More");
                        if (Number(data.fetched_products) > 0) {
                            $(".recommended_product_section").append(data.more_products);
                            renderLazyImage();
                        } else {
                            finishedFetchProducts = 1
                        }

                        if (Number(data.total_products) == Number($(".recommended_product_section").children("div").length)) {
                            $("#load_more_btn").hide();
                        }
                    },
                    error: function(data) {
                        $("#load_more_btn").html("Try Again");
                        console.log('Error:', data);
                        toastr.options.positionClass = 'toast-bottom-right';
                        toastr.options.timeOut = 1000;
                        toastr.error("Something Went Wrong");
                    }
                });
            }
            // fetching product end

        }
    </script>
@endsection --}}
