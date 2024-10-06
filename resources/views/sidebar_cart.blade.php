<div class="cart-header">
    <span>Shopping Cart</span>
    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
</div>

@if(session('cart') && count(session('cart')))

    <div class="products">

        @foreach(session('cart') as $id => $details)
        <div class="product product-cart">
            <div class="product-detail">
                <a href="{{ url('product') }}/{{ $details['slug'] }}" class="product-name">{{ substr($details['name'], 0, 25) }}..</a>
                @if($details['color_id'] && $colorInfo = DB::table('colors')->where('id', $details['color_id'])->first()) <span class="color__variant" style="font-size: 14px"><b>Color:</b> {{$colorInfo->name}}</span> @endif
                @if($details['size_id'] && $sizeInfo = DB::table('product_sizes')->where('id', $details['size_id'])->first()) <span class="color__variant" style="font-size: 14px"><b>Size:</b> {{$sizeInfo->name}}</span> @endif
                <div class="price-box">
                    <span class="product-quantity">{{$details['quantity']}}</span>
                    @if($details['discount_price'] > 0 && $details['discount_price'] < $details['price'])
                    <span class="product-price">৳{{$details['discount_price']}}</span>
                    @else
                    <span class="product-price">৳{{$details['price']}}</span>
                    @endif
                </div>
            </div>
            <figure class="product-media">
                <a href="{{ url('product') }}/{{ $details['slug'] }}">
                    <img src="{{ url(env('ADMIN_URL')."/".$details['image']) }}" alt="" height="84" width="94" />
                </a>
            </figure>
            <button class="btn btn-link btn-close sidebar-product-remove" aria-label="button" data-id="{{$id}}">
                <i class="fas fa-times"></i>
            </button>
        </div>
        @endforeach

    </div>

    <div class="cart-total">
        <label>Subtotal:</label>
        @php $cartTotal = 0 @endphp
        @foreach((array) session('cart') as $id => $details)
            @php
                $cartTotal += ($details['discount_price'] > 0 ? $details['discount_price'] : $details['price']) * $details['quantity']
            @endphp
        @endforeach
        <span class="price">৳{{number_format($cartTotal, 2)}}</span>
    </div>

    <div class="cart-action">
        <a href="{{url('/view/cart')}}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
        <a href="{{url('/checkout')}}" class="btn btn-primary btn-rounded">Checkout</a>
    </div>

@else
    <div style="display:block; width: 100%; height: 100%; text-align:center; position: relative;">
        <div style="width: 100%; position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%);">
            <img src="{{url('assets')}}/img/empty_cart.png" alt="Empty Cart">
            <h5>No items in your cart!</h5>
        </div>
    </div>
@endif
