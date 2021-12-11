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
        return view('frontend.signup.index')->with(['title' => 'Signup | Geohomes Services Limited']);
    }

    /**Individual Signup method
     * 
     * @param $request
     * 
     * @return json
     */
    public function individual()
    {
        $data = request()->all();
        $custom = ['retype.required' => 'Please Retype your password', 
        'agree.required' => 'You have to agree to our terms and conditions', 
        'phone.required' => 'Please enter your phone number.', 'retype.same:password' => 'Retype thesame password'];

        $validator = Validator::make($data, [
            'firstname' => ['required', 'string', 'min:3', 'max:55'], 
            'lastname' => ['required', 'string', 'min:3', 'max:55'], 
            'email' => ['nullable', 'email', 'unique:users'], 
            'phone' => ['required', 'min:11', 'max:11'], 
            'password' => ['required', 'string'],
            'retype' => ['required', 'same:password'],
            'agree' => ['required', 'string'],
        ], $custom);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        $email = $data['email'];
        $name = ucwords($data['firstname'].' '.$data['lastname']);
        $phone = $data['phone'];
        DB::beginTransaction();

        // try {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'status' => 0,
                'type' => 'individual',
                'password' => Hash::make($data['password']),
                'role' => 'user',
            ]);

            $phone_token = random_int(100000, 999999);
            $email_token = \Str::random(64);
            $verify = Verify::create([
                'phone_token' => $phone_token,
                'phone_token_expiry' => Carbon::now()->addMinutes(10)->timestamp,
                'user_id' => $user->id,
            ]);

            if (!empty($email)) {
                $verify->email_token = $email_token;
                $verify->email_token_expiry = Carbon::now()->addMinutes(60)->timestamp;
                $verify->update();

                $maildata = [
                    'name' => $name, 
                    'phone_token' => $phone_token, 
                    'email_token' => $email_token,
                ];

                Mail::to($email)->send(new AccountVerification($maildata));
            }

            $sms = self::kudisms([
                'message' => $phone_token, 
                'mobiles' => [$phone],
            ]);
                
            DB::commit();
            return response()->json([
                'status' => 1,
                'info' => 'Operation successful',
                'redirect' => route('verify'),
            ]);

        // } catch (Exception $error) {
        //     DB::rollBack();
        //     return response()->json([
        //         'status' => 0,
        //         'info' => 'Unknown Error. Try Again.'
        //     ]);
        // }
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
            'active' => 0,
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
