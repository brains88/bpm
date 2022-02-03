<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\{Http, DB};
use App\Models\{User, Verify};
use App\Helpers\{Sms};
use Illuminate\Support\Str;
use Carbon\Carbon;
use Validator;
use Hash;
use Mail;
use Exception;


class SignupController extends Controller
{

    /**
     * Singup view Page
     * 
     * @return view
     */
    public function index()
    {
        return view('frontend.signup.index')->with(['title' => 'Signup | Best Property Market']);
    }

    /**
     * @param $request
     * 
     * @return json
     */
    public function signup()
    {
        User::where(['phone' => request()->phone])->delete();
        $data = request()->all();
        $validator = Validator::make($data, [ 
            'email' => ['nullable', 'email', 'unique:users'], 
            'phone' => ['required', 'unique:users'], 
            'password' => ['required', 'string'],
            'retype' => ['required', 'same:password'],
            'agree' => ['required', 'string'],
        ], ['retype.required' => 'Please enter a password', 'agree.required' => 'You have to agree to our terms and conditions', 'phone.required' => 'Please enter your phone number.', 'retype.same:password' => 'Retype thesame password']);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        try {
            DB::beginTransaction();
            $user = User::create([
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
                'role' => 'user',
            ]);

            session(['user_id' => $user->id, 'phone' => $data['phone'], 'email' => $data['email']]);
            $otp = random_int(100000, 999999);
            $verify = Verify::create([
                'otp' => $otp,
                'otpexpiry' => Carbon::now()->addMinutes(10),
                'user_id' => $user->id,
            ]);

            Sms::otp(['otp' => $otp, 'phone' => $data['phone']]);
            if (!empty($data['email'])) {
                $token = Str::random(64);
                $verify->token = $token;
                $verify->tokenexpiry = Carbon::now()->addMinutes(60);
                $verify->update();
                $mail = new EmailVerification([
                    'email' => $data['email'], 
                    'token' => $token,
                ]);

                Mail::to($data['email'])->send($mail);
            }

            DB::commit();
            return response()->json([
                'status' => 1,
                'info' => 'Operation successful',
                'redirect' => route('phone.verify'),
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
