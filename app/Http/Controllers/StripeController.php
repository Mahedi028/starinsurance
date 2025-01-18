<?php


namespace App\Http\Controllers;

use App\Mail\OrderConfirmationMail;
use App\Models\Intent;
use App\Models\PromoCode;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\Stripe;

use Illuminate\Support\Facades\Mail;



use Illuminate\Support\Facades\Validator;

class StripeController extends Controller
{
    public function paymentIntent(Request $request)
    {

        // Save imntent seoartedly
        $validatedData = Validator::make(
            $request->all(),
            [
                'id' => 'required|exists:quotes,id',
                'new_email' => 'nullable|unique:users,email',
                'first_name' => 'nullable|string|min:1',
                'last_name' => 'nullable|string|min:1',
                'new_password' => 'nullable|min:6',
            ]
        );

        $email = "";
        $first_name = "";
        $last_name = "";
        $message = "";

        if (!empty($request->need_register)) {


            if (!$request->has('new_email') || !filter_var($request->new_email, FILTER_VALIDATE_EMAIL)) {
                $message .= "Please provide your email address at the top input box under information";
            } else {
                $email = $request->new_email;
                $exists = User::where("email", $request->new_email)->first();
                if ($exists != null) {
                    $message = "The email address provided is already registered. Try login instead";
                }
            }


            $first_name = $request->first_name;
            $last_name = $request->last_name;

            if (strlen($request->new_password) == 0) {
                $message .= "<br> You need to choose a password";
            }
            elseif (strlen($request->new_password) < 6) {
                $message .= "<br> Minimum password length is 6";
            }



        }


        if ($validatedData->fails() || $message != "") {
            if ($message == "") {
                $message = "Validation error";
            }
            return response()->json([
                'status' => false,
                'message' => $message,
                'errors' => $validatedData->errors()
            ], 400);
        }

        $quote = Quote::find($request->id);

        // If payment already completed
        if ($quote->payment_status == 1) {
            return response()->json([
                'client_secret' => "",
            ]);
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $amount = intval($quote->update_price * 100);


        // Create the PaymentIntent

        $intent = PaymentIntent::create([

            'amount' => $amount,
            'currency' => 'gbp',
            'automatic_payment_methods' => ['enabled' => false],
            'payment_method_types' => ['link', 'card'],
            'metadata' => ["quote_id" => $quote->id],
            // but here we want to confirm (collect payment) immediately.
            // 'confirm' => true,

        ]);

        $quote->intents()->create([
            "intent_id" => $intent->id,
        ]);


        $rdata = [
            'client_secret' => $intent->client_secret,
        ];




        if (!empty($request->new_email)) {

            $user = new User();
            $user->first_name = strip_tags($first_name);
            $user->last_name = strip_tags($last_name);
            $user->email = $email;
            $user->password = Hash::make($request->new_password);
            $user->save();

            if ($quote != null) {
                $quote->user_id = $user->user_id;
                $quote->save();
            }

            Auth::login($user);
            // Regenerate the current sesssion 
            $request->session()->regenerate();

            $rdata["user_name"] = $first_name . " " . $last_name;
            $rdata["user_email"] = $email;
            $rdata["token"] = csrf_token();

        }




        return response()->json($rdata);


    }




    public function confirmPayment(Request $request)
    {

        // Save imntent seoartedly
        $validatedData = Validator::make(
            $request->all(),
            [
                'intent_id' => 'required|exists:payment_intents,intent_id',
            ]
        );
        if ($validatedData->fails()) {
            return response()->json([
                'status' => false,
                'message' => "Validation error",
                'errors' => $validatedData->errors()
            ], 400);
        }

        $intent = Intent::where("intent_id", $request->intent_id)->first();

        // Just return if already done;
        if ($intent->status == 1) {

            return response()->json([
                'status' => "success",
            ]);


        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $paymentIntent = PaymentIntent::retrieve($intent->intent_id);

        if ($paymentIntent->status === 'succeeded') {
            // Payment succeeded
            // echo "Payment verified!";

            $intent->status = 1;
            $intent->save();

            $quote = Quote::find($intent->quote_id);

            $quote->payment_status = 1;
            $quote->save();

            if ($quote->promo_code != "") {
                $promo = PromoCode::where("promo_code", $quote->promo_code)->first();
                if ($promo != null) {
                    $promo->used = $promo->used + 1;
                    $promo->save();
                }
            }


            //WE WILL SEND CONFIRMATION MESSAGE HERE                    
            Mail::to($quote->user()->first())->send(new OrderConfirmationMail($quote));



        } else {


        }


        // DELETE THE SESSION KEY
        // Session::remove('quotation_id');

        return response()->json([
            'status' => "success",
        ]);

    }



    public function confirmed(Request $request)
    {

        $html = "";
        if ($request->has("payment_intent")) {

            // DELETE THE SESSION KEY
            // Session::remove('quotation_id');


            $intent = Intent::where("intent_id", $request->payment_intent)->first();
            // Just return if already done;
            if ($intent->status == 1) {

                $html = '<div class="text-center alert alert-success py-5 my-3 my-md-5">
                <i class="far fa-check-circle fa-5x"></i>
                <br>
                <h3>Payment Successfully Confirmed</h3>
                <p>You will receive an email confirming this order. Thanks!</p>
                <a href="/my-account" class="btn btn-success px-5">My Account</a>
            </div>';


            } else {

                Stripe::setApiKey(config('services.stripe.secret'));

                $paymentIntent = PaymentIntent::retrieve($intent->intent_id);

                if ($paymentIntent->status === 'succeeded') {

                    $intent->status = 1;
                    $intent->save();

                    $quote = Quote::find($intent->quote_id);
                    $quote->payment_status = 1;
                    $quote->save();


                    if ($quote->promo_code != "") {
                        $promo = PromoCode::where("promo_code", $quote->promo_code)->first();
                        if ($promo != null) {
                            $promo->used = $promo->used + 1;
                            $promo->save();
                        }
                    }


                    //WE WILL SEND CONFIRMATION MESSAGE HERE                    
                    Mail::to($quote->user()->first())->send(new OrderConfirmationMail($quote));


                    $html = '<div class="text-center alert alert-success py-5 my-3 my-md-5">
                    <i class="far fa-check-circle fa-5x"></i>
                    <br>
                    <h3>Payment Successfully Confirmed</h3>
                    <p>You will receive an email confirming this order. Thanks!</p>
                    <a href="/my-account" class="btn btn-success px-5">My Account</a>
                </div>';

                } else {

                    $html = '<div class="text-center alert alert-info py-5 my-3 my-md-5">
                    <i class="fa fa-info-circle fa-5x"></i>
                    <br>
                    <h3>Payment not yet Confirmed</h3>
                    <p>You will send you an email  confirming this order once we confirmed your payment. Thanks!</p>
                    <a href="/my-account" class="btn btn-success px-5">My Account</a>
                </div>';

                }

            }

        } else {


            $html = '        <div class="text-center alert alert-warning py-5 my-3 my-md-5">
            <i class="fa fa-info-circle fa-5x"></i>
            <br>
            <h3>Unknown Request</h3>
            <p>We are sorry we can\'t process your request. If you made payment, Don\'t worry, we will send you an email shortly confirming your order. Thanks</p>
            <a href="/my-account" class="btn btn-success px-5">My Account</a>
        </div>';

        }




        return view('confirmed', ["html" => $html]);



    }



}
