<div class="product-qty-form">
    <div class="input-group">
        <input class="form-control" id="product_details_cart_qty" value="{{ isset(session()->get('cart')[$product->id]) ? session()->get('cart')[$product->id]['quantity'] : 1 }}" type="number" min="1" max="100" />
        <button class="w-icon-plus quantity__value_details increase" data-id="{{ $product->id }}"></button>
        <button class="w-icon-minus quantity__value_details decrease" data-id="{{ $product->id }}"></button>
    </div>
</div>

@if (isset(session()->get('cart')[$product->id]))
    <button style="flex: 1;
  margin-bottom: 1rem;
  padding-left: 0;
  padding-right: 0;
  min-width: 14rem;" class="btn btn-primary cart-qty-{{ $product->id }} removeFromCartQty" data-id="{{ $product->id }}" type="button"><i class="w-icon-cart"></i><span> Remove from Cart</span></button>
@else
    <button style="flex: 1;
  margin-bottom: 1rem;
  padding-left: 0;
  padding-right: 0;
  min-width: 14rem;" class="btn btn-primary cart-qty-{{ $product->id }} addToCartWithQty" data-id="{{ $product->id }}" type="button"><i class="w-icon-cart"></i><span> Add to Cart</span></button>
@endif

