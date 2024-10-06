 <!-- Start of Footer -->
 <footer class="footer appear-animate" data-animation-options="{'name': 'fadeIn'}">
     <div class="container">
         <div class="footer-newsletter">
             <div class="row justify-content-center align-items-center">
                 <div class="col-xl-6 col-lg-6">
                     <div class="swiper-slide icon-box icon-box-side text-dark">
                         <div class="icon-box-icon d-inline-flex">
                             <i class="w-icon-envelop3"></i>
                         </div>
                         <div class="icon-box-content">
                             <h4 class="icon-box-title text-uppercase font-weight-bold">Subscribe To Our Newsletter</h4>
                             <p>Get all the latest information on Events, Sales and Offers.</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-5 col-lg-5 col-md-9 mt-4 mt-lg-0">
                     <form action="{{ url('subscribe/for/newsletter') }}" method="POST" class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                        @csrf
                        @honeypot
                        <input type="email" name="email" class="form-control mr-2 bg-white text-default" placeholder="Your E-mail Address" />
                        <button class="btn btn-primary btn-rounded" type="submit">Subscribe<i class="w-icon-long-arrow-right"></i></button>
                     </form>
                 </div>
             </div>
         </div>
         <div class="footer-top">
             <div class="row">
                 <div class="col-lg-4 col-sm-6">
                     <div class="widget widget-about m-0">
                         <div class="widget-body">
                             <a href="index.html" class="logo-footer">
                                 <img src="assets/images/logo.png" alt="logo-footer" width="140" height="40" />
                             </a>
                             <p class="widget-about-title">Zomex Trading Limited</p>

                             <div class="footer-about-info">
                                 <ul>
                                     <li>
                                         <a href="#" target="_blank"><i class="w-icon-map-marker"></i>House-141,
                                             Nabiganj Road,<br />
                                             Bandar, Narayanganj 1412</a>
                                     </li>
                                     <li>
                                         <a href="tel:+88-01614678765" target="_blank"><i
                                                 class="w-icon-call"></i>+88-01614678765</a>
                                     </li>
                                     <li>
                                         <a href="mailto:support@zomex.com.bd" target="_blank"><i
                                                 class="w-icon-envelop2"></i>Support@zomex.com.bd</a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-2 col-sm-6">
                     <div class="widget">
                         <h3 class="widget-title">Company</h3>
                         <ul class="widget-body">
                             <li><a href="about-us.html">About Zomex</a></li>
                             <li><a href="#">Zomex Blog</a></li>
                             <li><a href="#">Career</a></li>
                             <li><a href="#">Term & Conditons</a></li>
                             <li><a href="#">Privacy & Policy</a></li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-2 col-sm-6">
                     <div class="widget">
                         <h4 class="widget-title">My Account</h4>
                         <ul class="widget-body">
                             <li><a href="#">My Wallet</a></li>
                             <li><a href="wishlist.html">Wishlist</a></li>
                             <li><a href="#">How to Buy</a></li>
                             <li><a href="become-a-vendor.html">Sell on Zomex</a></li>
                             <li><a href="vendor-register.html">Vendor Register</a></li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-2 col-sm-6">
                     <div class="widget">
                         <h4 class="widget-title">Customer Service</h4>
                         <ul class="widget-body">
                             <li><a href="#">Contact Us</a></li>
                             <li><a href="#">Customer Care</a></li>
                             <li><a href="#">Track my order</a></li>
                             <li><a href="#">Return & Refund</a></li>
                             <li><a href="#">Shipping & Delivery</a></li>
                         </ul>
                     </div>
                 </div>

                 <div class="col-lg-2 col-sm-6">
                     <div class="widget">
                         <h4 class="widget-title">Download App</h4>
                         <div class="download-app">
                             <div class="download-app-inner">
                                 <a href="#" target="_blank"> <img src="./assets/images/google-play.svg"
                                         alt="#" /></a>
                                 <a href="#" target="_blank"> <img src="./assets/images/app-store.svg"
                                         alt="#" /></a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="footer-middle">
         <div class="container">
             <div class="row">
                 <div class="col-lg-4 col-sm-6">
                     <div class="footer-middle-widget">
                         <h3 class="footer-middle-title">Follow Us</h3>
                         <div class="social-icons social-icons-colored">
                             <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                             <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                             <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                             <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                             <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-2 col-sm-6">
                     <div class="footer-middle-widget">
                         <h3 class="footer-middle-title">Payment Method</h3>
                         <div class="footer-middle-img">
                             <img src="./assets/images/footer/payment.png" alt="payment" />
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-2 col-sm-6">
                     <div class="footer-middle-widget">
                         <h3 class="footer-middle-title">Our Concern</h3>
                         <div class="footer-middle-img">
                             <img src="./assets/images/footer/concern.png" alt="concern" />
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-2 col-sm-6">
                     <div class="footer-middle-widget">
                         <h3 class="footer-middle-title">Member of</h3>
                         <div class="footer-middle-img">
                             <img src="./assets/images/footer/member-of.png" alt="member-of" />
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-1 col-sm-6">
                     <div class="footer-middle-widget verified-by">
                         <h3 class="footer-middle-title">Verified by</h3>
                         <div class="footer-middle-img">
                             <img src="./assets/images/footer/verified-by.png" alt="veified-by" />
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-1 col-sm-6">
                     <div class="footer-middle-widget">
                         <h3 class="footer-middle-title">DBID</h3>
                         <div class="footer-middle-img">
                             <img src="./assets/images/footer/dbid.png" alt="dbid" />
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="footer-bottom">
         <div class="container">
             <div class="footer-left">
                 <p class="copyright text-white">All Right Reserved @ 2024 Zomex Trading Limited</p>
             </div>
         </div>
     </div>
 </footer>
 <!-- End of Footer -->
