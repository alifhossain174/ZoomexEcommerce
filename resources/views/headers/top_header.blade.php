<div class="header-top">
    <div class="container">
        <div class="header-left">
            <p class="welcome-msg">Welcome to {{env('APP_NAME')}}</p>
        </div>
        <div class="header-right">
            <a href="{{$generalInfo->play_store_link}}" target="_blank" class="d-lg-show">Save more on app</a>
            <span class="divider d-lg-show"></span>
            <a href="{{ url('vendor/registration') }}" class="d-lg-show">Sell on Zomex</a>
            <span class="divider d-lg-show"></span>
            <a href="{{url('track/order')}}" class="d-lg-show">Track Order</a>
        </div>
    </div>
</div>
