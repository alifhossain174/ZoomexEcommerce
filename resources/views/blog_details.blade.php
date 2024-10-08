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
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Blog Details</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no" style="padding: 1.5rem 0.2rem 1.6rem;">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/blogs')}}">Blog</a></li>
                <li>Blog Details</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content mb-8">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content post-single-content">
                    <div class="post post-grid post-single">
                        <figure class="post-media br-sm">
                            <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{url(env('ADMIN_URL')."/".$blog->image)}}" style="height: 500px; max-height: 500px; width: 100%" alt=""/>
                        </figure>
                        <div class="post-details">
                            <div class="post-meta">
                                by <a href="javascript:void(0)" class="post-author">{{$generalInfo->company_name}}</a> -
                                <a href="javascript:void(0)" class="post-date">{{date('d M, Y', strtotime($blog->created_at))}}</a>
                            </div>
                            <h2 class="post-title">
                                <a href="{{url('blog/details')}}/{{$blog->slug}}">{{$blog->title}}</a>
                            </h2>
                            <div class="post-content">
                                <p>
                                    {{$blog->short_description}}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-10">
                            {!! $blog->description !!}
                        </div>
                    </div>

                    @if($blog->tags)
                    <div class="tags">
                        <label class="text-dark mr-2">Tags:</label>
                        @foreach (explode(",", $blog->tags) as $tag)
                        <a class="tag" href="javascript:void(0)">{{$tag}}</a>
                        @endforeach
                    </div>
                    @endif

                    <div class="social-links mb-10">
                        @php
                            $socialShare = Share::page(url()->current(), env('APP_NAME'))
                                                ->facebook()
                                                ->twitter()
                                                ->linkedin(env('APP_NAME'))
                                                ->whatsapp()
                                                ->getRawLinks();
                        @endphp
                        <div class="social-icons social-no-color border-thin">
                            <a href="{{ $socialShare['facebook'] }}" target="_blank" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="{{ $socialShare['twitter'] }}" target="_blank" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="{{ $socialShare['whatsapp'] }}" target="_blank" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                            <a href="{{ $socialShare['linkedin'] }}" target="_blank" class="social-icon social-youtube fab fa-linkedin-in"></a>
                        </div>
                    </div>

                    <h4 class="title title-lg font-weight-bold mt-10 pt-1 mb-5">
                        Random Posts
                    </h4>
                    <div class="swiper">
                        <div class="post-slider swiper-container swiper-theme nav-top pb-2"
                            data-swiper-options="{
                                  'spaceBetween': 20,
                                  'slidesPerView': 1,
                                  'breakpoints': {
                                      '576': {
                                          'slidesPerView': 2
                                      },
                                      '768': {
                                          'slidesPerView': 3
                                      },
                                      '992': {
                                          'slidesPerView': 2
                                      },
                                      '1200': {
                                          'slidesPerView': 3
                                      }
                                  }
                              }">
                            <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-xs-2 cols-1">

                                @foreach($randomBlogs as $randomBlog)
                                <div class="swiper-slide post post-grid">
                                    <figure class="post-media br-sm">
                                        <a href="{{url('blog/details')}}/{{$randomBlog->slug}}">
                                            <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{url(env('ADMIN_URL')."/".$randomBlog->image)}}" style="background-color: #bcbcb4; height: 190px; max-height: 190px; width: 100%" alt=""/>
                                        </a>
                                    </figure>
                                    <div class="post-details text-center">
                                        <div class="post-meta">
                                            by <a href="javascript:void(0)" class="post-author">{{$generalInfo->company_name}}</a> -
                                            <a href="javascript:void(0)" class="post-date">{{date('d M, Y', strtotime($randomBlog->created_at))}}</a>
                                        </div>
                                        <h4 class="post-title mb-3">
                                            <a href="{{url('blog/details')}}/{{$randomBlog->slug}}">{{$randomBlog->title}}</a>
                                        </h4>
                                        <a href="{{url('blog/details')}}/{{$randomBlog->slug}}" class="btn btn-link btn-dark btn-underline font-weight-normal">Read More<i
                                                class="w-icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <button class="swiper-button-next"></button>
                            <button class="swiper-button-prev"></button>
                        </div>
                    </div>
                    <!-- End Related Posts -->

                </div>
                <!-- End of Main Content -->
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
                            <!-- End of Widget search form -->
                            <div class="widget widget-categories">
                                <h3 class="widget-title" style="border-bottom: 1px solid lightgray">Blog Categories</h3>
                                <ul class="widget-body filter-items search-ul">
                                    @foreach($blogCategories as $blogCat)
                                    <li><a href="{{url('blog/category')}}/{{$blogCat->slug}}">{{$blogCat->name}} - {{DB::table('blogs')->where('category_id', $blogCat->id)->count()}}</a></li>
                                    @endforeach
                                    <li><a href="{{url('blogs')}}">View All - {{DB::table('blogs')->count()}}</a></li>
                                </ul>
                            </div>
                            <!-- End of Widget categories -->
                            <div class="widget widget-posts">
                                <h3 class="widget-title" style="border-bottom: 1px solid lightgray">Recent Posts</h3>
                                <div class="widget-body">
                                    <div class="swiper">
                                        <div class="swiper-container swiper-theme nav-top"
                                            data-swiper-options="{
                                                  'spaceBetween': 20,
                                                  'slidesPerView': 1
                                              }">
                                            <div class="swiper-wrapper row cols-1">
                                                <div class="swiper-slide widget-col">

                                                    @foreach($recentBlogs as $recentBlog)
                                                    <div class="post-widget mb-4">
                                                        <figure class="post-media br-sm">
                                                            <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{url(env('ADMIN_URL')."/".$recentBlog->image)}}" style="height: 85px; max-height: 85px; width: 100%" alt=""/>
                                                        </figure>
                                                        <div class="post-details">
                                                            <div class="post-meta">
                                                                <a href="#" class="post-date">{{date('d M, Y', strtotime($recentBlog->created_at))}}</a>
                                                            </div>
                                                            <h4 class="post-title">
                                                                <a href="{{url('blog/details')}}/{{$recentBlog->slug}}">{{$recentBlog->title}}</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            {{-- <button class="swiper-button-next"></button>
                                            <button class="swiper-button-prev"></button> --}}
                                        </div>
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
@endsection
