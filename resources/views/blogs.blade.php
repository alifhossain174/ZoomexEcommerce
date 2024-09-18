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
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Classic</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-6">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="{{ url('/blogs') }}">Blog</a></li>
                    <li>Classic</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg mb-10">
                    <div class="main-content">
                        <article class="post post-classic overlay-zoom mb-4">
                            <figure class="post-media br-sm">
                                <a href="{{ url('/blog/details') }}">
                                    <img src="{{ url('assets') }}/images/blog/classic/1.jpg" width="930" height="500"
                                        alt="blog" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Fashion</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="{{ url('/blog/details') }}">New found the men dress for summer</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget
                                        blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at vulputate
                                        volutpat, uctus metus libero eu augue, vitae luctus…</p>
                                    <a href="{{ url('/blog/details') }}" class="btn btn-link btn-primary">(read more)</a>
                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a> -
                                    <a href="#" class="post-date">03.05.2021</a>
                                </div>
                            </div>
                        </article>
                        <article class="post post-classic overlay-zoom mb-4">
                            <figure class="post-media br-sm">
                                <a href="{{ url('/blog/details') }}">
                                    <img src="{{ url('assets') }}/images/blog/classic/2.jpg" width="930" height="500"
                                        alt="blog" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Others</a>,
                                    <a href="#">Technology</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="{{ url('/blog/details') }}">Recognitory the needs is primary condition for
                                        design</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget
                                        blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at vulputate
                                        volutpat, uctus metus libero eu augue, vitae luctus…</p>
                                    <a href="{{ url('/blog/details') }}" class="btn btn-link btn-primary">(read more)</a>
                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a> -
                                    <a href="#" class="post-date">03.05.2021</a>
                                </div>
                            </div>
                        </article>
                        <article class="post post-classic overlay-zoom mb-4">
                            <figure class="post-media br-sm">
                                <a href="{{ url('/blog/details') }}">
                                    <img src="{{ url('assets') }}/images/blog/classic/3.jpg" width="930" height="500"
                                        alt="blog" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Clothes</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="{{ url('/blog/details') }}">New found the women’s shirt for summer season</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget
                                        blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at vulputate
                                        volutpat, uctus metus libero eu augue, vitae luctus…</p>
                                    <a href="{{ url('/blog/details') }}" class="btn btn-link btn-primary">(read more)</a>
                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a> -
                                    <a href="#" class="post-date">03.05.2021</a>
                                </div>
                            </div>
                        </article>
                        <article class="post post-classic overlay-zoom mb-4">
                            <figure class="post-media br-sm">
                                <a href="{{ url('/blog/details') }}">
                                    <img src="{{ url('assets') }}/images/blog/classic/4.jpg" width="930"
                                        height="500" alt="blog" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Lifestyle</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="{{ url('/blog/details') }}">We want to be different and fashion gives to me that
                                        outlet</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget
                                        blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at vulputate
                                        volutpat, uctus metus libero eu augue, vitae luctus…</p>
                                    <a href="{{ url('/blog/details') }}" class="btn btn-link btn-primary">(read more)</a>
                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a> -
                                    <a href="#" class="post-date">03.05.2021</a>
                                </div>
                            </div>
                        </article>
                        <article class="post post-classic overlay-zoom mb-4">
                            <figure class="post-media br-sm">
                                <a href="{{ url('/blog/details') }}">
                                    <img src="{{ url('assets') }}/images/blog/classic/5.jpg" width="930"
                                        height="500" alt="blog" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Entertainment</a>, <a href="#">Lifestyle</a>,
                                    <a href="#">Others</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="{{ url('/blog/details') }}">Comes a cool blog post with Images</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget
                                        blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at vulputate
                                        volutpat, uctus metus libero eu augue, vitae luctus…</p>
                                    <a href="{{ url('/blog/details') }}" class="btn btn-link btn-primary">(read more)</a>
                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a> -
                                    <a href="#" class="post-date">03.05.2021</a>
                                </div>
                            </div>
                        </article>
                        <article class="post post-classic overlay-zoom mb-2">
                            <figure class="post-media br-sm">
                                <a href="{{ url('/blog/details') }}">
                                    <img src="{{ url('assets') }}/images/blog/classic/6.jpg" width="930"
                                        height="500" alt="blog" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">Fashion</a>,
                                    <a href="#">Technology</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="{{ url('/blog/details') }}">Fusce lacinia arcuet nulla</a>
                                </h4>
                                <div class="post-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget
                                        blandit nunc tortor eu nibh. Suspendisse potenti.Sed egstas, ant at vulputate
                                        volutpat, uctus metus libero eu augue, vitae luctus…</p>
                                    <a href="{{ url('/blog/details') }}" class="btn btn-link btn-primary">(read more)</a>
                                </div>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">John Doe</a> -
                                    <a href="#" class="post-date">03.05.2021</a>
                                </div>
                            </div>
                        </article>
                        <ul class="pagination justify-content-center pb-2">
                            <li class="prev disabled">
                                <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true"> <i
                                        class="w-icon-long-arrow-left"></i>Prev </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="next">
                                <a href="#" aria-label="Next"> Next<i class="w-icon-long-arrow-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                    <aside class="sidebar right-sidebar blog-sidebar sidebar-fixed sticky-sidebar-wrapper">
                        <div class="sidebar-overlay">
                            <a href="#" class="sidebar-close">
                                <i class="close-icon"></i>
                            </a>
                        </div>
                        <a href="#" class="sidebar-toggle">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <div class="sidebar-content">
                            <div class="sticky-sidebar">
                                <div class="widget widget-search-form">
                                    <div class="widget-body">
                                        <form action="#" method="GET" class="input-wrapper input-wrapper-inline">
                                            <input type="text" class="form-control" placeholder="Search in Blog"
                                                autocomplete="off" required />
                                            <button class="btn btn-search">
                                                <i class="w-icon-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <!-- End of Widget search form -->
                                <div class="widget widget-categories">
                                    <h3 class="widget-title bb-no mb-0">Categories</h3>
                                    <ul class="widget-body filter-items search-ul">
                                        <li><a href="{{ url('/blogs') }}">Clothes</a></li>
                                        <li><a href="{{ url('/blogs') }}">Entertainment</a></li>
                                        <li><a href="{{ url('/blogs') }}">Fashion</a></li>
                                        <li><a href="{{ url('/blogs') }}">Lifestyle</a></li>
                                        <li><a href="{{ url('/blogs') }}">Others</a></li>
                                        <li><a href="{{ url('/blogs') }}">Shoes</a></li>
                                        <li><a href="{{ url('/blogs') }}">Technology</a></li>
                                    </ul>
                                </div>
                                <!-- End of Widget categories -->
                                <div class="widget widget-posts">
                                    <h3 class="widget-title bb-no">Popular Posts</h3>
                                    <div class="widget-body">
                                        <div class="swiper">
                                            <div class="swiper-container swiper-theme nav-top"
                                                data-swiper-options="{
                                                'spaceBetween': 20,
                                                'slidesPerView': 1
                                            }">
                                                <div class="swiper-wrapper row cols-1">
                                                    <div class="swiper-slide widget-col">
                                                        <div class="post-widget mb-4">
                                                            <figure class="post-media br-sm">
                                                                <img src="{{ url('assets') }}/images/blog/sidebar/1.jpg"
                                                                    alt="150" height="150" />
                                                            </figure>
                                                            <div class="post-details">
                                                                <div class="post-meta">
                                                                    <a href="#" class="post-date">March 1, 2021</a>
                                                                </div>
                                                                <h4 class="post-title">
                                                                    <a href="{{ url('/blog/details') }}">Fashion tells
                                                                        about who you
                                                                        are from external point</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="post-widget mb-4">
                                                            <figure class="post-media br-sm">
                                                                <img src="{{ url('assets') }}/images/blog/sidebar/2.jpg"
                                                                    alt="150" height="150" />
                                                            </figure>
                                                            <div class="post-details">
                                                                <div class="post-meta">
                                                                    <a href="#" class="post-date">March 5, 2021</a>
                                                                </div>
                                                                <h4 class="post-title">
                                                                    <a href="{{ url('/blog/details') }}">New found the men
                                                                        dress for
                                                                        summer</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="post-widget mb-2">
                                                            <figure class="post-media br-sm">
                                                                <img src="{{ url('assets') }}/images/blog/sidebar/3.jpg"
                                                                    alt="150" height="150" />
                                                            </figure>
                                                            <div class="post-details">
                                                                <div class="post-meta">
                                                                    <a href="#" class="post-date">March 1, 2021</a>
                                                                </div>
                                                                <h4 class="post-title">
                                                                    <a href="{{ url('/blog/details') }}">Cras ornare
                                                                        tristique
                                                                        elit</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide widget-col">
                                                        <div class="post-widget mb-4">
                                                            <figure class="post-media br-sm">
                                                                <img src="{{ url('assets') }}/images/blog/sidebar/4.jpg"
                                                                    alt="150" height="150" />
                                                            </figure>
                                                            <div class="post-details">
                                                                <div class="post-meta">
                                                                    <a href="#" class="post-date">March 1, 2021</a>
                                                                </div>
                                                                <h4 class="post-title">
                                                                    <a href="{{ url('/blog/details') }}">Vivamus
                                                                        vestibulum ntulla
                                                                        nec ante</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="post-widget mb-4">
                                                            <figure class="post-media br-sm">
                                                                <img src="{{ url('assets') }}/images/blog/sidebar/5.jpg"
                                                                    alt="150" height="150" />
                                                            </figure>
                                                            <div class="post-details">
                                                                <div class="post-meta">
                                                                    <a href="#" class="post-date">March 5, 2021</a>
                                                                </div>
                                                                <h4 class="post-title">
                                                                    <a href="{{ url('/blog/details') }}">Fusce lacinia
                                                                        arcuet
                                                                        nulla</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="post-widget mb-2">
                                                            <figure class="post-media br-sm">
                                                                <img src="{{ url('assets') }}/images/blog/sidebar/6.jpg"
                                                                    alt="150" height="150" />
                                                            </figure>
                                                            <div class="post-details">
                                                                <div class="post-meta">
                                                                    <a href="#" class="post-date">March 1, 2021</a>
                                                                </div>
                                                                <h4 class="post-title">
                                                                    <a href="{{ url('/blog/details') }}">Comes a cool blog
                                                                        post with
                                                                        Images</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget posts -->
                                <div class="widget widget-custom-block">
                                    <h3 class="widget-title bb-no">Custom Block</h3>
                                    <div class="widget-body">
                                        <p class="text-default mb-0">Fringilla urna porttitor rhoncus dolor purus. Luctus
                                            veneneratis lectus magna fring. Suspendisse potenti. Sed egestas, ante et
                                            vulputate volutpat, uctus metus libero.</p>
                                    </div>
                                </div>
                                <!-- End of Widget custom block -->
                                <div class="widget widget-tags">
                                    <h3 class="widget-title bb-no">Browse Tags</h3>
                                    <div class="widget-body tags">
                                        <a href="#" class="tag">Fashion</a>
                                        <a href="#" class="tag">Style</a>
                                        <a href="#" class="tag">Travel</a>
                                        <a href="#" class="tag">Women</a>
                                        <a href="#" class="tag">Men</a>
                                        <a href="#" class="tag">Hobbies</a>
                                        <a href="#" class="tag">Shopping</a>
                                        <a href="#" class="tag">Photography</a>
                                    </div>
                                </div>
                                <div class="widget widget-calendar">
                                    <h3 class="widget-title bb-no">Calendar</h3>
                                    <div class="widget-body">
                                        <div class="calendar-container"
                                            data-calendar-options="{
                                            'dayExcerpt': 1
                                        }">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
@endsection
