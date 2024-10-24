<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use App\Mail\UserVerificationMail;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $totalOrderPlaced = DB::table('orders')->where('user_id', $userId)->count();
        $totalRunningOrder = DB::table('orders')->where('user_id', $userId)->where('order_status', '<', 3)->count();
        $itemsInWishList = DB::table('wish_lists')->where('user_id', $userId)->count();
        $totalAmountSpent = DB::table('orders')->where('user_id', $userId)->sum('total');
        $totalOpenedTickets = DB::table('support_tickets')->where('support_taken_by', $userId)->where('status', '<', 2)->count();

        $recentOrders = DB::table('orders')->where('user_id', $userId)->orderBy('id', 'desc')->skip(0)->limit(5)->get();
        $wishlistedItems = DB::table('wish_lists')
                ->join('products', 'wish_lists.product_id', 'products.id')
                ->leftJoin('units', 'products.unit_id', 'units.id')
                ->where('wish_lists.user_id', $userId)
                ->select('products.name', 'products.image', 'products.price', 'products.discount_price', 'units.name as unit_name', 'products.slug as product_slug')
                ->orderBy('products.id', 'desc')
                ->skip(0)
                ->limit(6)
                ->get();

        return view('dashboard.home', compact('totalOrderPlaced', 'totalRunningOrder', 'itemsInWishList', 'totalAmountSpent', 'recentOrders', 'wishlistedItems', 'totalOpenedTickets'));
    }

    public function userVerification(){
        $randomCode = rand(100000, 999999);
        $userInfo = Auth::user();

        if(!$userInfo->email_verified_at && !$userInfo->verification_code){

            User::where('id', $userInfo->id)->update([
                'verification_code' => $randomCode
            ]);

            if($userInfo->email){

                $mailData = array();
                $mailData['code'] = $randomCode;

                try {
                    Mail::to(trim($userInfo->email))->send(new UserVerificationMail($mailData));
                } catch(\Exception $e) {
                    Toastr::error('Something wrong with the email server');
                }

                // $emailConfig = DB::table('email_configures')->where('status', 1)->orderBy('id', 'desc')->first();
                // $decryption = "";

                // if($emailConfig){
                //     $ciphering = "AES-128-CTR";
                //     $options = 0;
                //     $decryption_iv = '1234567891011121';
                //     $decryption_key = "GenericCommerceV1";
                //     $decryption = openssl_decrypt ($emailConfig->password, $ciphering, $decryption_key, $options, $decryption_iv);

                //     config([
                //         // 'mail.mailers.smtp.host' => $emailConfig->host,
                //         // 'mail.mailers.smtp.port' => $emailConfig->port,
                //         'mail.mailers.smtp.username' => $emailConfig->email,
                //         'mail.mailers.smtp.password' => $decryption != "" ? $decryption : '',
                //         // 'mail.mailers.smtp.encryption' => $emailConfig ? ($emailConfig->encryption == 1 ? 'tls' : ($emailConfig->encryption == 2 ? 'ssl' : '')) : '',
                //         'mail.mailers.from' => $emailConfig->email,
                //         'mail.mailers.name' => "Fejmo",
                //     ]);

                //     try {
                //         Mail::to(trim($userInfo->email))->send(new UserVerificationMail($mailData));
                //     } catch(\Exception $e) {
                //         Toastr::error('Something wrong with the email server');
                //     }
                // }

            } else {

                $smsGateway = DB::table('sms_gateways')->where('status', 1)->first();
                if($smsGateway && $smsGateway->provider_name == 'Reve'){

                    $response = Http::get($smsGateway->api_endpoint, [
                        'apikey' => $smsGateway->api_key,
                        'secretkey' => $smsGateway->secret_key,
                        "callerID" => $smsGateway->sender_id,
                        "toUser" => $userInfo->phone,
                        "messageContent" => "Verification Code is : ". $randomCode
                    ]);

                    if($response->status() != 200){
                        Toastr::error('Something Went Wrong', 'Failed to send SMS');
                        return back();
                    }

                } elseif($smsGateway && $smsGateway->provider_name == 'KhudeBarta'){

                    $response = Http::get($smsGateway->api_endpoint, [
                        'apikey' => $smsGateway->api_key,
                        'secretkey' => $smsGateway->secret_key,
                        "callerID" => $smsGateway->sender_id,
                        "toUser" => $this->formatBangladeshiPhoneNumber($userInfo->phone),
                        "messageContent" => "Verification Code is : ".$randomCode
                    ]);

                    if($response->status() != 200){
                        Toastr::error('Something Went Wrong', 'Failed to send SMS');
                        return back();
                    }

                } elseif($smsGateway && $smsGateway->provider_name == 'ElitBuzz'){

                    $response = Http::get($smsGateway->api_endpoint, [
                        'api_key' => $smsGateway->api_key,
                        "type" => "text",
                        "contacts" => $userInfo->phone, //“88017xxxxxxxx,88018xxxxxxxx”
                        "senderid" => $smsGateway->sender_id,
                        "msg" => $randomCode . " is your OTP verification code for shadikorun.com"
                    ]);

                    if($response->status() != 200){
                        Toastr::error('Something Went Wrong', 'Failed to send SMS');
                        return back();
                    }

                } else {
                    Toastr::error('No SMS Gateway is Active Now', 'Failed to send SMS');
                    return back();
                }

            }

            return view('dashboard.verification');

        } elseif(!$userInfo->email_verified_at && $userInfo->verification_code){
            return view('dashboard.verification');
        }
         else {
            return redirect('/home');
        }

    }

    public function userVerificationResend(){
        $randomCode = rand(100000, 999999);
        $userInfo = Auth::user();

        if(!$userInfo->email_verified_at){

            User::where('id', $userInfo->id)->update([
                'verification_code' => $randomCode
            ]);

            if($userInfo->email){

                $mailData = array();
                $mailData['code'] = $randomCode;

                try {
                    Mail::to(trim($userInfo->email))->send(new UserVerificationMail($mailData));
                } catch(\Exception $e) {
                    Toastr::error('Something wrong with the email server');
                }

                // $emailConfig = DB::table('email_configures')->where('status', 1)->orderBy('id', 'desc')->first();
                // $decryption = "";

                // if($emailConfig){
                //     $ciphering = "AES-128-CTR";
                //     $options = 0;
                //     $decryption_iv = '1234567891011121';
                //     $decryption_key = "GenericCommerceV1";
                //     $decryption = openssl_decrypt ($emailConfig->password, $ciphering, $decryption_key, $options, $decryption_iv);

                //     config([
                //         // 'mail.mailers.smtp.host' => $emailConfig->host,
                //         // 'mail.mailers.smtp.port' => $emailConfig->port,
                //         'mail.mailers.smtp.username' => $emailConfig->email,
                //         'mail.mailers.smtp.password' => $decryption != "" ? $decryption : '',
                //         // 'mail.mailers.smtp.encryption' => $emailConfig ? ($emailConfig->encryption == 1 ? 'tls' : ($emailConfig->encryption == 2 ? 'ssl' : '')) : '',

                //         'mail.mailers.from' => $emailConfig->email,
                //         'mail.mailers.name' => "Fejmo",
                //     ]);

                //     try {
                //         Mail::to(trim($userInfo->email))->send(new UserVerificationMail($mailData));
                //     } catch(\Exception $e) {
                //         Toastr::error('Something wrong with the email server');
                //     }
                // }


            } else {

                $smsGateway = DB::table('sms_gateways')->where('status', 1)->first();
                if($smsGateway && $smsGateway->provider_name == 'Reve'){
                    $response = Http::get($smsGateway->api_endpoint, [
                        'apikey' => $smsGateway->api_key,
                        'secretkey' => $smsGateway->secret_key,
                        "callerID" => $smsGateway->sender_id,
                        "toUser" => $userInfo->phone,
                        "messageContent" => "Verification Code is : ". $randomCode
                    ]);

                    if($response->status() != 200){
                        Toastr::error('Something Went Wrong', 'Failed to send SMS');
                        return back();
                    }

                } elseif($smsGateway && $smsGateway->provider_name == 'KhudeBarta'){

                    $response = Http::get($smsGateway->api_endpoint, [
                        'apikey' => $smsGateway->api_key,
                        'secretkey' => $smsGateway->secret_key,
                        "callerID" => $smsGateway->sender_id,
                        "toUser" => $this->formatBangladeshiPhoneNumber($userInfo->phone),
                        "messageContent" => "Verification Code is : ".$randomCode
                    ]);

                    if($response->status() != 200){
                        Toastr::error('Something Went Wrong', 'Failed to send SMS');
                        return back();
                    }

                } elseif($smsGateway && $smsGateway->provider_name == 'ElitBuzz'){

                    $response = Http::get($smsGateway->api_endpoint, [
                        'api_key' => $smsGateway->api_key,
                        "type" => "text",
                        "contacts" => $userInfo->phone, //“88017xxxxxxxx,88018xxxxxxxx”
                        "senderid" => $smsGateway->sender_id,
                        "msg" => $randomCode . " is your OTP verification code for shadikorun.com"
                    ]);

                    if($response->status() != 200){
                        Toastr::error('Something Went Wrong', 'Failed to send SMS');
                        return back();
                    }

                } else {
                    Toastr::error('No SMS Gateway is Active Now', 'Failed to send SMS');
                    return back();
                }

            }

            Toastr::success('Verification Code Sent', 'Resend Verification Code');
            return back();

        } else {
            return redirect('/home');
        }

    }

    public function formatBangladeshiPhoneNumber($phoneNumber) {
        // Remove any non-numeric characters from the phone number
        $phoneNumber = preg_replace('/\D/', '', $phoneNumber);

        // Check if the number starts with '88'
        if (substr($phoneNumber, 0, 2) !== '88') {
            // If not, prepend '88' to the number
            $phoneNumber = '88' . $phoneNumber;
        }

        return $phoneNumber;
    }

    public function userVerifyCheck(Request $request){

        $verificationCode = '';
        foreach($request->code as $code){
            $verificationCode .= $code;
        }

        $userInfo = Auth::user();
        if($userInfo->verification_code == $verificationCode){
            User::where('id', $userInfo->id)->update([
                'email_verified_at' => Carbon::now()
            ]);

            // Toastr::success('User Verification Complete', 'Successfully Verified');

            if(session('cart') && count(session('cart')) > 0){
                return redirect('/checkout');
            } else {
                return redirect('/home');
            }

        } else {
            Toastr::error('Wrong Verification Code', 'Failed');
            return back();
        }
    }

    public function submitProductReview(Request $request){

        $purchaseStatus = DB::table('order_details')
                            ->join('orders', 'order_details.order_id', 'orders.id')
                            ->where('orders.order_status', 3)
                            ->where('orders.user_id', Auth::user()->id)
                            ->where('product_id', $request->review_product_id)
                            ->first();

        if(!$purchaseStatus){
            Toastr::error('Approved order is required for submitting a review.');
            return back();
        }

        $alreadyReviewSubmitted = DB::table('product_reviews')
                                    ->where('user_id', Auth::user()->id)
                                    ->where('product_id', $request->review_product_id)
                                    ->count();

        if($alreadyReviewSubmitted >= 1){
            Toastr::warning('You have Already submitted a review');
            return back();
        }

        DB::table('product_reviews')->insert([
            'product_id' => $request->review_product_id,
            'user_id' => Auth::user()->id,
            'rating' => $request->rarting,
            'review' => $request->review,
            'slug' => str::random(5) . time(),
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        Toastr::success('Successfully Submitted Review');
        return back();
    }

    public function addToWishlist($slug){

        $productInfo = DB::table('products')->where('slug', $slug)->first();

        if(DB::table('wish_lists')->where('product_id', $productInfo->id)->where('user_id', Auth::user()->id)->exists()){
            Toastr::warning('Already in Wishlist');
            return back();
        } else {
            DB::table('wish_lists')->insert([
                'product_id' => $productInfo->id,
                'user_id' => Auth::user()->id,
                'slug' => str::random(5) . time(),
                'created_at' => Carbon::now()
            ]);
            Toastr::success('Added to Wishlist');
            return back();
        }

    }

    public function removeFromWishlist($slug){
        $productInfo = DB::table('products')->where('slug', $slug)->first();
        DB::table('wish_lists')->where('product_id', $productInfo->id)->where('user_id', Auth::user()->id)->delete();
        Toastr::error('Removed From Wishlist');
        return back();
    }
}
