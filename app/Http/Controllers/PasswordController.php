<?php

namespace App\Http\Controllers;
use App\Mail\PasswordResetMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{User, Password};
use Validator;
use DB;
use Mail;
use Hash;


class PasswordController extends Controller
{
    public function index()
    {
        return view('password.index', [
            'title' => 'Forgot Password | Subrefill'
        ]);
    }

    public function email(Request $request)
    {
        $data = $request->only('email');
        $validator = Validator::make($data, [
            'email' => ['required', 'email']
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        $token = Str::random(64);
        $email = $data['email'];
        Password::where(['email' => $email])->delete();
        $reset = Password::insert([
            'email' => $email, 
            'token' => $token
        ]);

        $link = config('app.url')."/password/reset/{$token}";
        $info = ['link' => $link, 'email' => $email];

        try {
            $template = new PasswordResetMail($info);
            Mail::to($email)->send($template);
            return response()->json([
                'status' => 1,
                'info' => 'Check your email. A password reset link has been sent.',
                'email' => $email,
                'token' => $token
            ]);
        } catch (Exception $error) {
            return response()->json([
                'status' => 0,
                'info' => 'Network Error. Try Again.'
            ]);
        }
    }

    public function verify($token = '')
    {   
        $verify = self::check($token);
        $expired = !Carbon::parse($verify['data']->created_at ?? null)->addMinutes($minutes = 1440)->gt(Carbon::now());
        return view('password.verify', ['title' => 'Password Reset | Subrefill', 'token' => $verify['data']->token ?? null, 'expired' => $expired, 'user' => $verify['user'] ?? null]);
    }

    private static function check($token = '') {
        $reset = Password::where(['token' => $token])->latest()->first();
        return ['data' => $reset, 'user' => User::where(['email' => $reset->email ?? null])->first()];
    }

    public function reset(Request $request)
    {
        $data = $request->only('password', 'confirmpassword', 'email');
        $validator = Validator::make($data, [
            'password' => ['required', 'min:8'],
            'confirmpassword' => ['required'],
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        if ($data['password'] !== $data['confirmpassword']) {
            return response()->json([
                'status' => 0,
                'info' => 'Passwords do not match.'
            ]);
        }

        $email = $data['email'] ?? null;
        if (empty($email)) {
            return response()->json([
                'status' => 0,
                'info' => 'Invalid Operation. Try Again Later.'
            ]);
        }

        $user = User::where(['email' => $email])->first();
        $user->password = Hash::make($data['password']);
        if($user->update()) {
            Password::where(['email' => $email])->delete();
            return response()->json([
                'status' => 1,
                'info' => 'Operation Successful',
                'redirect' => route('login')
            ]);
        }

        return response()->json([
            'status' => 0,
            'info' => 'Operation Failed. Try Again.',
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->only('password', 'newpassword', 'confirmpassword', 'email');
        $validator = Validator::make($data, [
            'password' => ['required'],
            'newpassword' => ['required', 'min:8'],
            'confirmpassword' => ['required'],
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        if ($data['newpassword'] !== $data['confirmpassword']) {
            return response()->json([
                'status' => 0,
                'info' => 'Passwords do not match.'
            ]);
        }

        $user = User::find(auth()->user()->id);
        if (!Hash::check($data['password'], $user->password)) {
            return response()->json([
                'status' => 0,
                'info' => 'Your current password is not correct.'
            ]);
        }

        $user->password = Hash::make($data['newpassword']);
        $user->update();
        auth()->logout();
        $request->session()->flush();
        $request->session()->invalidate();

        return response()->json([
            'status' => 1,
            'info' => 'Operation Successful. Try Again.',
            'redirect' => route('login'),
        ]);
 
    }
}
