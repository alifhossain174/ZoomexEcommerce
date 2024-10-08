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
        {{-- style="background: url('{{url(env('ADMIN_URL')."/".$data->banner_bg)}}'); background-size: cover; background-repeat: no-repeat; height: 200px;" --}}
        <div class="container">
            <h1 class="page-title mb-0">About Us</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10 pb-8">
        <div class="container">
            <ul class="breadcrumb" style="padding: 1.5rem 0.2rem 1.6rem;">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content">
        <section class="boost-section pb-10">
            <div class="container mt-5 mb-9">
                <div class="row align-items-center mb-10">
                    <div class="col-md-6 mb-8">
                        <figure class="br-lg">
                            <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{url(env('ADMIN_URL')."/".$data->image)}}" alt="" style="height: 450px; width: 100%; background-color: #9e9da2" />
                        </figure>
                    </div>
                    <div class="col-md-6 pl-lg-8 mb-8">
                        <h5 class="text-left" style="font-weight: 500">
                            {{$data->section_sub_title}}
                        </h5>
                        <h4 class="title text-left">
                            {{$data->section_title}}
                        </h4>
                        {!! $data->section_description !!}

                        @if($data->btn_text)
                        <a href="{{$data->btn_link}}" class="btn btn-dark btn-rounded">{{$data->btn_text}}</a>
                        @endif
                    </div>
                </div>

                <div class="awards-wrapper">
                    <h4 class="title title-center font-weight-bold mb-10 pb-1 ls-25">
                        Our Vendors
                    </h4>
                    <div class="swiper-container swiper-theme"
                        data-swiper-options="{
                              'spaceBetween': 20,
                              'slidesPerView': 2,
                              'breakpoints': {
                                  '768': {
                                      'slidesPerView': 3
                                  },
                                  '992': {
                                      'slidesPerView': 4
                                  },
                                  '1200': {
                                      'slidesPerView': 5
                                  }
                              }
                          }">
                        <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-md-2 cols-1">

                            @foreach ($stores as $store)
                            <div class="swiper-slide image-box-wrapper">
                                <div class="image-box text-center">
                                    <figure>
                                        <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{url(env('ADMIN_URL')."/".$store->store_logo)}}" alt="" style="width: 105px; height: 105px; margin: auto; border-radius: 50%;"/>
                                    </figure>
                                    <p class="pt-1">
                                        <b>{{$store->store_name}}</b><br />
                                        {{DB::table('products')->where('store_id', $store->id)->count()}} Products
                                    </p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            </div>
        </section>

        <section class="member-section mt-5 mb-10 pb-4">
            <div class="container">
                <h4 class="title title-center mb-3">What Our Clients Say</h4>
                <p class="text-center mb-8">
                    Discover how our clients have benefited from our services.<br />
                    Read their stories and experiences to see why they choose us for their needs.
                </p>
                <div class="swiper-container swiper-theme"
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
                                  'slidesPerView': 4
                              }
                          }
                      }">
                    <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-sm-2 cols-1">

                        @foreach($testimonials as $testimonial)
                        <div class="swiper-slide member-wrap">
                            <figure class="br-lg">
                                <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{url(env('ADMIN_URL')."/".$testimonial->customer_image)}}" alt="" style="height: 120px; width: 120px; border-radius: 50%; margin: auto;"/>
                            </figure>
                            <div class="member-info text-center pt-2 pl-2 pr-2">
                                <h4 class="member-name mb-1">{{$testimonial->customer_name}}</h4>
                                <p class="text-uppercase">{{$testimonial->designation}}</p>
                                <p>
                                    {{$testimonial->description}}
                                </p>
                                <p>
                                    @for($i=1; $i<=$testimonial->rating; $i++)
                                    <i class="fas fa-star" style="color: #FFB639;"></i>
                                    @endfor
                                </p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    </div>
@endsection
