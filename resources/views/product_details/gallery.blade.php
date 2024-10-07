<div class="swiper-container product-single-swiper swiper-theme nav-inner"
    data-swiper-options="{
        'navigation': {
            'nextEl': '.swiper-button-next',
            'prevEl': '.swiper-button-prev'
        }
    }">
    <div class="swiper-wrapper row cols-1 gutter-no">

        @if($variants && count($variants) > 0)
            @foreach ($variants as $variant)
                @if($variant->image)
                    <div class="swiper-slide">
                        <figure class="product-image">
                            <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-zoom-image="{{env('ADMIN_URL')."/productImages/".$variant->image}}" data-src="{{env('ADMIN_URL')."/productImages/".$variant->image}}" alt="" style="width: 100%; height: 550px"/>
                        </figure>
                    </div>
                @endif
            @endforeach
        @elseif ($productMultipleImages && count($productMultipleImages) > 0)
            @foreach ($productMultipleImages as $image)
                <div class="swiper-slide">
                    <figure class="product-image">
                        <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-zoom-image="{{env('ADMIN_URL')."/productImages/".$variant->image}}" data-src="{{env('ADMIN_URL')."/productImages/".$image->image}}" alt="" style="width: 100%; height: 550px"/>
                    </figure>
                </div>
            @endforeach
        @else
            <div class="swiper-slide">
                <figure class="product-image">
                    <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-zoom-image="{{env('ADMIN_URL')."/".$product->image}}" data-src="{{env('ADMIN_URL')."/".$product->image}}" alt="" style="width: 100%; height: 550px"/>
                </figure>
            </div>
        @endif

    </div>
    <button class="swiper-button-next"></button>
    <button class="swiper-button-prev"></button>
    <a href="javascript:void(0)" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a>
</div>
<div class="product-thumbs-wrap swiper-container"
    data-swiper-options="{
        'navigation': {
            'nextEl': '.swiper-button-next',
            'prevEl': '.swiper-button-prev'
        }
    }">
    <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">

        @if($variants && count($variants) > 0)
            @foreach ($variants as $variant)
                @if($variant->image)
                    <div class="product-thumb swiper-slide">
                        <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{env('ADMIN_URL')."/productImages/".$variant->image}}" alt="" style="height: 135px; width: 100%" />
                    </div>
                @endif
            @endforeach
        @elseif ($productMultipleImages && count($productMultipleImages) > 0)
            @foreach ($productMultipleImages as $image)
                <div class="product-thumb swiper-slide">
                    <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{env('ADMIN_URL')."/productImages/".$image->image}}" alt="" style="height: 135px; width: 100%" />
                </div>
            @endforeach
        @else
            <div class="product-thumb swiper-slide">
                <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{env('ADMIN_URL')."/".$product->image}}" alt="" style="height: 135px; width: 100%" />
            </div>
        @endif

    </div>
    <button class="swiper-button-next"></button>
    <button class="swiper-button-prev"></button>
</div>
