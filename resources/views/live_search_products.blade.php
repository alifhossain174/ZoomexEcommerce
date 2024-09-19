@foreach($searchProducts as $searchProduct)
    @php
        $totalStockAllVariants = 0; // jekonon variant er at least ekta stock e thakleo stock in dekhabe
        $variants = DB::table('product_variants')->select('discounted_price', 'price', 'stock')->where('product_id', $searchProduct->id)->get();
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

    <li class="live_search_item">
        <a class="live_search_product_link" href="{{url('product')}}/{{$searchProduct->slug}}">
            <img class="live_search_product_image lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{url(env('ADMIN_URL')."/".$searchProduct->image)}}" alt="">
            <h6 class="live_search_product_title">
                {{$searchProduct->name}}

                @if($variants && count($variants) > 0)
                    @if($variantMinDiscountPrice > 0)
                        <span class="live_search_product_price"><del>৳{{number_format($variantMinPrice)}}</del> ৳{{number_format($variantMinDiscountPrice)}}</span>
                    @else
                        <span class="live_search_product_price">৳{{number_format($variantMinPrice)}}</span>
                    @endif
                @else
                    @if($searchProduct->discount_price > 0)
                        <span class="live_search_product_price"><del>৳{{number_format($searchProduct->price)}}</del> ৳{{number_format($searchProduct->discount_price)}}</span>
                    @else
                        <span class="live_search_product_price">৳{{number_format($searchProduct->price)}}</span>
                    @endif
                @endif

            </h6>
        </a>
    </li>
@endforeach
