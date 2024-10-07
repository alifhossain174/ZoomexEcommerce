<div class="product product-widget">
    <figure class="product-media">
        <a href="{{url('product/details')}}/{{$mayLikedProduct->slug}}">
            <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{url(env('ADMIN_URL')."/".$mayLikedProduct->image)}}" alt="" style="width: 100%; max-height: 113px"/>
        </a>
    </figure>
    <div class="product-details">
        <h4 class="product-name">
            <a href="{{url('product/details')}}/{{$mayLikedProduct->slug}}">{{$mayLikedProduct->name}}</a>
        </h4>
        <div class="ratings-container">
            @php
                $productReviews = DB::table('product_reviews')->where('product_id', $mayLikedProduct->id)->get();
                $productRating = DB::table('product_reviews')->where('product_id', $mayLikedProduct->id)->sum('rating');
            @endphp

            @if(count($productReviews) > 0)
                @for ($i=1;$i<=round($productRating/count($productReviews));$i++)
                <i class="fas fa-star" style="color: var(--secondary-color)"></i>
                @endfor

                @for ($i=1;$i<=5-round($productRating/count($productReviews));$i++)
                <i class="far fa-star" style="color: gray"></i>
                @endfor
            @else
                <i class="far fa-star" style="color: gray"></i>
                <i class="far fa-star" style="color: gray"></i>
                <i class="far fa-star" style="color: gray"></i>
                <i class="far fa-star" style="color: gray"></i>
                <i class="far fa-star" style="color: gray"></i>
            @endif

            &nbsp;&nbsp;
            <a href="{{url('product/details')}}/{{$mayLikedProduct->slug}}" class="rating-reviews">({{count($productReviews)}} Reviews)</a>
        </div>
        <div class="product-price">

            @php
                $totalStockAllVariants = 0; // jekonon variant er at least ekta stock e thakleo stock in dekhabe
                $variants = DB::table('product_variants')->select('discounted_price', 'price', 'stock')->where('product_id', $mayLikedProduct->id)->get();
                if($variants && count($variants) > 0){
                    $variantMinDiscountPrice = 0;
                    $variantMinPrice = 0;
                    $variantMinDiscountPriceArray = array();
                    $variantMinPriceArray = array();

                    foreach ($variants as $variant) {
                        $variantMinDiscountPriceArray[] = $variant->discounted_price;
                        $variantMinPriceArray[] = $variant->price;
                        $totalStockAllVariants = $totalStockAllVariants + (int) $variant->stock;
                    }

                    $variantMinDiscountPrice = min($variantMinDiscountPriceArray);
                    $variantMinPrice = min($variantMinPriceArray);
                }
            @endphp

            @if($variants && count($variants) > 0)
                @if($variantMinDiscountPrice > 0)
                    <ins class="new-price">৳{{number_format($variantMinDiscountPrice)}}</ins>
                    <del class="old-price">৳{{number_format($variantMinPrice)}}</del>
                @else
                    <ins class="new-price">৳{{number_format($variantMinPrice)}}</ins>
                @endif
            @else
                @if($mayLikedProduct->discount_price > 0)
                    <ins class="new-price">৳{{number_format($mayLikedProduct->discount_price)}}</ins>
                    <del class="old-price">৳{{number_format($mayLikedProduct->price)}}</del>
                @else
                    <ins class="new-price">৳{{number_format($mayLikedProduct->price)}}</ins>
                @endif
            @endif

        </div>
    </div>
</div>
