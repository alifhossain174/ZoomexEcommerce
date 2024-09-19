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

        @include('homepage_sections.sliders')

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
                    {{-- loop start --}}
                    <div class="swiper-slide product-wrap">
                        @include('single_product.product')
                    </div>
                    {{-- loop end --}}
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <!-- End of Product Deals Warpper -->

            <!-- Start of Banner Fashion -->
            {{-- Top Banner --}}
                @include('homepage_sections.top_banner')
            {{-- End Top Banner --}}
            <!-- End of Banner Fashion -->

            <!-- Start of category-section top-category -->
            {{-- Featured Categories --}}
                @include('homepage_sections.featured_categories')
            {{-- End Featured Categories --}}
            <!-- End of category-section top-category -->

            <!-- Start Most Popular Area -->
            @include('homepage_sections.most_popular')
            <!-- End Most Popular Area -->

            <!-- Start Middle Category Banner Area -->
            @include('homepage_sections.middle_category_banner')
            <!-- End Middle Category Banner Area -->

            <!-- End of Category Banner Wrapper -->

            <!-- Start of Brands Wrapper -->
            <h2 class="title title-underline mt-9 mb-4 ls-normal appear-animate">Our Clients</h2>
            <div class="brands-wrapper mb-9 appear-animate">
                <div class="row gutter-no cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                    {{-- Our Clients loop start --}}
                    @include('homepage_sections.our_clients')
                    {{-- Our Clients loop End --}}
                </div>
            </div>
            <!-- End of Brands Wrapper -->

            <!-- Start Vendor Section -->
            <section class="info-head-section mb-10 mb-lg-7">
                <h2 class="title title-left mb-5" style="margin-top: 2px">Zommerce Mall</h2>
                <div class="show-code-action">
                    <div class="row cols-lg-3 cols-sm-2 cols-1">
                        <!-- End of Vendor widget 1 -->
                        {{-- Vendor loop Start --}}
                        @include('homepage_sections.vendor')
                        {{-- Vendor loop End --}}
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
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">White Valise</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                            class="old-price">৳22,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-1.jpg"
                                            alt="Product" width="300" height="338" />
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">Brown Leather Shoes</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(6 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-4.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">Portable Flashlight</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                            class="old-price">৳60,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-5.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">USB Charger</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-1-1.jpg"
                                            alt="Product" width="300" height="338" />
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-1-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">Women's Comforter</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">White Valise</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                            class="old-price">৳22,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-1.jpg"
                                            alt="Product" width="300" height="338" />
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">Brown Leather Shoes</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(6 Reviews)</a>
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
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">White Valise</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                            class="old-price">৳22,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-1.jpg"
                                            alt="Product" width="300" height="338" />
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">Brown Leather Shoes</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(6 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-4.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">Portable Flashlight</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                            class="old-price">৳60,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-5.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">USB Charger</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-1-1.jpg"
                                            alt="Product" width="300" height="338" />
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-1-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">Women's Comforter</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">White Valise</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                            class="old-price">৳22,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-1.jpg"
                                            alt="Product" width="300" height="338" />
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">Brown Leather Shoes</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(6 Reviews)</a>
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
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">White Valise</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                            class="old-price">৳22,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-1.jpg"
                                            alt="Product" width="300" height="338" />
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">Brown Leather Shoes</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(6 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-4.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">Portable Flashlight</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                            class="old-price">৳60,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-5.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">USB Charger</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-1-1.jpg"
                                            alt="Product" width="300" height="338" />
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-1-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">Women's Comforter</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">White Valise</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                            class="old-price">৳22,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-1.jpg"
                                            alt="Product" width="300" height="338" />
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">Brown Leather Shoes</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(6 Reviews)</a>
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
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">White Valise</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                            class="old-price">৳22,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-1.jpg"
                                            alt="Product" width="300" height="338" />
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">Brown Leather Shoes</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(6 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-4.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">Portable Flashlight</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                            class="old-price">৳60,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-5.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">USB Charger</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-1-1.jpg"
                                            alt="Product" width="300" height="338" />
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-1-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">Women's Comforter</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">White Valise</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                            class="old-price">৳22,000</del></div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                        <span class="sold-item">Sold (1530)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap sm-item">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="{{ url('/product/details') }}">
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-1.jpg"
                                            alt="Product" width="300" height="338" />
                                        <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-2.jpg"
                                            alt="Product" width="300" height="338" />
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
                                        <a href="{{ url('/product/details') }}">Brown Leather Shoes</a>
                                    </h4>
                                    <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                            class="old-price">৳11,000</del></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%"></span>
                                            <span class="tooltiptext tooltip-top">4.00</span>
                                        </div>
                                        <a href="{{ url('/product/details') }}" class="rating-reviews">(6 Reviews)</a>
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
        @include('homepage_sections.bottom_banner')
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
                        {{-- loop start --}}
                        <div class="swiper-slide product-wrap">
                            @include('single_product.product')
                        </div>
                        {{-- loop end --}}
                    </div>

                {{-- <div class="swiper-wrapper row cols-lg-5 cols-md-4 cols-2">
                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="{{ url('/product/details') }}">
                                    <img src="{{ url('assets') }}/images/demos/demo2/products/1-1-1.jpg"
                                        alt="Product" width="300" height="338" />
                                    <img src="{{ url('assets') }}/images/demos/demo2/products/1-1-2.jpg"
                                        alt="Product" width="300" height="338" />
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
                                    <a href="{{ url('/product/details') }}">Women's Comforter</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="{{ url('/product/details') }}">
                                    <img src="{{ url('assets') }}/images/demos/demo2/products/1-2.jpg" alt="Product"
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
                                    <a href="{{ url('/product/details') }}">White Valise</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                        class="old-price">৳22,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="{{ url('/product/details') }}">
                                    <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-1.jpg"
                                        alt="Product" width="300" height="338" />
                                    <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-2.jpg"
                                        alt="Product" width="300" height="338" />
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
                                    <a href="{{ url('/product/details') }}">Brown Leather Shoes</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>

                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 80%"></span>
                                        <span class="tooltiptext tooltip-top">4.00</span>
                                    </div>
                                    <a href="{{ url('/product/details') }}" class="rating-reviews">(6 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="{{ url('/product/details') }}">
                                    <img src="{{ url('assets') }}/images/demos/demo2/products/1-4.jpg" alt="Product"
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
                                    <a href="{{ url('/product/details') }}">Portable Flashlight</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                        class="old-price">৳60,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="{{ url('/product/details') }}">
                                    <img src="{{ url('assets') }}/images/demos/demo2/products/1-5.jpg" alt="Product"
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
                                    <a href="{{ url('/product/details') }}">USB Charger</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide product-wrap">
                        <div class="product">
                            <figure class="product-media">
                                <a href="{{ url('/product/details') }}">
                                    <img src="{{ url('assets') }}/images/demos/demo2/products/1-1-1.jpg"
                                        alt="Product" width="300" height="338" />
                                    <img src="{{ url('assets') }}/images/demos/demo2/products/1-1-2.jpg"
                                        alt="Product" width="300" height="338" />
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
                                    <a href="{{ url('/product/details') }}">Women's Comforter</a>
                                </h4>
                                <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                        class="old-price">৳11,000</del></div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                    <span class="sold-item">Sold (1530)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
                            style="background-image: url({{ url('assets') }}/images/demos/demo1/banners/2.jpg); background-color: #ebeced">
                            <div class="banner-content content-top">
                                <h5 class="banner-subtitle font-weight-normal mb-2">Weekend Sale</h5>
                                <hr class="banner-divider bg-dark mb-2" />
                                <h3 class="banner-title font-weight-bolder ls-25 text-uppercase">
                                    New Arrivals<br />
                                    <span class="font-weight-normal text-capitalize">Collection</span>
                                </h3>
                                <a href="{{ url('/shop') }}" class="btn btn-dark btn-outline btn-rounded btn-sm">shop
                                    Now</a>
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
                                            <a href="{{ url('/product/details') }}">
                                                <img src="{{ url('assets') }}/images/demos/demo2/products/1-1-1.jpg"
                                                    alt="Product" width="300" height="338" />
                                                <img src="{{ url('assets') }}/images/demos/demo2/products/1-1-2.jpg"
                                                    alt="Product" width="300" height="338" />
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
                                                <a href="{{ url('/product/details') }}">Women's Comforter</a>
                                            </h4>
                                            <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                                    class="old-price">৳11,000</del></div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="{{ url('/product/details') }}" class="rating-reviews">(3
                                                    Reviews)</a>
                                                <span class="sold-item">Sold (1530)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrap product">
                                        <figure class="product-media">
                                            <a href="{{ url('/product/details') }}">
                                                <img src="{{ url('assets') }}/images/demos/demo2/products/1-5.jpg"
                                                    alt="Product" width="300" height="338" />
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
                                                <a href="{{ url('/product/details') }}">USB Charger</a>
                                            </h4>
                                            <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                                    class="old-price">৳11,000</del></div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="{{ url('/product/details') }}" class="rating-reviews">(3
                                                    Reviews)</a>
                                                <span class="sold-item">Sold (1530)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product-col">
                                    <div class="product-wrap product">
                                        <figure class="product-media">
                                            <a href="{{ url('/product/details') }}">
                                                <img src="{{ url('assets') }}/images/demos/demo2/products/1-2.jpg"
                                                    alt="Product" width="300" height="338" />
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
                                                <a href="{{ url('/product/details') }}">White Valise</a>
                                            </h4>
                                            <div class="product-price"><ins class="new-price">৳20,000</ins><del
                                                    class="old-price">৳22,000</del></div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="{{ url('/product/details') }}" class="rating-reviews">(3
                                                    Reviews)</a>
                                                <span class="sold-item">Sold (1530)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrap product">
                                        <figure class="product-media">
                                            <a href="{{ url('/product/details') }}">
                                                <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-1.jpg"
                                                    alt="Product" width="300" height="338" />
                                                <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-2.jpg"
                                                    alt="Product" width="300" height="338" />
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
                                                <a href="{{ url('/product/details') }}">Brown Leather Shoes</a>
                                            </h4>
                                            <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                                    class="old-price">৳11,000</del></div>

                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 80%"></span>
                                                    <span class="tooltiptext tooltip-top">4.00</span>
                                                </div>
                                                <a href="{{ url('/product/details') }}" class="rating-reviews">(6
                                                    Reviews)</a>
                                                <span class="sold-item">Sold (1530)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product-col">
                                    <div class="product-wrap product">
                                        <figure class="product-media">
                                            <a href="{{ url('/product/details') }}">
                                                <img src="{{ url('assets') }}/images/demos/demo2/products/1-4.jpg"
                                                    alt="Product" width="300" height="338" />
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
                                                <a href="{{ url('/product/details') }}">Portable Flashlight</a>
                                            </h4>
                                            <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                                    class="old-price">৳60,000</del></div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="{{ url('/product/details') }}" class="rating-reviews">(3
                                                    Reviews)</a>
                                                <span class="sold-item">Sold (1530)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrap product">
                                        <figure class="product-media">
                                            <a href="{{ url('/product/details') }}">
                                                <img src="{{ url('assets') }}/images/demos/demo2/products/1-5.jpg"
                                                    alt="Product" width="300" height="338" />
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
                                                <a href="{{ url('/product/details') }}">USB Charger</a>
                                            </h4>
                                            <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                                    class="old-price">৳11,000</del></div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="{{ url('/product/details') }}" class="rating-reviews">(3
                                                    Reviews)</a>
                                                <span class="sold-item">Sold (1530)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide product-col">
                                    <div class="product-wrap product">
                                        <figure class="product-media">
                                            <a href="{{ url('/product/details') }}">
                                                <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-1.jpg"
                                                    alt="Product" width="300" height="338" />
                                                <img src="{{ url('assets') }}/images/demos/demo2/products/1-3-2.jpg"
                                                    alt="Product" width="300" height="338" />
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
                                                <a href="{{ url('/product/details') }}">Brown Leather Shoes</a>
                                            </h4>
                                            <div class="product-price"><ins class="new-price">৳10.000</ins><del
                                                    class="old-price">৳11,000</del></div>

                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 80%"></span>
                                                    <span class="tooltiptext tooltip-top">4.00</span>
                                                </div>
                                                <a href="{{ url('/product/details') }}" class="rating-reviews">(6
                                                    Reviews)</a>
                                                <span class="sold-item">Sold (1530)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrap product">
                                        <figure class="product-media">
                                            <a href="{{ url('/product/details') }}">
                                                <img src="{{ url('assets') }}/images/demos/demo2/products/1-4.jpg"
                                                    alt="Product" width="300" height="338" />
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
                                                <a href="{{ url('/product/details') }}">Portable Flashlight</a>
                                            </h4>
                                            <div class="product-price"><ins class="new-price">৳56,000</ins><del
                                                    class="old-price">৳60,000</del></div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="{{ url('/product/details') }}" class="rating-reviews">(3
                                                    Reviews)</a>
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

                    {{-- loop start --}}
                    <div class="product-wrap">
                        @include('single_product.product')
                    </div>
                    {{-- loop end --}}

                </div>
            </div>
        </div>
        <!-- End Product Slider Area -->
    </main>
    <!-- End of Main -->

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
