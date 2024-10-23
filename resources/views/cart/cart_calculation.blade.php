<h3 class="cart-title text-uppercase">Cart Totals</h3>

@if(session('cart') && count(session('cart')) > 0)
@foreach(session('cart') as $id => $details)
<div class="order-total d-flex justify-content-between align-items-center mb-2">
    <label>{{$details['quantity']}} × {{ substr($details['name'], 0, 35) }}..</label>
    <span class="ls-50">
        @if($details['discount_price'] > 0 && $details['discount_price'] < $details['price'])
        ৳ {{$details['discount_price']*$details['quantity']}}
        @else
        ৳ {{$details['price']*$details['quantity']}}
        @endif
    </span>
</div>
@endforeach
@endif

<hr class="divider" />

<div class="cart-subtotal d-flex align-items-center justify-content-between mb-2">
    <label class="ls-25">Subtotal</label>
    @php $cartTotal = 0 @endphp
    @foreach((array) session('cart') as $id => $details)
        @php
            $cartTotal += ($details['discount_price'] > 0 ? $details['discount_price'] : $details['price']) * $details['quantity']
        @endphp
    @endforeach
    <span>৳ {{number_format($cartTotal)}}</span>
</div>

<a href="{{url('/checkout')}}" class="btn btn-block btn-dark btn-icon-right btn-rounded btn-checkout">Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
