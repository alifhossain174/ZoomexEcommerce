<div class="row mb-4">
    <div class="col-xl-4 col-lg-5 mb-4">
        <div class="ratings-wrapper">
            <div class="avg-rating-container">
                <h4 class="avg-mark font-weight-bolder ls-50">
                    {{number_format($averageRating, 1)}}
                </h4>
                <div class="avg-rating">
                    <p class="text-dark mb-1">Average Rating</p>
                    <div class="ratings-container">
                        @if($totalReviews > 0)
                            @for ($i=1;$i<=round($averageRating);$i++)
                            <i class="fas fa-star" style="color: var(--secondary-color);"></i>
                            @endfor

                            @for ($i=1;$i<=5-round($averageRating);$i++)
                            <i class="far fa-star" style="color: gray;"></i>
                            @endfor
                        @else
                            <i class="far fa-star" style="color: gray;"></i>
                            <i class="far fa-star" style="color: gray;"></i>
                            <i class="far fa-star" style="color: gray;"></i>
                            <i class="far fa-star" style="color: gray;"></i>
                            <i class="far fa-star" style="color: gray;"></i>
                        @endif

                        &nbsp;&nbsp;<a href="javascript:void(0)" class="rating-reviews">({{$totalReviews}} Reviews)</a>
                    </div>
                </div>
            </div>
            <div class="ratings-value d-flex align-items-center text-dark ls-25">
                <span class="text-dark font-weight-bold">{{number_format(($averageRating / 5) * 100, 2)}}%</span>
                @if($averageRating == 5)
                Recommended<span class="count">(3 of 3)</span>
                @elseif($averageRating >= 3 && $averageRating < 5)
                Recommended<span class="count">(2 of 3)</span>
                @else
                Recommended<span class="count">(1 of 3)</span>
                @endif
            </div>
            <div class="ratings-list">
                @php
                    $fiveStarReviews = DB::table('product_reviews')->where('product_reviews.product_id', $product->id)->where('rating', 5)->where('product_reviews.status', 1)->count();
                    $fourStarReviews = DB::table('product_reviews')->where('product_reviews.product_id', $product->id)->where('rating', 4)->where('product_reviews.status', 1)->count();
                    $threeStarReviews = DB::table('product_reviews')->where('product_reviews.product_id', $product->id)->where('rating', 3)->where('product_reviews.status', 1)->count();
                    $twoStarReviews = DB::table('product_reviews')->where('product_reviews.product_id', $product->id)->where('rating', 2)->where('product_reviews.status', 1)->count();
                    $oneStarReviews = DB::table('product_reviews')->where('product_reviews.product_id', $product->id)->where('rating', 1)->where('product_reviews.status', 1)->count();
                @endphp
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 100%"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <div class="progress-bar progress-bar-sm">
                        <span></span>
                    </div>
                    <div class="progress-value">
                        @if($totalReviews)<mark>{{ceil(($fiveStarReviews/$totalReviews)*100)}}</mark>@else<mark>0%</mark>@endif
                    </div>
                </div>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 80%"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <div class="progress-bar progress-bar-sm">
                        <span></span>
                    </div>
                    <div class="progress-value">
                        @if($totalReviews)<mark>{{ceil(($fourStarReviews/$totalReviews)*100)}}</mark>@else<mark>0%</mark>@endif
                    </div>
                </div>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 60%"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <div class="progress-bar progress-bar-sm">
                        <span></span>
                    </div>
                    <div class="progress-value">
                        @if($threeStarReviews)<mark>{{ceil(($threeStarReviews/$totalReviews)*100)}}</mark>@else<mark>0%</mark>@endif
                    </div>
                </div>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 40%"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <div class="progress-bar progress-bar-sm">
                        <span></span>
                    </div>
                    <div class="progress-value">
                        @if($twoStarReviews)<mark>{{ceil(($twoStarReviews/$totalReviews)*100)}}</mark>@else<mark>0%</mark>@endif
                    </div>
                </div>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 20%"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <div class="progress-bar progress-bar-sm">
                        <span></span>
                    </div>
                    <div class="progress-value">
                        @if($oneStarReviews)<mark>{{ceil(($oneStarReviews/$totalReviews)*100)}}</mark>@else<mark>0%</mark>@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-7 mb-4">
        <div class="review-form-wrapper">
            <h3 class="title tab-pane-title font-weight-bold mb-1">
                Submit Your Review
            </h3>
            <p class="mb-3">
                Your email address will not be published. Required
                fields are marked *
            </p>
            <form action="{{url('submit/product/review')}}" method="post" class="review-form">
                @csrf
                <input type="hidden" name="review_product_id" value="{{$product->id}}">
                <div class="form-group mb-1">
                    <label for="review" class="d-block pl-0 mb-1">Write your opinion about the product</label>
                    <textarea cols="30" rows="6" name="review" placeholder="Write Your Review Here..." class="form-control" id="review"></textarea>
                </div>
                <div class="row gutter-md">
                    <div class="col-md-6">
                        <label for="review" class="d-block pl-0 mb-1">Your Rating: </label>
                        <select name="rarting" class="form-control" required="">
                            <option value="">Select One</option>
                            <option value="5">Perfect</option>
                            <option value="4">Good</option>
                            <option value="3">Average</option>
                            <option value="2">Not that bad</option>
                            <option value="1">Very poor</option>
                        </select>
                    </div>
                    <div class="col-md-6 text-right">
                        <label for="review" class="d-block pl-0 mb-1">&nbsp;</label>
                        <button type="submit" style="padding: 0.75em 1.98em;" class="btn btn-dark">
                            Submit Review
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
    <div class="tab-content">
        <div class="tab-pane active" id="show-all">
            <ul class="comments list-style-none">

                @foreach ($productReviews as $productReview)
                <li class="comment" style="padding: 2rem 0;">
                    <div class="comment-body">
                        <figure class="comment-avatar">
                            <img src="{{url('assets')}}/images/agents/1-100x100.png" alt="" style="height: 90px; width: 90px; max-height: 90px; max-width: 90px; border-radius: 50%"/>
                        </figure>
                        <div class="comment-content">
                            <h4 class="comment-author">
                                <a href="javascript:void(0)">{{$productReview->username}}</a>
                                <span class="comment-date">{{date("F d, Y h:i a", strtotime($productReview->created_at))}}</span>
                            </h4>
                            <div class="ratings-container comment-rating">
                                @for ($i=1;$i<=round($productReview->rating);$i++)
                                <i class="fas fa-star" style="color: #FFB639;"></i>
                                @endfor
                                @for ($i=1;$i<=5-round($productReview->rating);$i++)
                                <i class="far fa-star"></i>
                                @endfor
                            </div>
                            <p>
                                {{$productReview->review}}
                            </p>
                            <div class="comment-action">
                                @if($productReview->reply)
                                <div class="reviews__comment--list margin__left d-flex">
                                    <div class="reviews__comment--thumb" style="width: 55px;">
                                        @php
                                            $logo = DB::table('general_infos')->where('id', 1)->select('logo', 'fav_icon')->first();
                                        @endphp
                                        @if($logo && $logo->fav_icon)
                                        <img src="{{url(env('ADMIN_URL').'/'.$logo->fav_icon)}}" alt="comment-thumb" style="height: 55px; width: 55px; border-radius: 100%; object-fit: cover;"/>
                                        @elseif($logo && $logo->logo)
                                        <img src="{{url(env('ADMIN_URL').'/'.$logo->logo)}}" alt="comment-thumb" style="height: 55px; width: 55px; border-radius: 100%; object-fit: cover;"/>
                                        @else

                                        @endif
                                    </div>
                                    <div class="reviews__comment--content pl-2">
                                        <div class="reviews__comment--top d-flex justify-content-between" style="margin-bottom: 0px">
                                            <div class="reviews__comment--top__left">
                                                <h3 class="reviews__comment--content__title h4" style="margin-bottom: 0px">
                                                    {{env('APP_NAME')}}
                                                </h3>
                                                <small style="color: gray;">Replied on {{date("F d, Y h:i a", strtotime($productReview->updated_at))}}</small>
                                            </div>
                                        </div>
                                        <p class="reviews__comment--content__desc" style="margin-bottom: 0px">
                                            {{$productReview->reply}}
                                        </p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
