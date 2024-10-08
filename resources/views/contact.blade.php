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
            <h1 class="page-title mb-0">Contact Us</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10 pb-1">
        <div class="container">
            <ul class="breadcrumb" style="padding: 1.5rem 0.2rem 1.6rem;">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/contact')}}">Contact Us</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content contact-us">
        <div class="container">
            <section class="content-title-section mb-10">
                <h3 class="title title-center mb-3">Contact Information</h3>
                <p class="text-center">
                    We'd love to hear from you! Reach out to us with any questions, feedback, or inquiries. Our team is here to assist you.
                </p>
            </section>
            <!-- End of Contact Title Section -->

            <section class="contact-information-section mb-10">
                <div class="swiper-container swiper-theme"
                    data-swiper-options="{
                              'spaceBetween': 20,
                              'slidesPerView': 1,
                              'breakpoints': {
                                  '480': {
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
                    <div class="swiper-wrapper row cols-xl-4 cols-md-3 cols-sm-2 cols-1">
                        @php
                            $emailIds = explode(",",$contactInfo->email);
                            $contactNos = explode(",",$contactInfo->contact);
                        @endphp
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-email">
                                <i class="w-icon-envelop-closed"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">E-mail Address</h4>
                                <p style="white-space: wrap;">
                                    @foreach ($emailIds as $emailId)
                                    {{$emailId}}<br>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-headphone">
                                <i class="w-icon-headphone"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Phone Number</h4>
                                <p style="white-space: wrap;">
                                    @foreach ($contactNos as $contactNo)
                                    {{$contactNo}}<br>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-map-marker">
                                <i class="w-icon-map-marker"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Address</h4>
                                <p style="white-space: wrap;">{{$contactInfo->address}}</p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-fax">
                                <i class="w-icon-fax"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Trade License</h4>
                                <p style="white-space: wrap;">{{$contactInfo->trade_license_no}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End of Contact Information section -->

            <hr class="divider mb-10 pb-1" />

            <section class="contact-section">
                <div class="row gutter-lg pb-3">
                    <div class="col-lg-6 mb-8">
                        <h4 class="title mb-3">People usually ask these</h4>
                        <div class="accordion accordion-bg accordion-gutter-md accordion-border">

                            @foreach($data as $index => $item)
                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse{{$item->id}}" class="@if($index==0) collapse @else expand @endif">{{$item->question}}</a>
                                </div>
                                <div id="collapse{{$item->id}}" class="card-body @if($index==0) expanded @else collapsed @endif">
                                    <p class="mb-0">
                                        {{$item->answer}}
                                    </p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-lg-6 mb-8">
                        <h4 class="title mb-3">Send Us a Message</h4>
                        <form class="form contact-us-form" action="{{ url('submit/contact/request') }}" method="POST">
                            @csrf
                            @honeypot
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" id="name" name="name" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email</label>
                                <input type="email" id="email" name="email" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="message">Your Message</label>
                                <textarea id="message" name="message" cols="30" rows="5" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-dark btn-rounded">
                                Send Now
                            </button>
                        </form>
                    </div>
                </div>
            </section>
            <!-- End of Contact Section -->
        </div>

        <iframe src="{{$contactInfo->google_map_link}}" width="100%" height="300" style="border:0; margin-bottom: -8px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- End of PageContent -->
@endsection
