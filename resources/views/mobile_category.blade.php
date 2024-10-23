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
    <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/vendor/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets') }}/vendor/nouislider/nouislider.min.css" />
@endsection

@section('content')
    <div class="category-responsive-area">
        <!-- Tab Menu -->
        <div class="category-responsive-tab-menu tab-menu">
            <div class="list-group" id="list-tab" role="tablist">
                @foreach ($categories as $categoryIndex => $category)
                    <a @if ($categoryIndex == 0) class="list-group-item active" @else class="list-group-item" @endif
                        data-bs-toggle="list" href="#tab{{ $categoryIndex + 1 }}" role="tab">
                        <div class="category-menu-icon">
                            <img class="lazy" src="{{ url('assets') }}/img/product-load.gif"
                                data-src="{{ url(env('ADMIN_URL') . '/' . $category->icon) }}"
                                style="height: 18px; width: 18px; border-radius: 50%">
                        </div>
                        <div class="category-menu-text">
                            <span>{{ $category->name }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Tab Details -->
        <div class="category-responsive-tab-details tab-details">
            <div class="tab-content" id="nav-tabContent">

                <!-- Tab One -->
                @foreach ($categories as $categorySecondIndex => $category)
                    <div @if ($categoryIndex == 0) class="tab-pane fade show active" @else class="tab-pane fade" @endif
                        id="tab{{ $categorySecondIndex + 1 }}" role="tabpanel">
                        <div class="responsive-sub-category accordion" id="accordionExample{{ $categorySecondIndex + 1 }}">

                            @php
                                $subcategories = DB::table('subcategories')->where('status', 1)->where('category_id', $category->id)->orderBy('serial', 'asc')->get();
                            @endphp

                            <!-- Single Sub Category -->
                            @foreach ($subcategories as $subcategoryIndex => $subcategory)

                            @php
                                $productsOfSubcat = DB::table('products')->where('status', 1)->where('subcategory_id', $subcategory->id)->inRandomOrder()->skip(0)->limit(6)->get();
                            @endphp

                            <div class="responsive-sub-category-wrapper accordion-item">
                                <h2 class="accordion-header" id="headingOne{{$subcategoryIndex}}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne{{$subcategoryIndex}}" aria-expanded="false" aria-controls="collapseOne{{$subcategoryIndex}}">
                                        {{$subcategory->name}}
                                    </button>
                                </h2>
                                <div id="collapseOne{{$subcategoryIndex}}" class="accordion-collapse collapse" aria-labelledby="headingOne{{$subcategoryIndex}}"
                                    data-bs-parent="#accordionExample{{ $categorySecondIndex + 1 }}">
                                    <div class="responsive-sub-category-group">

                                        <!-- Single Product -->
                                        @foreach($productsOfSubcat as $prod)
                                        <a href="shop.html" class="responsive-sub-category-card">
                                            <img class="lazy" src="{{ url('assets') }}/img/product-load.gif" data-src="{{ url(env('ADMIN_URL') . '/' . $prod->image) }}" alt=""/>
                                            <span>{{$prod->name}}</span>
                                        </a>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <!-- End Tab Details -->
    </div>
@endsection

@section('footer_js')
    <script src="{{ url('assets') }}/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="{{ url('assets') }}/assets/vendor/nouislider/nouislider.min.js"></script>
@endsection
