@if($variants && count($variants) > 0)
    @if($variantMinDiscountPrice > 0)
        <ins class="new-price">৳{{number_format($variantMinDiscountPrice, 2)}}</ins>
        <del class="old-price">৳{{number_format($variantMinPrice, 2)}}</del>
    @else
        <ins class="new-price">৳{{number_format($variantMinPrice, 2)}}</ins>
    @endif
@else
    @if($product->discount_price > 0)
        <ins class="new-price">৳{{number_format($product->discount_price, 2)}}</ins>
        <del class="old-price">৳{{number_format($product->price, 2)}}</del>
    @else
        <ins class="new-price">৳{{number_format($product->price, 2)}}</ins>
    @endif
@endif

