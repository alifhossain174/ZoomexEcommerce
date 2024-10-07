<div class="product-price">
    @if($variants && count($variants) > 0)
        @if($variantMinDiscountPrice > 0)
            <ins class="new-price new-price-filter">৳{{number_format($variantMinDiscountPrice)}}</ins>
            <small class="old-price-filter"><del class="old-price">৳{{number_format($variantMinPrice)}}</del></small>

            <input type="hidden" name="product_price" id="product_discount_price" value="{{$variantMinDiscountPrice}}">
            <input type="hidden" name="product_price" id="product_price" value="{{$variantMinPrice}}">
        @else
            <ins class="new-price new-price-filter">৳{{number_format($variantMinPrice)}}</ins>
            <small class="mr-0 old-price-filter"><del class="old-price"></del></small>

            <input type="hidden" name="product_price" id="product_discount_price" value="0">
            <input type="hidden" name="product_price" id="product_price" value="{{$variantMinPrice}}">
        @endif
    @else
        @if($product->discount_price > 0)
            <ins class="new-price new-price-filter">৳{{number_format($product->discount_price)}}</ins>
            <small class="old-price-filter"><del class="old-price">৳{{number_format($product->price)}}</del></small>

            <input type="hidden" name="product_price" id="product_discount_price" value="{{$product->discount_price}}">
            <input type="hidden" name="product_price" id="product_price" value="{{$product->price}}">
        @else
            <ins class="new-price new-price-filter">৳{{number_format($product->price)}}</ins>
            <small class="mr-0 old-price-filter"><del class="old-price"></del></small>

            <input type="hidden" name="product_price" id="product_discount_price" value="0">
            <input type="hidden" name="product_price" id="product_price" value="{{$product->price}}">
        @endif
    @endif
</div>
