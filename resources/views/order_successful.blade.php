@extends('master')

@section('content')

<!-- Start of Main -->
<main class="main login-page">
    <!-- Auth Page  Area -->
    <section class="auth-page-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-xl-4 col-md-8 col-12">
            <div class="auth-card verifyOTP-card">
              <div class="auth-card-head" style="margin-top: 0">
                <div class="auth-card-head-icon">
                  <img src="{{url('assets')}}/images/icons/success.svg" alt="#" />
                </div>
                <h4 class="auth-card-title">Order successful ...</h4>
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
