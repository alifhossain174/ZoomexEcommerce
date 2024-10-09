<div class="getcom-user-sidebar">
    <div class="user-sidebar-head">
        <div class="user-sidebar-profile">
            @if(Auth::user()->image)
                <img alt="" src="{{env('ADMIN_URL')."/".Auth::user()->image}}" />
            @endif
        </div>
        <div class="user-sidebar-profile-info">
            <h5>{{Auth::user()->name}}</h5>
            <p>{{Auth::user()->email}}</p>
            <p>{{Auth::user()->phone}}</p>
            <p>Reward Points: {{Auth::user()->balance}}</p>
        </div>
    </div>
    <div class="user-sidebar-menus">
        <ul class="user-sidebar-menu-list">
            <li class="{{ (Request::path() == 'home') ? 'active' : ''}}">
                <a href="{{url('/home')}}"><i class="fi-ss-apps"></i>Dashboard</a>
            </li>
            <li class="{{ (Request::path() == 'my/orders') || (str_contains(Request::path(), 'order/details')) || (str_contains(Request::path(), 'track/my/order')) ? 'active' : ''}}">
                <a href="{{url('/my/orders')}}"><i class="fi-ss-shopping-cart"></i>My orders</a>
            </li>
            <li class="{{ (Request::path() == 'my/wishlists') ? 'active' : ''}}">
                <a href="{{url('/my/wishlists')}}"><i class="fi-ss-heart"></i>Wishlist's</a>
            </li>
            <li class="{{ (Request::path() == 'promo/coupons') ? 'active' : ''}}">
                <a href="{{url('/promo/coupons')}}"><i class="fi-ss-ticket"></i>Promo/ Coupon</a>
            </li>
            <li class="{{ (Request::path() == 'user/address') ? 'active' : ''}}">
                <a href="{{url('user/address')}}"><i class="fi-ss-map-marker"></i>Address</a>
            </li>
            <li class="{{ (Request::path() == 'my/payments') ? 'active' : ''}}">
                <a href="{{url('/my/payments')}}"><i class="fi-ss-credit-card"></i>Payments</a>
            </li>
            <li class="{{ (Request::path() == 'product/reviews') ? 'active' : ''}}">
                <a href="{{url('/product/reviews')}}"><i class="fi-ss-star"></i>Product reviews</a>
            </li>
            <li class="{{ (Request::path() == 'support/tickets') || (Request::path() == 'create/ticket') || (str_contains(Request::path(), 'support/ticket/message')) ? 'active' : ''}}">
                <a href="{{url('/support/tickets')}}"><i class="fi-ss-comments"></i>Support tickets</a>
            </li>
            <li class="{{ (Request::path() == 'manage/profile') ? 'active' : ''}}">
                <a href="{{url('/manage/profile')}}"><i class="fi-ss-settings"></i>Manage profile</a>
            </li>
            <li class="{{ (Request::path() == 'change/password') ? 'active' : ''}}">
                <a href="{{url('change/password')}}"><i class="fi-ss-password"></i>Change password</a>
            </li>
        </ul>
        <div class="user-sidebar-profile-btn">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fi-rr-sign-out-alt"></i>Logout</a>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
