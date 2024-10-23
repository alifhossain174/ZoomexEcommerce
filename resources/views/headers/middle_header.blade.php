<div class="header-middle">
    <div class="container">
        <div class="header-left mr-md-4">
            <a href="#" class="mobile-menu-toggle w-icon-hamburger" aria-label="menu-toggle"> </a>

            <a href="{{ url('/') }}" class="logo ml-lg-0">
                <img src="{{ url(env('ADMIN_URL') . '/' . $generalInfo->logo) }}" alt="{{ $generalInfo->company_name }}" width="144" height="45" />
            </a>

            <form action="{{ url('search/for/products') }}" method="GET" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                <input type="text" autocomplete="off" @if (isset($search_keyword)) value="{{ $search_keyword }}" @endif name="search_keyword" id="search_keyword" onkeyup="liveSearchProduct()" class="form-control" placeholder="Search for products..." required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
                <ul class="live_search_box d-none">

                </ul>
            </form>

        </div>
        <div class="header-right ml-4">
            <a class="wishlist label-down link d-xs-show" href="{{ url('/my/wishlists') }}">
                <i class="w-icon-heart"></i>
                <span class="wishlist-label d-lg-show">Wishlist</span>
            </a>

            <div class="dropdown cart-dropdown cart-offcanvas mr-lg-5">
                <div class="cart-overlay"></div>
                <a href="#" class="cart-toggle label-down link">
                    <i class="w-icon-cart">
                        <span class="cart-count">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                    </i>
                    <span class="cart-label">Cart</span>
                </a>
                <div class="dropdown-box" id="dropdown_box_sidebar_cart">

                    @include('sidebar_cart')

                </div>
                <!-- End of Dropdown Box -->
            </div>

            @auth
            <a class="wishlist label-down link d-xs-show mr-0" href="{{url('/home')}}">
                <i class="w-icon-account"></i>
                <span class="my-account-label d-lg-show">My Account</span>
            </a>
            @endauth

            @guest
            <a class="wishlist label-down link d-xs-show mr-0" href="{{url('/login')}}">
                <i class="w-icon-account"></i>
                <span class="my-account-label d-lg-show">Login/Register</span>
            </a>
            @endguest
        </div>
    </div>
</div>
