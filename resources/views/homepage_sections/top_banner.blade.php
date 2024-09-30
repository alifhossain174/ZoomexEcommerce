@if(count($topBanners) > 0)
<div class="row category-banner-wrapper appear-animate mb-6">
    @foreach ($topBanners as $topBanner)
    <div class="col-md-6 mb-4">
        <a href="{{$topBanner->link}}" class="d-block w-100" style="text-decoration: none">
        <div class="banner banner-fixed br-xs">
            <figure>
                <img class="lazy"  src="{{ url('assets') }}/img/product-load.gif" data-src="{{ url(env('ADMIN_URL') . '/' . $topBanner->image) }}" alt="" style="height: 160px; width: 100%; background-color: #605959"/>
            </figure>
            <div class="banner-content y-50 mt-0">
                @if ($topBanner->sub_title)
                    <h5 class="banner-subtitle font-weight-normal text-capitalize" @if($topBanner->sub_title_color) style="color: {{$topBanner->sub_title_color}}" @endif>
                        {{ $topBanner->sub_title }}
                    </h5>
                @endif

                @if ($topBanner->title)
                    <h3 class="banner-title text-uppercase" @if($topBanner->title_color) style="color: {{$topBanner->title_color}}" @endif>
                        {{ $topBanner->title }}
                    </h3>
                @endif

                @if ($topBanner->description)
                    <div class="banner-price-info font-weight-normal text-capitalize" @if($topBanner->description_color) style="color: {{$topBanner->description_color}}" @endif>
                        {{ $topBanner->description }}
                    </div>
                @endif
            </div>
        </div>
        </a>
    </div>
    @endforeach
</div>
@endif

