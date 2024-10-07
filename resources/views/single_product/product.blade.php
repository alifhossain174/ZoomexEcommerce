@php
    $totalStockAllVariants = $product->stock; // jekonon variant er at least ekta stock e thakleo stock in dekhabe
    $variants = DB::table('product_variants')
        ->select('discounted_price', 'price', 'stock')
        ->where('product_id', $product->id)
        ->get();

    if ($variants && count($variants) > 0) {
        $totalStockAllVariants = 0;
        $variantMinDiscountPrice = 0;
        $variantMinPrice = 0;
        $variantMinDiscountPriceArray = [];
        $variantMinPriceArray = [];

        foreach ($variants as $variant) {
            $variantMinDiscountPriceArray[] = $variant->discounted_price;
            $variantMinPriceArray[] = $variant->price;
            $totalStockAllVariants = $totalStockAllVariants + (int) $variant->stock;
        }

        $variantMinDiscountPrice = min($variantMinDiscountPriceArray);
        $variantMinPrice = min($variantMinPriceArray);
    }
@endphp

<div class="product-wrap product" style="min-height: 342px;">
    <figure class="product-media">
        <a href="{{ url('product') }}/{{ $product->slug }}">
            <img class="lazy" src="{{ url('assets') }}/img/product-load.gif" data-src="{{ url(env('ADMIN_URL') . '/' . $product->image) }}" alt="" style="width: 100%; height: 232px" />
        </a>
        <div class="product-action-vertical">
            @include('single_product.cart_wishlist_compare')
        </div>

        @if($product->flag_name)
        <div class="product-label-group">
            <label class="product-label label-new">{{ $product->flag_name }}</label>
        </div>
        @endif

        @if($product->category_name)
        <div class="product-label-fixed">
            <label>{{ $product->category_name }}</label>
        </div>
        @endif

    </figure>
    <div class="product-details">
        <h4 class="product-name">
            <a href="{{ url('product') }}/{{ $product->slug }}">{{ $product->name }}</a>
        </h4>

        <div class="product-price">
            @if($totalStockAllVariants)
            @include('single_product.price')
            @else
            <span style="background: #df0000; display: block; border-radius: 4px; color: whitesmoke; font-weight: 500;">Stock Out</span>
            @endif
        </div>

        <div class="ratings-container">
            @include('single_product.review_rating')
        </div>
        @include('single_product.offer_countdown')
    </div>
</div>
