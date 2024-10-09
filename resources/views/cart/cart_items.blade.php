@if(session('cart') && count(session('cart')) > 0)
    @foreach(session('cart') as $id => $details)
    <tr>
        <td class="product-thumbnail">
            <div class="p-relative">
                <a href="{{ url('product/details') }}/{{ $details['slug'] }}">
                    <figure>
                        <img src="{{ url(env('ADMIN_URL')."/".$details['image']) }}" alt="" height="300" width="300" />
                    </figure>
                </a>
                <button type="submit" class="btn btn-close sidebar-product-remove" data-id="{{$id}}">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </td>
        <td class="product-name">
            <a href="{{ url('product/details') }}/{{ $details['slug'] }}">
                {{$details['name']}}
                <br>
                @if($details['color_id'] && $colorInfo = DB::table('colors')->where('id', $details['color_id'])->first()) <span class="color__variant" style="font-size: 14px"><b>Color:</b> {{$colorInfo->name}}</span> @endif
                @if($details['size_id'] && $sizeInfo = DB::table('product_sizes')->where('id', $details['size_id'])->first()) <span class="color__variant" style="font-size: 14px"><b>Size:</b> {{$sizeInfo->name}}</span> @endif
            </a>
        </td>
        <td class="product-price text-center">
            <span class="amount">
                @if($details['discount_price'] > 0 && $details['discount_price'] < $details['price'])
                ৳{{$details['discount_price']}}
                @else
                ৳{{$details['price']}}
                @endif
            </span>
        </td>
        <td class="product-quantity text-center">
            <div class="input-group">
                <input class="form-control" style="border-radius: 4px;" value="{{$details['quantity']}}" type="number" min="1" max="100" />
                <button class="w-icon-plus quantity__value_details increase" data-id="{{$id}}"></button>
                <button class="w-icon-minus quantity__value_details decrease" data-id="{{$id}}"></button>
            </div>
        </td>
        <td class="product-subtotal text-center">
            <span class="amount">
                @if($details['discount_price'] > 0 && $details['discount_price'] < $details['price'])
                ৳{{$details['discount_price']*$details['quantity']}}
                @else
                ৳{{$details['price']*$details['quantity']}}
                @endif
            </span>
        </td>
    </tr>
    @endforeach
@else
<tr>
    <td colspan="5" class="text-center" style="font-weight: 600; font-size: 16px; padding: 10px 0px;">No Items in Cart</td>
</tr>
@endif
