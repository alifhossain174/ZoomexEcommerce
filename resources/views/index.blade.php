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

    @include('homepage_sections.sliders')

    <div class="container">

        @include('homepage_sections.slider_bottom')
        @include('homepage_sections.flash_sale')

        @foreach ($featuredFlags as $featuredFlag)
            @include('homepage_sections.featured_flag')
        @endforeach

        @include('homepage_sections.top_banner')
        @include('homepage_sections.featured_categories')
        @include('homepage_sections.top_selling_vendors')
        @include('homepage_sections.middle_banner')

    </div>

    @foreach ($featuredCategories as $featuredCategory)
        @if (!$featuredCategory->banner_image)
            @include('homepage_sections.featured_categorywise_products')
        @else
            @include('homepage_sections.featured_categorywise_products_with_banner')
        @endif
    @endforeach

    @include('homepage_sections.bottom_banner')
    @include('homepage_sections.products_for_you')

@endsection

@section('footer_js')
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

                        if (Number(data.total_products) == Number($(".recommended_product_section").children(
                                "div").length)) {
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
@endsection
