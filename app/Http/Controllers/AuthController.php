<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


use App\Mail\ContactMail;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;



class AuthController extends Controller
{


    /**
     * Login The User
     * @param Request $request
     * 
     */
    public function login(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'username' => 'required|email',
                'password' => 'required'
            ]
        );


        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => "Validation error",
                'errors' => $validateUser->errors()
            ], 400);
        }

        // If the user want to remember login
        if ($request->has('remember')) {
            $remember = ($request->remember == 1) ? true : false;
        } else {
            $remember = false;
        }


        try {

            if (!Auth::attempt(["email" => $request->username, "password" => $request->password], $remember)) {
                return response()->json([
                    'status' => false,
                    'message' => "Wrong login details",
                ], 400);
            }
           

            $user = Auth::user();

        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'message' => "Wrong login details",
            ], 400);
        }


        if ($remember) {
            Auth::login($user, true); // Save the remember token
        } else {
            Auth::login($user);
        }

        if($request->has('quote_id') && !empty($request->quote_id)){
            $quote = Quote::find($request->quote_id);
            if($quote != null){
                $quote->user_id = $user->user_id;
                $quote->save();
            }
        }


        // Regenerate the current sesssion 
        $request->session()->regenerate();

        return response()->json([
            'status' => true,
            'email' => $user->email,
            'name' => $user->first_name.'  '.$user->last_name,
            'token' => csrf_token(),
            'message' => 'Login successfully',
        ], 200);

    }


    /**
     * Register the  User
     * @param Request $request
     * 
     */
    public function register(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|unique:users,email',
                'first_name' => 'required|string|min:2',
                'last_name' => 'required|string|min:2',
                'password' => 'required|min:6',
                // 'confirm_password' => 'required|same:password',
            ],
            [
                // 'username.regex' => 'The username may only contain letters, numbers, and underscores.',
            ]
        );


        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => "Validation error",
                'errors' => $validateUser->errors()
            ], 400);
        }

        $user = new User();
        $user->first_name = strip_tags($request->first_name);
        $user->last_name = strip_tags($request->last_name);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        
        if($request->has('quote_id') && !empty($request->quote_id)){
            
            $quote = Quote::find($request->quote_id);
            if($quote != null){
                $quote->user_id = $user->user_id;
                $quote->save();
            }

            Auth::login($user);
                        
            // Regenerate the current sesssion 
            $request->session()->regenerate();

        }

        return response()->json([
            'status' => true,
            'email' => $user->email,
            'name' => $user->first_name.' '.$user->last_name,
            'token' => csrf_token(),
            'message' => 'Account created successfully',
        ], 200);


    }




    public function forgotPassword(Request $request)
    {


        //Validated
        $validateUser = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
            ]
        );


        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Not a valid Email',
                'errors' => $validateUser->errors()
            ], 400);
        }

        $user = User::where('email', $request->email)->first();

        if ($user != null) {

            $executed = RateLimiter::attempt(
                'send-mail' . $user->user_id,
                $perTwoMinutes = 5,
                function () use ($user) {
                    Mail::to($user)->send(new ForgotPasswordMail($user, 'user'));
                },
                $decayRate = 120,
            );

            if (!$executed) {

                return response()->json([
                    'status' => false,
                    'message' => "Email sent",
                ], 400);
            }


        }

        return response()->json([
            'status' => true,
            'message' => "Message sent",
        ], 200);


    }


    public function resetPasswordPage(Request $request, $token)
    {


        return view('reset-password', ["token" => $token]);


    }



    /**
     * Handle Reset apassword.
     */
    public function resetPassword(Request $request)
    {

        //Validated
        $validateUser = Validator::make(
            $request->all(),
            [
                'token' => 'required|string',
                'password' => 'required|regex:/^[\s\S]{6,}$/',
                'confirm_password' => 'required|same:password',
            ],
            [
                'password.regex' => "Not a valid password. Password should be at least 6 characters",
            ]
        );


        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'erreur de validation',
                'errors' => $validateUser->errors()
            ], 400);
        }


        $token = $request->token;

        try {
            $decrypted = Crypt::decryptString($token);
        } catch (DecryptException $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' => "Invalid token. seems broken. Please try again",
                ]
                ,
                200
            );
        }

        
        // return response()->json(
        //     [
        //         'status' => false,
        //         'message' => $decrypted,
        //     ],
        //     400
        // );


        $data = explode(":", $decrypted);

        $tm_before = intval($data[1]);
        if ((time() - $tm_before) > (2 * 60 * 60)) {

            return response()->json(
                [
                    'status' => false,
                    'message' => "Link expired. Please try again with another forgot password request",
                ]
                ,
                400
            );
        }
        $user = User::where("user_id", $data[0])->first();
        if ($user == null) {
            return response()->json(
                [
                    'status' => false,
                    'message' => "User not found. Please try again",
                ]
                ,
                400
            );
        }

        $executed = RateLimiter::attempt(
            'reset_' . $user->user_id . '_' . $tm_before,
            $perTwoHours = 1,
            function () use ($user, $request) {
                $user->password = Hash::make($request->password);
                $user->save();
            },
            $decayRate = 7200,
        );

        if (!$executed) {

            return response()->json([
                'status' => false,
                'message' => "Link seems to have been used",
            ], 400);
        }


        return response()->json([
            'status' => true,
            'message' => 'successfully',
        ], 200);
    }




    public function contactUs(Request $request)
    {



        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|min:3|max:100',
            'last_name' => 'required|string|min:3|max:100',
            'email' => 'required|email',
            'telephone' => 'nullable|string',
            'subject' => 'required|string|min:5',
            'comment' => 'required|string|min:10',
        ]);

   
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 400);
        }

        $contact_data = config('mail.contact');

        Mail::to($contact_data["address"])->send(new ContactMail($request->all()));

        // Mail::to($contact_data["address"])->queue(new ContactMail($request->all()));

        return response()->json([
            'status' => true,
            'message' => 'Message Sent',
        ], 200);

    }



    public function sendClaims(Request $request)
    {



        $validator = Validator::make($request->all(), [
            'policy_number' => 'required|exists:quotes,policy_number',
            'first_name' => 'required|string|min:3|max:100',
            'last_name' => 'required|string|min:3|max:100',
            'email' => 'required|email',
            'telephone' => 'required|string',
            'comment' => 'required|string|min:10',
        ]);

   
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 400);
        }

        $contact_data = config('mail.contact');

        Mail::to($contact_data["address"])->send(new ContactMail($request->all(), 'claim'));

        // Mail::to($contact_data["address"])->queue(new ContactMail($request->all()));

        return response()->json([
            'status' => true,
            'message' => 'Message Sent',
        ], 200);

    }


}

