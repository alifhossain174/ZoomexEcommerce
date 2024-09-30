@if(count($middleBanners) > 0)
<div class="row category-banner-wrapper appear-animate mb-6">
    @foreach ($middleBanners as $middleBanner)
    <div class="col-md-6 mb-4">
        <a href="{{$middleBanner->link}}" class="d-block w-100" style="text-decoration: none">
        <div class="banner banner-fixed br-xs">
            <figure>
                <img class="lazy" src="{{ url('assets') }}/img/product-load.gif" data-src="{{ url(env('ADMIN_URL') . '/' . $middleBanner->image) }}" alt="" style="height: 160px; width: 100%; background-color: #605959"/>
            </figure>
            <div class="banner-content y-50 mt-0">
                @if ($middleBanner->sub_title)
                    <h5 class="banner-subtitle font-weight-normal text-capitalize" @if($middleBanner->sub_title_color) style="color: {{$middleBanner->sub_title_color}}" @endif>
                        {{ $middleBanner->sub_title }}
                    </h5>
                @endif

                @if ($middleBanner->title)
                    <h3 class="banner-title text-uppercase" @if($middleBanner->title_color) style="color: {{$middleBanner->title_color}}" @endif>
                        {{ $middleBanner->title }}
                    </h3>
                @endif

                @if ($middleBanner->description)
                    <div class="banner-price-info font-weight-normal text-capitalize" @if($middleBanner->description_color) style="color: {{$middleBanner->description_color}}" @endif>
                        {{ $middleBanner->description }}
                    </div>
                @endif
            </div>
        </div>
        </a>
    </div>
    @endforeach
</div>
@endif

