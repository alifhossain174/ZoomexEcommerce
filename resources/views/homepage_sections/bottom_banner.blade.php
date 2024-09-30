@if(count($bottomBanners) > 0)
<div class="intro-banner appear-animate">
    <div class="container">
        <div class="row cols-lg-3 cols-sm-2 cols-1">

            @foreach ($bottomBanners as $bottomBanner)
            <figure class="banner banner-fixed br-sm">
                <img class="lazy" src="{{ url('assets') }}/img/product-load.gif" data-src="{{ url(env('ADMIN_URL') . '/' . $bottomBanner->image) }}" alt="" style="height: 200px; width: 100%; background-color: #3c3c3c"/>
                <div class="banner-content y-50">
                    <h5 class="banner-subtitle text-uppercase font-weight-bold ls-25" @if($bottomBanner->sub_title_color) style="color: {{$bottomBanner->sub_title_color}}" @endif>{{ $bottomBanner->sub_title }}</h5>
                    <h3 class="banner-title font-weight-bold" @if($bottomBanner->title_color) style="color: {{$bottomBanner->title_color}}" @endif>{{ $bottomBanner->title }}</h3>
                    <a href="{{ $bottomBanner->btn_link }}" class="btn btn-link btn-underline btn-icon-right" @if($bottomBanner->btn_color) style="color: {{$bottomBanner->btn_color}}" @endif> {{ $bottomBanner->btn_text }}<i class="w-icon-long-arrow-right"></i> </a>
                </div>
            </figure>
            @endforeach

        </div>
    </div>
</div>
@endif
