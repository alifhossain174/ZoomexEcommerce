@if($totalStockAllVariants)
<a href="javascript:void(0)" class="btn-product-icon btn-cart w-icon-cart cart-{{$product->id}} addToCart" data-id="{{$product->id}}" title="Add to cart"></a>
@endif
<a href="{{ url('add/to/wishlist') }}/{{$product->slug}}" class="btn-product-icon w-icon-heart" title="Add to wishlist"></a>
{{-- <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="Quickview"></a> --}}
