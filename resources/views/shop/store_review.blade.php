<div class="review-area">
    <h3 class="title font-weight-bold mb-5" style="border-bottom: 1px solid #e7e7e7; padding-bottom: 10px;">Reviews</h3>

    <!-- End of Review Ratings -->
    @foreach ($productReviewsOfStore as $productReviewOfStore)
    <div class="user-wrap mb-5">
        <div class="user-photo">
            <figure style="margin-bottom: 1rem;">
                @if($productReviewOfStore->customer_image)
                    <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{env('ADMIN_URL')."/".$productReviewOfStore->customer_image}}" alt="" width="113" height="112"/>
                @else
                    <img src="{{url('assets')}}/images/vendor/wcfm/avatar.png" alt="" width="113" height="112" />
                @endif
            </figure>
            <div class="rated text-center">
                <label>Rated</label>
                <span class="score">{{$productReviewOfStore->rating}} out of 5</span>
            </div>
        </div>
        <!-- End of User Photo -->
        <div class="user-info" style="max-width: 100%;">
            <h4 class="user-name" style="margin-bottom: 10px;">{{$productReviewOfStore->customer_name}}</h4>
            <div class="user-date mb-4">
                <span>{{date("M d, Y h:i a", strtotime($productReviewOfStore->created_at))}}</span>
            </div>
            <p>{{$productReviewOfStore->review}}</p>
            <div class="user-date-img">

                <div class="single-user-date-img">
                    <a href="{{env('ADMIN_URL')."/".$productReviewOfStore->image}}" data-fancybox="photo">
                        <img class="lazy" src="{{url('assets')}}/img/product-load.gif" data-src="{{env('ADMIN_URL')."/".$productReviewOfStore->image}}" alt="" />
                    </a>
                </div>

            </div>
        </div>
        <!-- End of User Info -->
    </div>
    @endforeach
    <!-- End of User Wrap -->
</div>
