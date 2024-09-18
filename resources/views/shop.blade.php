@extends('master')

@section('content')
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li><a href="index.html">Home</a></li>
                    <li>Shop</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <!-- Start of Shop Banner -->
                <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs"
                    style="
            background-image: url({{ url('assets') }}/images/shop/banner1.jpg);
            background-color: #ffc74e;
          ">
                    <div class="banner-content">
                        <h4 class="banner-subtitle font-weight-bold">
                            Accessories Collection
                        </h4>
                        <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">
                            Smart Wrist Watches
                        </h3>
                        <a href="{{ url('/shop') }}" class="btn btn-dark btn-rounded btn-icon-right">Discover Now<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
                <!-- End of Shop Banner -->

                <!-- Start of Shop Content -->
                <div class="shop-content row gutter-lg mb-10">
                    <!-- Start of Sidebar, Shop Sidebar -->
                    <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                        <!-- Start of Sidebar Overlay -->
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                        <!-- Start of Sidebar Content -->
                        <div class="sidebar-content scrollable">
                            <!-- Start of Sticky Sidebar -->
                            <div class="sticky-sidebar">
                                <div class="filter-actions">
                                    <label>Filter :</label>
                                    <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                                </div>
                                <!-- Start of Collapsible widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <label>All Categories</label>
                                    </h3>
                                    <ul class="widget-body filter-items search-ul">
                                        <li><a href="#">Accessories</a></li>
                                        <li><a href="#">Babies</a></li>
                                        <li><a href="#">Beauty</a></li>
                                        <li><a href="#">Decoration</a></li>
                                        <li><a href="#">Electronics</a></li>
                                        <li><a href="#">Fashion</a></li>
                                        <li><a href="#">Food</a></li>
                                        <li><a href="#">Furniture</a></li>
                                        <li><a href="#">Kitchen</a></li>
                                        <li><a href="#">Medical</a></li>
                                        <li><a href="#">Sports</a></li>
                                        <li><a href="#">Watches</a></li>
                                    </ul>
                                </div>
                                <!-- End of Collapsible Widget -->

                                <!-- Start of Collapsible Widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><label>Price</label></h3>
                                    <div class="widget-body">
                                        <ul class="filter-items search-ul">
                                            <li><a href="#">$0.00 - $100.00</a></li>
                                            <li><a href="#">$100.00 - $200.00</a></li>
                                            <li><a href="#">$200.00 - $300.00</a></li>
                                            <li><a href="#">$300.00 - $500.00</a></li>
                                            <li><a href="#">$500.00+</a></li>
                                        </ul>
                                        <form class="price-range">
                                            <input type="number" name="min_price" class="min_price text-center"
                                                placeholder="$min" /><span class="delimiter">-</span><input type="number"
                                                name="max_price" class="max_price text-center" placeholder="$max" /><a
                                                href="#" class="btn btn-primary btn-rounded">Go</a>
                                        </form>
                                    </div>
                                </div>
                                <!-- End of Collapsible Widget -->

                                <!-- Start of Collapsible Widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><label>Size</label></h3>
                                    <ul class="widget-body filter-items item-check mt-1">
                                        <li><a href="#">Extra Large</a></li>
                                        <li><a href="#">Large</a></li>
                                        <li><a href="#">Medium</a></li>
                                        <li><a href="#">Small</a></li>
                                    </ul>
                                </div>
                                <!-- End of Collapsible Widget -->

                                <!-- Start of Collapsible Widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><label>Brand</label></h3>
                                    <ul class="widget-body filter-items item-check mt-1">
                                        <li><a href="#">Elegant Auto Group</a></li>
                                        <li><a href="#">Green Grass</a></li>
                                        <li><a href="#">Node Js</a></li>
                                        <li><a href="#">NS8</a></li>
                                        <li><a href="#">Red</a></li>
                                        <li><a href="#">Skysuite Tech</a></li>
                                        <li><a href="#">Sterling</a></li>
                                    </ul>
                                </div>
                                <!-- End of Collapsible Widget -->

                                <!-- Start of Collapsible Widget -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><label>Color</label></h3>
                                    <ul class="widget-body filter-items item-check mt-1">
                                        <li><a href="#">Black</a></li>
                                        <li><a href="#">Blue</a></li>
                                        <li><a href="#">Brown</a></li>
                                        <li><a href="#">Green</a></li>
                                        <li><a href="#">Grey</a></li>
                                        <li><a href="#">Orange</a></li>
                                        <li><a href="#">Yellow</a></li>
                                    </ul>
                                </div>
                                <!-- End of Collapsible Widget -->
                            </div>
                            <!-- End of Sidebar Content -->
                        </div>
                        <!-- End of Sidebar Content -->
                    </aside>
                    <!-- End of Shop Sidebar -->

                    <!-- Start of Shop Main Content -->
                    <div class="main-content">
                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                            <div class="toolbox-left">
                                <a href="#"
                                    class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle btn-icon-left d-block d-lg-none"><i
                                        class="w-icon-category"></i><span>Filters</span></a>
                                <div class="toolbox-item toolbox-sort select-box text-dark">
                                    <label>Sort By :</label>
                                    <select name="orderby" class="form-control">
                                        <option value="default" selected="selected">
                                            Default sorting
                                        </option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by latest</option>
                                        <option value="price-low">
                                            Sort by pric: low to high
                                        </option>
                                        <option value="price-high">
                                            Sort by price: high to low
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show select-box">
                                    <select name="count" class="form-control">
                                        <option value="9">Show 9</option>
                                        <option value="12" selected="selected">Show 12</option>
                                        <option value="24">Show 24</option>
                                        <option value="36">Show 36</option>
                                    </select>
                                </div>
                            </div>
                        </nav>
                        <div class="product-wrapper row cols-lg-3 cols-md-4 cols-sm-2 cols-2">
                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-1-1.jpg" alt="Product"
                                                width="300" height="338" />
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">Women's Comforter</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳10.000</ins><del class="old-price">৳11,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                            <label class="product-label label-discount">-35%</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">White Valise</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳20,000</ins><del class="old-price">৳22,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top">5.00</span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                                width="300" height="338" />
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">Brown Leather Shoes</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳10.000</ins><del class="old-price">৳11,000</del>
                                        </div>

                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%"></span>
                                                <span class="tooltiptext tooltip-top">4.00</span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(6 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-4.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">Portable Flashlight</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳56,000</ins><del class="old-price">৳60,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-5.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">USB Charger</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳10.000</ins><del class="old-price">৳11,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-1-1.jpg" alt="Product"
                                                width="300" height="338" />
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">Women's Comforter</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳10.000</ins><del class="old-price">৳11,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                            <label class="product-label label-discount">-35%</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">White Valise</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳20,000</ins><del class="old-price">৳22,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                                width="300" height="338" />
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">Brown Leather Shoes</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳10.000</ins><del class="old-price">৳11,000</del>
                                        </div>

                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%"></span>
                                                <span class="tooltiptext tooltip-top">4.00</span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(6 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-4.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">Portable Flashlight</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳56,000</ins><del class="old-price">৳60,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-5.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">USB Charger</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳10.000</ins><del class="old-price">৳11,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-1-1.jpg" alt="Product"
                                                width="300" height="338" />
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">Women's Comforter</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳10.000</ins><del class="old-price">৳11,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                            <label class="product-label label-discount">-35%</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">White Valise</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳20,000</ins><del class="old-price">৳22,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top">5.00</span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                                width="300" height="338" />
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">Brown Leather Shoes</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳10.000</ins><del class="old-price">৳11,000</del>
                                        </div>

                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%"></span>
                                                <span class="tooltiptext tooltip-top">4.00</span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(6 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-4.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">Portable Flashlight</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳56,000</ins><del class="old-price">৳60,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-5.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">USB Charger</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳10.000</ins><del class="old-price">৳11,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-1-1.jpg" alt="Product"
                                                width="300" height="338" />
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">Women's Comforter</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳10.000</ins><del class="old-price">৳11,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-2.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                            <label class="product-label label-discount">-35%</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">White Valise</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳20,000</ins><del class="old-price">৳22,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                                width="300" height="338" />
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">Brown Leather Shoes</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳10.000</ins><del class="old-price">৳11,000</del>
                                        </div>

                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%"></span>
                                                <span class="tooltiptext tooltip-top">4.00</span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(6 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-4.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">Portable Flashlight</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳56,000</ins><del class="old-price">৳60,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-5.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">USB Charger</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳10.000</ins><del class="old-price">৳11,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-wrap">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/product/details') }}">
                                            <img src="{{url('assets')}}/images/demos/demo2/products/1-4.jpg" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                        <div class="product-label-fixed">
                                            <label>Zomex <span>Choice</span></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ url('/product/details') }}">Portable Flashlight</a>
                                        </h4>
                                        <div class="product-price">
                                            <ins class="new-price">৳56,000</ins><del class="old-price">৳60,000</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ url('/product/details') }}" class="rating-reviews">(3 Reviews)</a>
                                            <span class="sold-item">Sold (1530)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="toolbox toolbox-pagination justify-content-between">
                            <p class="showing-info mb-2 mb-sm-0">
                                Showing<span>1-12 of 60</span>Products
                            </p>
                            <ul class="pagination">
                                <li class="prev disabled">
                                    <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                        <i class="w-icon-long-arrow-left"></i>Prev
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="next">
                                    <a href="#" aria-label="Next">
                                        Next<i class="w-icon-long-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End of Shop Main Content -->
                </div>
                <!-- End of Shop Content -->
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
@endsection
