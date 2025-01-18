<?php

namespace App\Http\Controllers\Admin;

use App\Mail\OrderCancelledMail;
use App\Models\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Stripe\Stripe;
use Stripe\Refund;
        

use DataTables;

class PolicyController extends Controller
{


    public function __construct(Request $request)
    {
    }


    public function index(Request $request)
    {

        $user = $request->user();
        if (!$user->isAllowed(["SUPER_ADMIN", "ADMIN"])) {
            return "Access Restricted";
        }

        $date_time_now = date("Y-m-d H:i:s");
        
        DB::table('quotes')
            ->whereRaw("CONCAT(end_date, ' ', end_time) < ?", [$date_time_now])
            ->update(['expired_state' => 'expired']);

            
        return view('admin.policies');

    }






    public function data(Request $request)
    {

        $admin = $request->user();
        if (!$admin->isAllowed(["SUPER_ADMIN", "ADMIN"])) {
            return "Access Restricted";
        }

        $date_time_now = date("Y-m-d H:i:s");
        
        DB::table('quotes')
            ->whereRaw("CONCAT(end_date, ' ', end_time) < ?", [$date_time_now])
            ->update(['expired_state' => 'expired']);


        $model = Quote::select(
            'id',
            'policy_number',
            'cpw',
            'start_date',
            'start_time',
            'end_date',
            'end_time',
            'reg_number',
            'vehicle_make',
            'vehicle_model',
            'engine_cc',
            'date_of_birth',
            'first_name',
            'middle_name',
            'last_name',
            'licence_type',
            'licence_held_duration',
            'vehicle_type',
            'update_price',
            'expired_state', 
	        'refund_state',
        )->where("payment_status", 1);


        return DataTables::of($model)
            ->make(false);
    }




    public function refundPolicy(Request $request, $id)
    {

        $admin = $request->user();
        if (!$admin->isAllowed(["SUPER_ADMIN"])) {
            return "Access Restricted";
        }

        $validator = Validator::make(["id" => $id], [
            'id' => 'required|exists:quotes,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 400);
        }


        $quote = Quote::where("id", $id)->first();

        if($quote->refund_state != "" &&  $quote->refund_state != null){
            return response()->json([
                'status' => false,
                'message' => 'Alread Performed',
            ], 400);
        }

        $intent = $quote->intents()->where("status", 1)->first();

        Stripe::setApiKey(config('services.stripe.secret'));

        // Create the refund
        $refund = Refund::create([
            'payment_intent' => $intent->intent_id,
        ]);
        // Check the status
        $status = $refund->status;

        $quote->refund_state = $status;

        $quote->save();


        return response()->json([
            'status' => true,
            'message' => 'successful',
        ], 200);
    }



    public function cancelPolicy(Request $request, $id)
    {

        $admin = $request->user();
        if (!$admin->isAllowed(["SUPER_ADMIN"])) {
            return "Access Restricted";
        }

        $validator = Validator::make(["id" => $id], [
            'id' => 'required|exists:quotes,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 400);
        }


        $quote = Quote::where("id", $id)->first();

        if($quote->expired_state != "" &&  $quote->expired_state != null){
            return response()->json([
                'status' => false,
                'message' => 'Not allowed',
            ], 400);
        }

        Mail::to($quote->user()->first())->send(new OrderCancelledMail($quote));


        $quote->expired_state = "cancelled";

        $quote->save();


        return response()->json([
            'status' => true,
            'message' => 'successful',
        ], 200);
    }


    public function deletePolicy(Request $request, $id)
    {

        $admin = $request->user();
        if (!$admin->isAllowed(["SUPER_ADMIN"])) {
            return "Access Restricted";
        }

        $validator = Validator::make(["id" => $id], [
            'id' => 'required|exists:quotes,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 400);
        }


        $quote = Quote::where("id", $id)->first();

        $quote->intents()->delete();

        $quote->delete();

        return response()->json([
            'status' => true,
            'message' => 'successful',
        ], 200);
    }





}
