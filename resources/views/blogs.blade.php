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
            <h1 class="page-title mb-0">
                @if(isset($blogCategory))
                    {{$blogCategory->name}} Blogs
                @else
                    All Blogs
                @endif
            </h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-6">
        <div class="container">
            <ul class="breadcrumb" style="padding: 1.5rem 0.2rem 1.6rem;">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('blogs')}}">Blog</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content mb-10 pb-2">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content">
                    <div class="row cols-sm-2">

                        @foreach ($blogs as $blog)
                        <article class="post post-grid-type overlay-zoom mb-6 fashion">
                            <figure class="post-media br-sm">
                                <a href="{{url('blog/details')}}/{{$blog->slug}}">
                                    <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{url(env('ADMIN_URL')."/".$blog->image)}}" style="width: 100%; height: 420px; max-height: 420px" alt="" />
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">{{$blog->category_name}}</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="{{url('blog/details')}}/{{$blog->slug}}">{{$blog->title}}</a>
                                </h4>
                                <div class="post-content">
                                    <p>
                                        {{$blog->short_description}}
                                    </p>
                                    <a href="{{url('blog/details')}}/{{$blog->slug}}" class="btn btn-link btn-primary">(read more)</a>
                                </div>
                                <div class="post-meta">
                                    by <a href="javascript:void(0)" class="post-author">{{$generalInfo->company_name}}</a> -
                                    <a href="javascript:void(0)" class="post-date">{{date('d M, Y', strtotime($blog->created_at))}}</a>
                                </div>
                            </div>
                        </article>
                        @endforeach


                    </div>

                    @if($blogs->total() > 6)
                    <div class="pagination__area bg__gray--color">
                        <nav class="pagination justify-content-center">
                            {{ $blogs->links() }}
                        </nav>
                    </div>
                    @endif

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
                            <div class="widget widget-categories mb-0">
                                <h3 class="widget-title" style="border-bottom: 1px solid lightgray">Blog Categories</h3>
                                <ul class="widget-body filter-items search-ul">
                                    @foreach($blogCategories as $blogCat)
                                    <li><a href="{{url('blog/category')}}/{{$blogCat->slug}}" @if(isset($blogCategory) && $blogCategory->id == $blogCat->id) style="color: var(--primary-color)" @endif>{{$blogCat->name}} - {{DB::table('blogs')->where('category_id', $blogCat->id)->count()}}</a></li>
                                    @endforeach
                                    <li><a href="{{url('blogs')}}">View All - {{DB::table('blogs')->count()}}</a></li>
                                </ul>
                            </div>

                            <div class="widget widget-posts">
                                <h3 class="widget-title" style="border-bottom: 1px solid lightgray">Random Posts</h3>
                                <div class="widget-body">
                                    <div class="swiper">
                                        <div class="swiper-container swiper-theme nav-top"
                                            data-swiper-options="{
                                                  'spaceBetween': 20,
                                                  'slidesPerView': 1
                                              }">
                                            <div class="swiper-wrapper row cols-1">
                                                <div class="swiper-slide widget-col">

                                                    @foreach($randomBlogs as $randomBlog)
                                                    <div class="post-widget mb-4">
                                                        <figure class="post-media br-sm">
                                                            <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{url(env('ADMIN_URL')."/".$randomBlog->image)}}" style="height: 85px; max-height: 85px; width: 100%" alt=""/>
                                                        </figure>
                                                        <div class="post-details">
                                                            <div class="post-meta">
                                                                <a href="#" class="post-date">{{date('d M, Y', strtotime($randomBlog->created_at))}}</a>
                                                            </div>
                                                            <h4 class="post-title">
                                                                <a href="{{url('blog/details')}}/{{$randomBlog->slug}}">{{$randomBlog->title}}</a>
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
