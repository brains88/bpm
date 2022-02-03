<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Verify, User};
use App\Helpers\{Sms};
use Validator;
use Carbon\Carbon;

class VerifyController extends Controller
{

    /**
     * View to enter phone otp
     */
    public function phone()
    {  
        return view('frontend.verify.phone');
    }

    public static function otpverify(Request $request)
    {
        $data = request()->only(['code']);
        $validator = Validator::make($data, [ 
            'code' => ['required', 'min:6', 'max:6'],
        ], ['code.required' => 'Please enter the code.']);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        $user_id = $request->session()->get('user_id');
        $verify = Verify::where(['user_id' => $user_id, 'otp' => $data['code']])->latest()->get()->first();
        if (empty($verify)) {
            return response()->json([
                'status' => 0,
                'info' => 'Invalid code.'
            ]);
        }

        if (Carbon::parse($verify->otpexpiry)->diffInMinutes(Carbon::now()) > 10) {
            return response()->json([
                'status' => 0,
                'info' => 'Expired code. Click resend code below.'
            ]);
        }

        $verify->otp = null;
        $verify->phonestatus = true;
        $verify->update();
        return response()->json([
            'status' => 1,
            'info' => 'Operation successfull',
            'redirect' => route('login'),
        ]);
    }

    /**
     * Resend otp Api
     */
    public static function resendotp(Request $request)
    {

        $user = User::find($request->session()->get('user_id'));
        if (empty($user)) {
            return response()->json([
                'status' => 0,
                'info' => 'Invalid operation.'
            ]);
        }

        $verify = Verify::where(['user_id' => $user->id])->latest()->get()->first();
        if (empty($verify)) {
            return response()->json([
                'status' => 0,
                'info' => 'Invalid operation.'
            ]);
        }

        $otp = random_int(100000, 999999);
        $verify->otpexpiry = Carbon::now()->addMinutes(10);
        $verify->phonestatus = false;
        $verify->otp = $otp;
        $verify->update();
        Sms::otp(['otp' => $otp, 'phone' => $user->phone]);

        return response()->json([
            'status' => 1,
            'info' => 'Operation successful',
            'redirect' => route('phone.verify'),
        ]);
    }

    public static function verifyemail(string $token)
    {
        $verify = Verify::where(['token' => $token])->first();
        if (empty($verify)) {
            return response()->json([
                'status' => 0,
                'info' => 'Invalid email verification link.'
            ]);
        }

        if (Carbon::parse($verify->tokenexpiry)->diffInMinutes(Carbon::now()) > 60) {
            return response()->json([
                'status' => 0,
                'info' => 'Link expired. Click resend link below.'
            ]);
        }

        if ($verify->emailstatus === true && empty($verify->token)) {
            return response()->json([
                'status' => 1,
                'info' => 'Email already verified.'
            ]);
        }

        $verify->token = null;
        $verify->emailstatus = true;
        $verify->update();
        return response()->json([
            'status' => 1,
            'info' => 'Operation successfull',
            'redirect' => route('login'),
        ]);
    }

    /**
     * View for verifying email link
     */
    public function email($token = '')
    {
        return view('frontend.verify.email')->with(['verify' => self::verifyemail($token)]);
    }

    public static function resendtoken()
    {
        $data = request()->only(['email']);
        $validator = Validator::make($data, [
            'email' => ['required'], 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        $user = User::where(['email' => $email])->first();
        if (empty($user)) {
            return response()->json([
                'status' => 0,
                'info' => 'Invalid account details.'
            ]);
        }

        $token = random_int(100000, 999999);
        $verify = Verify::where(['user_id' => $user->id])->first();
        if (empty($verify)) {
            return response()->json([
                'status' => 0,
                'info' => 'Invalid account details.'
            ]);
        }
        
        $verify->token = $token;
        $verify->tokenexpiry = Carbon::now()->addMinutes(60);

        try {
            $mail = new EmailVerification([ 
                'email' => $data['email'],
                'token' => $token,
            ]);
    
            Mail::to($data['email'])->send($mail);
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
