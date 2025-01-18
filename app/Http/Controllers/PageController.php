<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmationMail;
use App\Models\PromoCode;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    // Show Home Page  page. 
    public function index(Request $request)
    {
        return view('index');
    }

    // Show Feature Page  page. 
    public function features(Request $request)
    {

        return view('features');
    }

    // Show About Page  page. 
    public function aboutUs(Request $request)
    {

        return view('about-us');
    }

    // Show About Page  page. 
    public function contact(Request $request)
    {

        return view('contact');
    }

    // Show Claims Page  page. 
    public function claims(Request $request)
    {
        return view('claims');
    }

    // Show Privacy Policy  page. 
    public function privacyPolicy(Request $request)
    {
        return view('privacy-policy');
    }

    // Show Terms of Buisness  page. 
    public function customerTermsOfBusiness(Request $request)
    {
        return view('terms-of-business');
    }

    // Show Cookies   page. 
    public function cookies(Request $request)
    {
        return view('cookies');
    }


    // Show Terms of Use  page. 
    public function websiteTermsOfUse(Request $request)
    {
        return view('terms-of-use');
    }



    // Show Policy Page. 
    public function policyGetQuote(Request $request)
    {

        // $id = Session::get("quotation_id");

        // $quote = null;
        // if (!empty($id)) {
        //     $quote = Quote::find($id);
        // }
        // if ($quote != null) {

        //     return redirect('/checkout');
        // }

        return view('quote');
    }




    // Checkout page. 
    public function checkout(Request $request)
    {

        $id = Session::get("quotation_id");


        $quote = null;
        if (!empty($id)) {
            $quote = Quote::find($id);
        }
        if ($quote == null) {

            return redirect('/policy/get-quote');
        }

        // If payment already completed
        if ($quote->payment_status == 1) {

            return redirect("/my-account");
        }

        Session::remove('quotation_id');

        return view('checkout', ["quote" => $quote]);
    }


    // GET PROMO CODE. 
    public function getPromoCode(Request $request)
    {

        $validatedData = Validator::make(
            $request->all(),
            [
                'id' => 'required|exists:quotes,id',
            ]
        );
        if ($validatedData->fails()) {
            return response()->json([
                'status' => false,
                'message' => "Validation error",
                'errors' => $validatedData->errors()
            ], 400);
        }
        $quote = Quote::find($request->id);

        $code_error = "";
        $new_amount = $quote->cpw;

        $promo = PromoCode::where("promo_code", $request->promo_code)->first();
        if ($promo == null) {
            $code_error = "Invalid promo code";
        }
        elseif ($promo->used >=  $promo->available) {
            $code_error = "Promo code quota used";
        } 
        elseif ($promo->min_spent != 0 && $promo->min_spent > $quote->cpw) {
            $code_error = "You do not qualify for this promo code";
        }
        else if (time() > strtotime($promo->expires)) {
            $code_error = "Promo code expired";
        }
        else {
            // Do the code matching
            $matches = json_decode($promo->matches, true);
            if (isset($matches["birth_date"])) {
                $bdata = explode("-", $matches["birth_date"]);

                $qdata = explode("-", $quote->date_of_birth);

                if ($bdata[0] != $qdata[0]) { // Match year
                    $code_error = "You do not qualify for this promo code";
                } else if (isset($bdata[1]) && intval($bdata[1]) != intval($qdata[1])) { // Match month
                    $code_error = "You do not qualify for this promo code";
                } else if (isset($bdata[2]) && intval($bdata[2]) != intval($qdata[2])) { // Match month
                    $code_error = "You do not qualify for this promo code";
                }
            }
            if (isset($matches["last_name"])) {
                if (strtolower($matches["last_name"]) != strtolower($quote->last_name)) { // Match month
                    $code_error = "You do not qualify for this promo code";
                }
            }

        }

        if ($code_error != "") {

            $quote->update_price = $quote->cpw;
            $quote->promo_code = "";
            $quote->save();

            return response()->json([
                'status' => false,
                'message' => "Promo code not valid",
                'errors' => ["promo_code" => [$code_error]],
            ], 400);

        }


        $discount_value = $promo->amount;

        if ($promo->discount_type == "%") {
            $discount_amount = ($discount_value / 100) * $quote->cpw;
        } else {
            $discount_amount = $discount_value;
        }

        $new_amount = $quote->cpw - $discount_amount;

        // Remanining amount must be significant
        if ($new_amount > 1.5) {
            $quote->update_price = $new_amount;
            $quote->promo_code = $request->promo_code;
            $quote->save();            
            
        } else {

            $quote->update_price = $quote->cpw;
            $quote->promo_code = "";
            $new_amount = $quote->cpw;
            $quote->save();

            return response()->json([
                'status' => false,
                'message' => "You do not qualify for this promo coded",
                'errors' => ["promo_code" => ["You do not qualify for this promo code"]],
            ], 400);

        }


        return response()->json([
            'status' => true,
            'amount' => $new_amount,
        ], 200);



    }








    // Show My account  Use  page. 
    public function myAccount(Request $request)
    {


        if (auth('web')->check()) {

            return view('my-account');


        } else {

            // Login page
            return view('login-reg');
        }

    }






    // SProcess Quote. 
    public function processQuote(Request $request)
    {


        $validatedData = Validator::make(
            $request->all(),
            [
                'cpw' => 'required|numeric',
                'update-price' => 'nullable|string',
                'reg_number' => 'required|string|max:50',
                'vehicle_make' => 'required|string|max:100',
                'vehicle_model' => 'required|string|max:100',
                'engine_cc' => 'required|numeric',
                'start_date' => 'required|date_format:d-m-Y',
                'start_time' => 'required|date_format:H:i:s',
                'end_date' => 'required|date_format:d-m-Y',
                'end_time' => 'required|date_format:H:i:s',
                'date_of_birth' => 'required|date_format:d-m-Y',
                'first_name' => 'required|string|max:100',
                'middle_name' => 'nullable|string|max:100',
                'last_name' => 'required|string|max:100',
                'licence_type' => 'required|string|max:100',
                'licence_held_duration' => 'required|string|max:50',
                'vehicle_type' => 'required|string|max:50',
            ]
        );


        if ($validatedData->fails()) {
            return response()->json([
                'status' => false,
                'message' => "Validation error",
                'errors' => $validatedData->errors()
            ], 400);
        }

        $cpw = $this->getQuote($request);
        if ($cpw == null) {
            return response()->json([
                'status' => false,
                'message' => "There seems to be error in your data (Also note maximum policy period should not be more than 28 days (4 weeks))",
            ], 400);
        }


        // Parse start and end dates and times
        $startDate = $request->start_date; // Format: DD/MM/YYYY
        $endDate = $request->end_date; // Format: DD/MM/YYYY
        $bthDate = $request->date_of_birth; // Format: DD/MM/YYYY

        list($sDay, $sMonth, $sYear) = explode('-', $startDate);
        list($eDay, $eMonth, $eYear) = explode('-', $endDate);
        list($bDay, $bMonth, $bYear) = explode('-', $bthDate);


        $start_date = date("Y-m-d", strtotime("$sYear-$sMonth-$sDay"));
        $end_date = date("Y-m-d", strtotime("$eYear-$eMonth-$eDay"));
        $date_of_birth = date("Y-m-d", strtotime("$bYear-$bMonth-$bDay"));


        // Prepare the data for saving
        $quote = new Quote();
        $quote->cpw = $cpw;
        $quote->update_price = $cpw;
        $quote->reg_number = strtoupper(strip_tags($request['reg_number']));
        $quote->vehicle_make = strip_tags($request['vehicle_make']);
        $quote->vehicle_model = strip_tags($request['vehicle_model']);
        $quote->engine_cc = $request['engine_cc'];
        $quote->start_date = $start_date;
        $quote->start_time = $request['start_time'];
        $quote->end_date = $end_date;
        $quote->end_time = $request['end_time'];
        $quote->date_of_birth = $date_of_birth;
        $quote->first_name = strip_tags($request['first_name']);
        $quote->middle_name = strip_tags($request['middle_name']);
        $quote->last_name = strip_tags($request['last_name']);
        $quote->licence_type = strip_tags($request['licence_type']);
        $quote->licence_held_duration = strip_tags($request['licence_held_duration']);
        $quote->vehicle_type = strip_tags($request['vehicle_type']);
        $quote->user_id = Auth::check() ? Auth::id() : null; // Add user_id if authenticated, null otherwise

        // Save the quote
        $quote->save();

        $quote->policy_number = $this->generatePolicyNumber($quote->id);
        $quote->save();


        // Store the quotation ID in the session
        Session::put('quotation_id', $quote->id);

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Quote saved successfully.',
            'quotation_id' => $quote->id,
        ]);


    }












    private function getQuote($request)
    {
        $dob = $request->date_of_birth; // Format: DD/MM/YYYY
        $registration_no = $request->reg_number;

        if (!empty($dob) && !empty($registration_no)) {
            // Parse date of birth in DD/MM/YYYY format
            list($day, $month, $year) = explode('-', $dob);
            $dobTimestamp = mktime(0, 0, 0, $month, $day, $year);

            // Calculate age
            $currentTimestamp = time();
            $ageInMilliseconds = $currentTimestamp - $dobTimestamp;
            $ageInYears = $ageInMilliseconds / (365.25 * 24 * 60 * 60);
            $age = floor($ageInYears);

            // Base prices
            $basePrice = 23.58;
            $basePriceHour = 13.72;
            $basePricePerHour = 0.38; // 1.89;

            
            // Parse start and end dates and times
            $startDate = $request->start_date; // Format: DD/MM/YYYY
            $startTime = $request->start_time; // Format: HH:mm:ss
            $endDate = $request->end_date; // Format: DD/MM/YYYY
            $endTime = $request->end_time; // Format: HH:mm:ss

            list($sDay, $sMonth, $sYear) = explode('-', $startDate);
            list($eDay, $eMonth, $eYear) = explode('-', $endDate);

            list($sHour, $sMinute, $sSecond) = explode(':', $startTime);
            list($eHour, $eMinute, $eSecond) = explode(':', $endTime);

            $startTimestamp = mktime($sHour, $sMinute, $sSecond, $sMonth, $sDay, $sYear);
            $endTimestamp = mktime($eHour, $eMinute, $eSecond, $eMonth, $eDay, $eYear);

            $timeDifference = $endTimestamp - $startTimestamp;
            $minutesDifference = $timeDifference / 60;
            $hoursDifference = $minutesDifference / 60;
            $daysDifference = floor($hoursDifference / 24);
            $remainingHours = ceil($hoursDifference - ($daysDifference * 24));


            
            if($daysDifference > 5 && $daysDifference <= 7){ // 1 week
                $daysDifference = 6;
                $remainingHours = 0;
            }
            else if($daysDifference > 7 && $daysDifference <= 14){ // 2 weeks
                $daysDifference =  ($daysDifference > 9)? 9 : $daysDifference ; // Can be 8
                $remainingHours = 0;
            }
            else if($daysDifference > 14 && $daysDifference <= 21){ // 3 weeks
                $daysDifference = 11;
                $remainingHours = 0;
            }
            else if($daysDifference > 21 && $daysDifference <= 28){ // 4 weeks
                $daysDifference = 13;
                $remainingHours = 0;
            }
            else if($daysDifference > 28){
                return null;
            }

            // Calculate final price
            $finalPrice = 0;
            if ($daysDifference == 0) {
                $finalPrice = $basePriceHour + ($basePricePerHour * ($remainingHours - 1));
            } else {
                $finalPrice = ($daysDifference * $basePrice) + ($basePricePerHour * $remainingHours);
            }


            // Apply discount based on age
            if ($age >= 18 && $age <= 20) {
                $finalPrice -= ($age - 17) * 0.2;
            }
            if ($age >= 21 && $age <= 30) {
                $finalPrice -= ($age - 17) * 0.4;
            }
            elseif ($age > 30) {
                $sage = ($age > 50)? 50 : $age;
                $finalPrice -= ($sage - 17) * 0.2;
            }


            // Return the final price formatted to 2 decimal places
            if (is_numeric($finalPrice)) {
                return number_format($finalPrice, 2, '.', '');
            }
        }

        return null; // Return null if data is invalid or incomplete
    }


    private function generatePolicyNumber($quote_id, $n = 8)
    {
        // Ensure the quote_id is a string for concatenation
        $quote_id = (string) $quote_id;

        // Generate a random number with $n digits
        $randomDigits = str_pad(mt_rand(0, pow(10, $n) - 1), $n, '0', STR_PAD_LEFT);

        // Combine the quote_id and random digits to form the policy number
        $policy_number = (string) $quote_id . $randomDigits;

        return  substr($policy_number, 0, 8);
    }





}
