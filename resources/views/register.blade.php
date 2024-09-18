@extends('master')

@section('content')

 <!-- Start of Main -->
 <main class="main login-page">
    <!-- Auth Page  Area -->
    <section class="auth-page-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-xl-4 col-md-8 col-12">
            <div class="auth-card">
              <div class="auth-card-head">
                <div class="auth-card-head-icon">
                  <img src="{{url('assets')}}/images/icons/edit.svg" alt="#" />
                </div>
                <h4 class="auth-card-title">Register Account</h4>
              </div>
              <div class="auth-card-form-body">
                <form class="auth-card-form" action="#" method="post">
                  <div class="form-group">
                    <div class="form-group-icon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input name="name" placeholder="Full name" required="" type="text" id="name" class="form-control" value="" />
                  </div>
                  <div class="form-group">
                    <div class="form-group-icon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input name="email" placeholder="Email or phone number" required="" type="email" id="email" class="form-control" value="" />
                  </div>
                  <div class="form-group">
                    <div class="form-group-icon">
                      <i class="fa fa-lock"></i>
                    </div>
                    <input name="password" placeholder="Password" required="" type="password" id="password" class="form-control" value="" />
                  </div>

                  <button id="show-confirmation-email-modal" type="button" class="auth-card-form-btn primary__btn">Register account</button>
                </form>
                <div class="auth-card-bottom">
                  <span>or</span>
                  <div class="auth-card-google-btn">
                    <a target="_blank" href="#"><img src="{{url('assets')}}/images/icons/google.svg" alt="#" />Register with Google</a>
                  </div>
                  <p class="auth-card-bottom-link">Already have an account?<a href="login.html">Sign in</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Auth Page  Area -->
  </main>
  <!-- End of Main -->

@endsection
