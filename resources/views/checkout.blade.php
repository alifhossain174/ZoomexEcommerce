@extends('master')

@section('content')

<!-- Start of Main -->
<div class="main">
    <!-- Breadcrumbs Area -->
    <section class="checkout-page-breadcrumbs">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-6 col-12">
            <div class="checkout-breadcrumbs-inner">
              <h4 class="checkout-breadcrumbs-title">Checkout</h4>
              <ul class="checkout-breadcrumbs-menu">
                <li><a href="index.html">Home</a><i class="fa fa-angle-right"></i></li>
                <li class="active"><a href="checkout.html">Checkout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Breadcrumbs Area -->

    <!-- Checkout Page Area -->
    <section class="checkout-area" style="background: #fff">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-xl-4 col-12">
            <div class="checkout-order-review">
              <h5 class="checkout-widget-title">Order review</h5>
              <div class="checkout-order-review-inner">
                <!-- Single CheckOut Order Review -->
                <div class="single-checkout-order-review">
                  <div class="cart-single-product-first-col">
                    <button type="button" class="cart-single-product-remove">
                      <i class="fa fa-trash"></i>
                    </button>
                  </div>
                  <div class="checkout-order-review-info">
                    <span class="cart-single-product-title">Samsung Galaxy A52 (8/128GB) - Blue-128GB</span>
                    <div class="checkout-order-varient-group">
                      <div class="c-order-varient-single">
                        <span>Color:<strong>Black</strong></span>
                      </div>
                      <div class="c-order-varient-single">
                        <span>Size:<strong>XXL</strong></span>
                      </div>
                    </div>
                  </div>
                  <div class="checkout-order-qty-price">
                    <div class="checkout-order-qty">
                      <span>Qty:</span>
                      <div class="quantity__box minicart__quantity">
                        <button type="button" class="quantity-minus quantity__value decrease qty-left-minus" aria-label="quantity value" data-type="minus" data-field="">-</button>

                        <input type="number" class="quantity quantity__number" min="0" max="10000000" />

                        <button type="button" class="quantity-plus quantity__value increase qty-right-plus" data-type="plus" data-field="">+</button>
                      </div>
                    </div>

                    <span class="checkout-order-price">Price:<strong>64,000 BDT</strong></span>
                  </div>
                </div>
                <!-- Single CheckOut Order Review -->
                <div class="single-checkout-order-review">
                  <div class="cart-single-product-first-col">
                    <button type="button" class="cart-single-product-remove">
                      <i class="fa fa-trash"></i>
                    </button>
                  </div>
                  <div class="checkout-order-review-info">
                    <span class="cart-single-product-title">Galaxy Watch4 Bluetooth (44mm)</span>
                    <div class="checkout-order-varient-group">
                      <div class="c-order-varient-single">
                        <span>Color:<strong>Red</strong></span>
                      </div>
                      <div class="c-order-varient-single">
                        <span>Size:<strong>XXL</strong></span>
                      </div>
                    </div>
                  </div>
                  <div class="checkout-order-qty-price">
                    <div class="checkout-order-qty">
                      <span>Qty:</span>
                      <div class="quantity__box minicart__quantity">
                        <button type="button" class="quantity-minus quantity__value decrease qty-left-minus" aria-label="quantity value" data-type="minus" data-field="">-</button>

                        <input type="number" class="quantity quantity__number" min="0" max="10000000" />

                        <button type="button" class="quantity-plus quantity__value increase qty-right-plus" data-type="plus" data-field="">+</button>
                      </div>
                    </div>

                    <span class="checkout-order-price">Price:<strong>64,000 BDT</strong></span>
                  </div>
                </div>
                <!-- Single CheckOut Order Review -->
                <div class="single-checkout-order-review">
                  <div class="cart-single-product-first-col">
                    <button type="button" class="cart-single-product-remove">
                      <i class="fa fa-trash"></i>
                    </button>
                  </div>
                  <div class="checkout-order-review-info">
                    <span class="cart-single-product-title">Samsung Common Charger TA (25W) (Without Cable)</span>
                    <div class="checkout-order-varient-group">
                      <div class="c-order-varient-single">
                        <span>Color:<strong>White</strong></span>
                      </div>
                      <div class="c-order-varient-single">
                        <span>Size:<strong>Large</strong></span>
                      </div>
                    </div>
                  </div>
                  <div class="checkout-order-qty-price">
                    <div class="checkout-order-qty">
                      <span>Qty:</span>
                      <div class="quantity__box minicart__quantity">
                        <button type="button" class="quantity-minus quantity__value decrease qty-left-minus" aria-label="quantity value" data-type="minus" data-field="">-</button>

                        <input type="number" class="quantity quantity__number" min="0" max="10000000" />

                        <button type="button" class="quantity-plus quantity__value increase qty-right-plus" data-type="plus" data-field="">+</button>
                      </div>
                    </div>

                    <span class="checkout-order-price">Price:<strong>4,000 BDT</strong></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-xl-4 col-12">
            <div class="checkout-personal-details single-details-box">
              <div class="single-details-checkout-widget">
                <div class="single-details-checkout-widget-head">
                  <h5 class="checkout-widget-title m-0">Billing address</h5>
                  <div class="change-address-btn">
                    <a class="theme-btn" href="#" data-bs-toggle="modal" data-bs-target="#changeAddress"><i class="fa fa-exchange-alt"></i>Change address</a>
                  </div>
                </div>

                <div class="c-personal-details-box single-details-box-inner">
                  <div class="address-fill-widget">
                    <h6>Meheraj Hossain Sagar</h6>
                    <ul>
                      <li>Flat #B4, House No: 71, Road: 27 Gulshan, Dhaka, Bangladesh</li>
                      <li><span>Phone:</span>+8801234567890</li>
                    </ul>
                  </div>
                </div>

                <!-- New User Address Widget -->
                <!-- <div class="new-user-address-widget">
              <p>No address found!</p>
              <div class="manage-address-add-address">
                <a class="theme-btn" href="#" data-bs-toggle="modal" data-bs-target="#addNewAddress2"><i class="fa fa-plus"></i>Add new address</a>
              </div>
            </div> -->
              </div>
              <div class="single-details-checkout-widget">
                <div class="single-details-checkout-widget-head">
                  <h5 class="checkout-widget-title m-0">Shipping address</h5>
                  <div class="change-address-btn">
                    <a class="theme-btn" href="#" data-bs-toggle="modal" data-bs-target="#changeAddress"><i class="fa fa-exchange-alt"></i>Change address</a>
                  </div>
                </div>

                <div class="c-personal-details-box single-details-box-inner">
                  <div class="address-fill-widget">
                    <h6>Meheraj Hossain Sagar</h6>
                    <ul>
                      <li>Flat #B4, House No: 71, Road: 27 Gulshan, Dhaka, Bangladesh</li>
                      <li><span>Phone:</span>+8801234567890</li>
                    </ul>
                  </div>
                </div>

                <!-- New User Address Widget -->
                <!-- <div class="new-user-address-widget">
                <p>No address found!</p>
                <div class="manage-address-add-address">
                  <a class="theme-btn" href="#" data-bs-toggle="modal" data-bs-target="#addNewAddress2"><i class="fa fa-plus"></i>Add new address</a>
                </div>
              </div> -->
              </div>
            </div>

            <div class="checkout-special-note">
              <h5 class="checkout-widget-title">Special notes</h5>
              <div class="checkout-special-note-box">
                <div class="form-group">
                  <textarea name="special-note"></textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-xl-4 col-12">
            <form action="#" method="post">
              <!-- Checkout Payment -->
              <div class="checkout-payment-method single-details-box">
                <div class="single-details-checkout-widget">
                  <h5 class="checkout-widget-title">Payment method</h5>
                  <div class="checkout-payment-method-inner single-details-box-inner">
                    <div class="payment-method-input">
                      <label for="flexRadioDefault1">
                        <div class="payment-method-input-main">
                          <input class="form-check-input" type="radio" checked name="flexRadioDefault" id="flexRadioDefault1" />
                          Cash on delivery (COD service)
                        </div>
                      </label>
                      <label for="flexRadioDefault2">
                        <div class="payment-method-input-main">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" />
                          SSLCommerz
                        </div>
                        <img alt="SSLCommerz" src="{{url('assets')}}/images/payment-method-img.svg" />
                      </label>
                      <label for="flexRadioDefault3">
                        <div class="payment-method-input-main">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" />
                          bKash Payment
                        </div>
                        <img alt="bKash Payment" src="{{url('assets')}}/images/bkash-img.svg" />
                      </label>
                    </div>
                  </div>
                </div>
                <div class="single-details-checkout-widget">
                  <h5 class="checkout-widget-title">Delivery method</h5>
                  <div class="checkout-payment-method-inner single-details-box-inner">
                    <div class="payment-method-input">
                      <label for="flexRadioDefault4">
                        <div class="payment-method-input-main">
                          <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault4" />
                          Home delivery
                        </div>
                      </label>
                      <label for="flexRadioDefault5">
                        <div class="payment-method-input-main">
                          <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault5" />
                          Store pickup
                        </div>
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Discount Accordion -->
              <div class="checkout-review-table-bottom">
                <div class="checkout-disocunt-accordion accordion accordion-bg accordion-gutter-md accordion-border">
                  <div class="card">
                    <div class="card-header">
                      <a href="#collapse1-1" class="collapse"> Have any coupon or gift voucher? </a>
                    </div>
                    <div id="collapse1-1" class="expanded">
                      <div class="accordion-body">
                        <div class="checkout-order-review-coupon-box">
                          <div class="cart-single-coupon-form">
                            <div class="cart-single-coupon-input">
                              <input type="text" placeholder="Enter coupon" required="" name="coupon-input" />
                              <div class="cart-coupon-form-btn">
                                <button type="submit" class="theme-btn hover">Apply coupon</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="coupon-code-validate display-flex">
                          <div class="coupon-code-validate-data">
                            <h6 class="coupon-code-name">NEWYR2K23 <span>(-20%)</span></h6>
                            <p class="coupon-code-applied m-0"><i class="fa fa-check"></i>Coupon applied</p>
                          </div>
                          <div class="coupon-code-remove-button">
                            <button type="button" class="theme-btn hover">Remove</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <a href="#collapse1-2" class="expand"> Use Club Points </a>
                    </div>
                    <div id="collapse1-2" class="collapsed">
                      <div class="accordion-body">
                        <div class="club-points-form">
                          <div class="form-group">
                            <label>You have<b>82 Club Points</b>available</label>
                            <input type="text" name="points" placeholder="Enter amount of points to spend" required />
                          </div>
                          <div class="checkout-checkbox-details">
                            <input class="form-check-input" type="checkbox" id="flexCheckChecked3" value="" /><label class="form-check-label" for="flexCheckChecked3">Use maximum<b>82 Club Points</b></label>
                          </div>
                          <div class="club-points-form-btn">
                            <button type="submit" class="theme-btn">Apply</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="order-review-summary">
                    <div class="cart-order-summary-main">
                      <ul class="cart-order-summary-main-list">
                        <li>Sub total <span>125,099.00 BDT</span></li>
                        <li>
                          Discount
                          <span><b>(-20%) </b>5,000.00 BDT</span>
                        </li>
                        <li>
                          VAT/TAX
                          <span> <b>(+5%)</b>520.00 BDT</span>
                        </li>
                        <li>Delivery cost <span>420.00 BDT</span></li>
                      </ul>
                      <div class="total-price">Total<span>121,039.00 BDT</span></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Checkout Bottom  -->
              <div class="checkout-order-review-bottom">
                <div class="row">
                  <div class="col-12">
                    <div class="checkout-checkbox-details">
                      <input class="form-check-input" type="checkbox" id="flexCheckChecked2" value="" /><label class="form-check-label" for="flexCheckChecked2"
                        >I have read and agree to the <a href="#">Terms and Conditions</a>,<a href="#">Privacy Policy</a>
                        and
                        <a href="#">Refund and Return Policy</a>.</label
                      >
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="checkout-order-review-button">
                      <button type="submit" class="btn theme-bg-color btn-md text-white fw-bold mend-auto">Place order</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- End Checkout Page Area -->
  </div>
  <!-- End of Main -->

@endsection
