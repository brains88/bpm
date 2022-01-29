<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Mail\AccountVerification;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Validator;
use Hash;
use Mail;
use Illuminate\Support\Facades\{Http, DB};
use Exception;
use App\Models\Verify;


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
        $data = request()->all();
        $validator = Validator::make($data, [ 
            'email' => ['nullable', 'email', 'unique:users'], 
            'phone' => ['required', 'min:11', 'max:11'], 
            'password' => ['required', 'string'],
            'retype' => ['required', 'same:password'],
            'agree' => ['required', 'string'],
        ], ['retype.required' => 'Please enter a password', 
        'agree.required' => 'You have to agree to our terms and conditions', 
        'phone.required' => 'Please enter your phone number.', 'retype.same:password' => 'Retype thesame password']);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        try {
            $email = $data['email'] ?: null;
            $phone = $data['phone'];
            DB::beginTransaction();

            $user = User::create([
                'email' => $email,
                'phone' => $phone,
                'password' => Hash::make($data['password']),
                'role' => 'user',
            ]);

            $otp = random_int(100000, 999999);
            $verify = Verify::create([
                'otp' => $otp,
                'otpexpiry' => Carbon::now()->addMinutes(10)->timestamp,
                'user_id' => $user->id,
            ]);

            if (!empty($email)) {
                $token = \Str::random(64);
                $verify->token = $token;
                $verify->tokenexpiry = Carbon::now()->addMinutes(60)->timestamp;
                $verify->update();
                Mail::to($email)->send(new AccountVerification(['email' => $email, 'token' => $token]));
            }

            Sms::otp(['message' => '']);
            DB::commit();
            return response()->json([
                'status' => 1,
                'info' => 'Operation successful',
                'redirect' => route('verify'),
            ]);

        } catch (Exception $error) {
            DB::rollBack();
            return response()->json([
                'status' => 0,
                'info' => 'Unknown Error. Try Again.'
            ]);
        }
    }

    /**
     * 
     * Corporate Signup method
     * 
     * @param $request
     * 
     * @return json
     */
    public function corporate(Request $request)
    {
        $data = $request->all();
        $custom = ['retype.required' => 'Please Retype your password', 'agree.required' => 'You have to agree to our terms and conditions', 'phone.required' => 'Please enter your phone number.', 'address.required' => 'Office address is required.', 'companyname.required' => 'Company name is required.'];

        $validator = Validator::make($data, [ 
            'companyname' => ['required', 'string', 'min:3', 'max:255'], 
            'email' => ['required', 'email', 'unique:users'], 
            'phone' => ['required', 'min:11', 'max:11'], 
            'password' => ['required', 'string'],
            'retype' => ['required'],
            'address' => ['required', 'string'],
            'agree' => ['required'],
        ], $custom);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        if ($data['password'] !== $data['retype']) {
            return response()->json([
                'status' => 0,
                'info' => 'Your both passwords do not match.'
            ]);
        }

        $email = $data['email'];
        $token = (string)Str::uuid();
        $user = User::create([
            'name' => $data['companyname'],
            'email' => $email,
            'phone' => $data['phone'],
            'type' => 'corporate',
            'active' => 'inactive',
            'password' => Hash::make($data['password']),
            'role' => 'user',
            'verify_token' => $token
        ]);

        try {
            $link = config('app.url')."/signup/verify/{$token}";
            Mail::to($email)->send((new EmailVerifyMail([
                    'link' => $link, 
                    'email' => $email, 
                    'name' => $name
                ]))
            );
            return response()->json([
                'status' => 1,
                'info' => 'Operation successful',
                'redirect' => route('signup.success'),
                'user' => $user,
                'token' => $user->createToken('appToken')->plainTextToken
            ]);
        } catch (Exception $error) {
            return response()->json([
                'status' => 0,
                'info' => 'Network Error. Try Again.'
            ]);
        }
    }

}
