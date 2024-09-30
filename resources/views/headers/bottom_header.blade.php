<div class="header-bottom sticky-content fix-top sticky-header @if(Request::path() == '/') has-dropdown @endif">
    <div class="container">
        <div class="inner-wrap">
            <div class="header-left">
                <div class="dropdown category-dropdown has-border" data-visible="true">
                    <a href="#" class="category-toggle @if(Request::path() == '/') text-dark @endif" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                        <i class="w-icon-category"></i>
                        <span>Browse Categories</span>
                    </a>

                    <div class="dropdown-box">
                        <ul class="menu vertical-menu category-menu">
                            @foreach ($categories as $category)
                                @if($category->show_on_navbar == 1)
                                    @php
                                        $subcategories = DB::table('subcategories')->where('status', 1)->where('category_id', $category->id)->orderBy('serial', 'asc')->get();
                                    @endphp
                                    <li>
                                        <a href="{{ url('shop') }}?category={{$category->slug}}">
                                            <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{ url(env('ADMIN_URL')."/".$category->icon) }}" style="height: 18px; width: 18px; border-radius: 50%"> {{$category->name}}
                                        </a>

                                        @if(count($subcategories) > 0)
                                        <ul class="megamenu">

                                            <li @if(!$category->banner_image) style="flex: auto !important" @endif>
                                                @foreach ($subcategories as $subcategory)

                                                    @php
                                                        $childcategories = DB::table('child_categories')->where('status', 1)->where('subcategory_id', $subcategory->id)->get();
                                                    @endphp

                                                    <div class="subcategory_box">
                                                        <h4 class="menu-title"><a href="{{ url('shop') }}?category={{$category->slug}}&subcategory={{$subcategory->slug}}" class="subcategory_box_link">{{$subcategory->name}}</a></h4>
                                                        <hr class="divider" style="margin-right: 15px"/>
                                                        @if(count($childcategories) > 0)
                                                        <ul>
                                                            @foreach ($childcategories as $childcategory)
                                                            <li>
                                                                <a href="{{ url('shop') }}?category={{$category->slug}}&subcategory={{$subcategory->slug}}&childcategory={{$childcategory->slug}}">{{$childcategory->name}}</a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    </div>

                                                @endforeach
                                            </li>

                                            @if($category->banner_image)
                                            <li>
                                                <div class="menu-banner banner-fixed menu-banner3">
                                                    <figure>
                                                        <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{ url(env('ADMIN_URL')."/".$category->banner_image) }}" alt="" width="235" height="461" />
                                                    </figure>
                                                </div>
                                            </li>
                                            @endif

                                        </ul>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                            <li>
                                <a href="{{url('/shop')}}" class="font-weight-bold text-primary text-uppercase ls-25">
                                    View All Categories<i class="w-icon-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <nav class="main-nav">
                    <ul class="menu active-underline">
                        <li class="@if(Request::path() == '/') active @endif">
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li class="@if(Request::path() == 'shop') active @endif">
                            <a href="{{url('/shop')}}">Shop</a>
                        </li>
                        <li class="@if(Request::path() == 'vendor/shops') active @endif">
                            <a href="{{url('/vendor/shops')}}">Vendor Shop</a>
                        </li>
                        <li class="@if(Request::path() == 'about') active @endif">
                            <a href="{{url('/about')}}">About Us</a>
                        </li>
                        <li class="@if(Request::path() == 'blogs') active @endif">
                             <a href="{{url('/blogs')}}">Blog</a>
                        </li>
                        <li class="@if(Request::path() == 'contact') active @endif">
                            <a href="{{url('/contact')}}">Contact Us</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                <a href="{{url('/vendor/registration')}}" class="become-vendor-btn"><i class="w-icon-store"></i> &nbsp;Become A Vendor</a>
            </div>
        </div>
    </div>
</div>
