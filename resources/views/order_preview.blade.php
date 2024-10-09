@extends('master')

@push('site-seo')
    @php
        $generalInfo = DB::table('general_infos')
            ->select('meta_title', 'meta_og_title', 'meta_keywords', 'meta_description', 'meta_og_description', 'meta_og_image', 'company_name', 'fav_icon', 'google_tag_manager_status', 'google_tag_manager_id')
            ->where('id', 1)
            ->first();
    @endphp
    <meta name="keywords" content="{{ $generalInfo ? $generalInfo->meta_keywords : '' }}" />
    <meta name="description" content="{{ $generalInfo ? $generalInfo->meta_description : '' }}" />
    <meta name="author" content="{{ $generalInfo ? $generalInfo->company_name : '' }}">
    <meta name="copyright" content="{{ $generalInfo ? $generalInfo->company_name : '' }}">
    <meta name="url" content="{{ env('APP_URL') }}">

    {{-- Page Title & Favicon --}}
    <title>
        @if ($generalInfo && $generalInfo->meta_title)
            {{ $generalInfo->meta_title }}
        @else
            {{ $generalInfo->company_name }}
        @endif
    </title>
    @if ($generalInfo && $generalInfo->fav_icon)
        <link rel="icon" href="{{ env('ADMIN_URL') . '/' . $generalInfo->fav_icon }}" type="image/x-icon"/>
    @endif

    {{-- open graph meta --}}
    <meta property="og:title" content="@if ($generalInfo && $generalInfo->meta_og_title) {{ $generalInfo->meta_og_title }} @else {{ $generalInfo->company_name }} @endif" />
    <meta property="og:type" content="Ecommerce" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta property="og:image" content="{{ env('ADMIN_URL') . '/' . $generalInfo->meta_og_image }}" />
    <meta property="og:site_name" content="{{ $generalInfo ? $generalInfo->company_name : '' }}" />
    <meta property="og:description" content="{{ $generalInfo->meta_og_description }}" />
@endpush

@section('content')
    <section class="auth-page-area" style="padding: 80px 0px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="auth-card verifyOTP-card">
                        <div class="auth-card-head" style="margin-top: 0">
                            <div class="auth-card-head-icon">
                                <img src="{{url('assets')}}/img/order_successfull.svg" alt="Order Successfull">
                            </div>
                            <h4 class="auth-card-title">Order Successful</h4>
                            <p>
                                Thanks for your order. We receive your order. We will be in touch and contact you soon!
                            </p>
                            <h5 class="mb-5" style="font-weight: 600;font-size: 18px;">Order NO: {{$orderInfo ? $orderInfo->order_no : ''}}</h5>

                            @auth
                                <a href="{{url('track/my/order')}}/{{$orderInfo->order_no}}" class="auth-card-form-btn primary__btn d-inline-block" style="width: 220px; margin: auto; background: transparent; border-color: var(--primary-color); color: var(--primary-color)">Track My Order</a>
                                <a href="{{url('home')}}" class="auth-card-form-btn primary__btn d-inline-block" style="width: 220px; margin: auto;">Go to My Account</a>
                            @endauth

                            @guest
                                <a href="{{url('track/order')}}/{{$orderInfo->order_no}}" class="auth-card-form-btn primary__btn d-inline-block" style="width: 220px; margin: auto;">Track Order</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
