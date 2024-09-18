@extends('master')

@section('content')

 <!-- Start of Main -->
 <main class="main">
    <!-- Start Category Area -->
    <div class="category-responsive-area">
      <!-- Tab Menu -->
      <div class="category-responsive-tab-menu tab-menu">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item active" data-bs-toggle="list" href="#tab1" role="tab">
            <div class="category-menu-icon">
              <i class="w-icon-tshirt2"></i>
            </div>
            <div class="category-menu-text">
              <span>Fashion</span>
            </div>
          </a>
          <a class="list-group-item" data-bs-toggle="list" href="#tab2" role="tab">
            <div class="category-menu-icon">
              <i class="w-icon-home"></i>
            </div>
            <div class="category-menu-text">
              <span>Home & Garden </span>
            </div>
          </a>

          <a class="list-group-item" data-bs-toggle="list" href="#tab3" role="tab">
            <div class="category-menu-icon">
              <i class="w-icon-home"></i>
            </div>
            <div class="category-menu-text">
              <span>Home & Garden </span>
            </div>
          </a>

          <a class="list-group-item" data-bs-toggle="list" href="#tab4" role="tab">
            <div class="category-menu-icon">
              <i class="w-icon-electronics"></i>
            </div>
            <div class="category-menu-text">
              <span>Electronics </span>
            </div>
          </a>

          <a class="list-group-item" data-bs-toggle="list" href="#tab5" role="tab">
            <div class="category-menu-icon">
              <i class="w-icon-furniture"></i>
            </div>
            <div class="category-menu-text">
              <span>Furniture </span>
            </div>
          </a>

          <a class="list-group-item" data-bs-toggle="list" href="#tab6" role="tab">
            <div class="category-menu-icon">
              <i class="w-icon-heartbeat"></i>
            </div>
            <div class="category-menu-text">
              <span>Healthy & Beauty </span>
            </div>
          </a>
          <a class="list-group-item" data-bs-toggle="list" href="#tab7" role="tab">
            <div class="category-menu-icon">
              <i class="w-icon-gift"></i>
            </div>
            <div class="category-menu-text">
              <span>Gift Ideas </span>
            </div>
          </a>
          <a class="list-group-item" data-bs-toggle="list" href="#tab8" role="tab">
            <div class="category-menu-icon">
              <i class="w-icon-gamepad"></i>
            </div>
            <div class="category-menu-text">
              <span>Toy & Games </span>
            </div>
          </a>
          <a class="list-group-item" data-bs-toggle="list" href="#tab9" role="tab">
            <div class="category-menu-icon">
              <i class="w-icon-ice-cream"></i>
            </div>
            <div class="category-menu-text">
              <span>Cooking </span>
            </div>
          </a>
          <a class="list-group-item" data-bs-toggle="list" href="#tab10" role="tab">
            <div class="category-menu-icon">
              <i class="w-icon-ios"></i>
            </div>
            <div class="category-menu-text">
              <span>Smart Phones </span>
            </div>
          </a>
        </div>
      </div>

      <!-- Tab Details -->
      <div class="category-responsive-tab-details tab-details">
        <div class="tab-content" id="nav-tabContent">
          <!-- Tab One -->
          <div class="tab-pane fade show active" id="tab1" role="tabpanel">
            <div class="responsive-sub-category accordion" id="accordionExample">
              <!-- Single Sub Category -->
              <div class="responsive-sub-category-wrapper accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Women</button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="responsive-sub-category-group">
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                  </div>
                </div>
              </div>

              <!-- Single Sub Category -->
              <div class="responsive-sub-category-wrapper accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Men</button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="responsive-sub-category-group">
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                  </div>
                </div>
              </div>

              <!-- Single Sub Category -->
              <div class="responsive-sub-category-wrapper accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Western Wear</button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="responsive-sub-category-group">
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                  </div>
                </div>
              </div>

              <!-- Single Sub Category -->
              <div class="responsive-sub-category-wrapper accordion-item">
                <h2 class="accordion-header" id="headingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Innerwear</button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                  <div class="responsive-sub-category-group">
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                    <!-- Single Product -->
                    <a href="shop.html" class="responsive-sub-category-card">
                      <img src="{{url('assets')}}/images/demos/demo2/products/1-1-2.jpg" alt="sub-category-img" />
                      <span>Women's Comforter</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Tab Two -->
          <div class="tab-pane fade" id="tab2" role="tabpanel">Fashion Product Details 2</div>

          <!-- Tab Three -->
          <div class="tab-pane fade" id="tab3" role="tabpanel">Fashion Product Details 3</div>

          <!-- Tab Four -->
          <div class="tab-pane fade" id="tab4" role="tabpanel">Fashion Product Details 4</div>

          <!-- Tab Five -->
          <div class="tab-pane fade" id="tab5" role="tabpanel">Fashion Product Details 5</div>
          <!-- Tab Six -->
          <div class="tab-pane fade" id="tab6" role="tabpanel">Fashion Product Details 6</div>
          <!-- Tab Seven -->
          <div class="tab-pane fade" id="tab7" role="tabpanel">Fashion Product Details 7</div>
          <!-- Tab Eight -->
          <div class="tab-pane fade" id="tab8" role="tabpanel">Fashion Product Details 8</div>
          <!-- Tab Nine -->
          <div class="tab-pane fade" id="tab9" role="tabpanel">Fashion Product Details 9</div>

          <!-- Tab Ten -->
          <div class="tab-pane fade" id="tab10" role="tabpanel">Fashion Product Details 10</div>
        </div>
      </div>
      <!-- End Tab Details -->
    </div>
    <!-- End Category Area -->
  </main>
  <!-- End of Main -->
</div>
<!-- End of Page Wrapper -->
@endsection
