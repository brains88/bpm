<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function index()
    {  
        return view('frontend.verify.index');
    }

    public static function activate($token = '')
    {
        $user = User::where(['verify_token' => $token])->first();
        if (empty($user)) {
            return response()->json([
                'status' => 0,
                'info' => 'Invalid Verification Link.'
            ]);
        }

        $user->email_verified_at = Carbon::now();
        $user->active = 1;
        $user->verify_token = null;
        if ($user->update()) {
            return response()->json([
                'status' => 1,
                'info' => 'Email Verification Successfull'
            ]);
        }

        return response()->json([
            'status' => 0,
            'info' => 'Unknown Error. Try Again.'
        ]);
    }

    public function success()
    {
        return view('frontend.signup.success');
    }

    public static function resend()
    {
        $data = request()->only('phone');
        $validator = Validator::make($data, [
            'phone' => ['required'], 
        ], ['phone.required' => 'Please enter your phone number or email.']);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        $phone = $data['phone'];
        $user = User::where(['email' => $email])->orWhere(['phone' => $phone])->first();
        if (empty($user)) {
            return response()->json([
                'status' => 0,
                'info' => 'Invalid account details.'
            ]);
        }

        $code = random_int(100000, 999999);
        $user->verify_token = $code;
        $user->token_expiry = Carbon::now()->addMinutes(10)->timestamp;

        try {
            $isEmail = Validator::make(['email' => $phone], ['email' => ['required', 'email']]);
            if($isEmail->passes()){
                $mail = new EmailVerification([ 
                        'phone' => $phone,
                        'code' => $code,
                    ]);
        
                Mail::to($phone)->send($mail);
            }

            return response()->json([
                'status' => 1,
                'info' => 'Operation successful',
                'redirect' => route('signup.verify'),
            ]);

        } catch (Exception $error) {
            DB::rollBack();
            return response()->json([
                'status' => 0,
                'info' => 'Unknown Error. Try Again.'
            ]);
        }
    }
}
