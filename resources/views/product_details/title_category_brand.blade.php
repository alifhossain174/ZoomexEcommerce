<h1 class="product-title">
    {{$product->name}}
</h1>
<div class="product-bm-wrapper">
    @if($product->brand_logo)
    <figure class="brand">
        <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{env('ADMIN_URL')."/".$product->brand_logo}}" alt="" style="height: 40px; width: 40px;"/>
    </figure>
    @endif

    <div class="product-meta">
        @if($product->category_name)
        <div class="product-categories">
            Category:
            <span class="product-category"><a href="{{url('shop')}}?category={{$product->category_slug}}">{{$product->category_name}}</a></span>
        </div>
        @endif

        @if($product->code)
        <div class="product-sku">
            SKU: <span>{{$product->code}}</span>
        </div>
        @endif
    </div>
</div>
<hr class="product-divider"/>
