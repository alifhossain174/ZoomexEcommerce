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

@section('header_css')
    <style>
        .seller-brand {
            background-color: var(--secondary-color);
        }

        @media (min-width: 992px) {
            .row .main-content {
                /* max-width: calc(100% - 31rem); */
                max-width: calc(100%);
            }
        }
    </style>
@endsection

@section('content')
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no" style="padding: 1.5rem 0.2rem 1.6rem;">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/vendor/shops') }}">Vendor Shops</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Pgae Contetn -->
    <div class="page-content mb-8">
        <div class="container">
            <div class="row gutter-lg">

                <div class="main-content">
                    <div class="toolbox wcfm-toolbox">
                        <div class="toolbox-left">
                            <form action="{{ url('vendor/shops') }}" method="GET" class="select-box toolbox-item"
                                id="vendor_shop_sort_by">
                                <select name="sort_by" class="form-control" onchange="submitForm()">
                                    <option value="1" @if (isset($sortBy) && $sortBy == 1) selected @endif>Sort By: New to
                                        Old</option>
                                    <option value="2" @if (isset($sortBy) && $sortBy == 2) selected @endif>Sort By: Old to
                                        New</option>
                                    <option value="3" @if (isset($sortBy) && $sortBy == 3) selected @endif>Sort By: A to Z
                                    </option>
                                    <option value="4" @if (isset($sortBy) && $sortBy == 4) selected @endif>Sort By: Z to A
                                    </option>
                                </select>
                            </form>
                        </div>
                        <div class="toolbox-right">
                            <div class="toolbox-item">
                                <label class="showing-info">
                                    {{ 'Showing ' . (($stores->currentpage() - 1) * $stores->perpage() + 1) . ' - ' . $stores->currentpage() * $stores->perpage() . ' of ' . $stores->total() . ' results' }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- End of Toolbox -->

                    <div class="row cols-sm-3">

                        @foreach ($stores as $store)
                            <div class="store-wrap mb-4">
                                <div class="store store-grid store-wcfm">
                                    <div class="store-header">
                                        <figure class="store-banner">
                                            <img class="lazy" src="{{ url('assets') }}/img/product-load.gif"
                                                data-src="{{ url(env('ADMIN_URL') . '/' . $store->store_banner) }}"
                                                alt=""
                                                style="width: 100%; height: 194px; background-color: #40475e" />
                                        </figure>
                                        <div class="store-content">
                                            <h4 class="store-title">
                                                <a href="{{ url('shop') }}?store={{ $store->slug }}">{{ $store->store_name }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!-- End of Store Header -->

                                    <!-- End of Store Content -->
                                    <div class="store-footer">
                                        <figure class="seller-brand">
                                            <img class="lazy" src="{{ url('assets') }}/img/product-load.gif"
                                                data-src="{{ url(env('ADMIN_URL') . '/' . $store->store_logo) }}"
                                                alt="" style="width: 80px; height: 80px; border-radius: 50%" />
                                        </figure>
                                        <a href="{{ url('shop') }}?store={{ $store->slug }}"
                                            class="btn btn-rounded btn-visit">Visit Store</a>
                                    </div>
                                    <!-- End of Store Footer -->
                                </div>
                                <!-- End of Store -->
                            </div>
                        @endforeach
                    </div>

                    @if ($stores->total() > 9)
                        <div class="pagination__area bg__gray--color">
                            <nav class="pagination justify-content-center">
                                {{ $stores->links() }}
                            </nav>
                        </div>
                    @endif

                </div>
                <!-- End of Main Content -->
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
@endsection

@section('footer_js')
    <script>
        function submitForm() {
            document.getElementById("vendor_shop_sort_by").submit();
        }
    </script>
@endsection
