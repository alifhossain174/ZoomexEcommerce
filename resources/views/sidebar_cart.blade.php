<div class="cart-header">
    <span>Shopping Cart</span>
    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
</div>

<div class="products">

    <div class="product product-cart">
        <div class="product-detail">
            <a href="{{ url('/product/details') }}" class="product-name">Beige
                knitted
                elas<br />tic runner shoes</a>
            <div class="price-box">
                <span class="product-quantity">1</span>
                <span class="product-price">$25.68</span>
            </div>
        </div>
        <figure class="product-media">
            <a href="{{ url('/product/details') }}">
                <img src="{{ url('assets') }}/images/cart/product-1.jpg"
                    alt="product" height="84" width="94" />
            </a>
        </figure>
        <button class="btn btn-link btn-close" aria-label="button">
            <i class="fas fa-times"></i>
        </button>
    </div>

</div>

<div class="cart-total">
    <label>Subtotal:</label>
    <span class="price">$58.67</span>
</div>

<div class="cart-action">
    <a href="{{ url('/cart') }}" class="btn btn-dark btn-outline btn-rounded">View
        Cart</a>
    <a href="{{ url('/checkout') }}" class="btn btn-primary btn-rounded">Checkout</a>
</div>
