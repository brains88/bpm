<?php

namespace App\Http\Controllers;
use App\Models\User;
use Validator;

class LoginController extends Controller
{

    /**
     * Login View
     * 
     * @return void
     */
    public function index()
    {
        return view('frontend.login.index')->with(['title' => 'Login | Geohomes']);
    }

    /**
     * Ajax Login
     * 
     */
    public function auth()
    {
        $data = request()->only('login', 'password');
        $validator = Validator::make($data, [
            'login' => ['required'], 
            'password' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        $user = User::where(['email' => $data['login']])->whereOr(['phone' => $data['login']])->first();
        if (empty($user)) {
            return response()->json([
                'status' => 0,
                'info' => 'Invalid login details.'
            ]);
        }

        if (strtolower($user->status) !== 'active') {
            return response()->json([
                'status' => 0,
                'info' => 'Please verify your account. A verification link was sent to your email after signup.'
            ]);
        }

        if (auth()->attempt(['email' => $data['login'], 'password' => $data['password']]) || auth()->attempt(['phone' => $data['login'], 'password' => $data['password']])) {
            request()->session()->regenerate();
            $redirect = auth()->user()->role === 'admin' ? route('admin') : route('user');

            return response()->json([
                'status' => 1,
                'info' => 'Operation successful.', 
                'redirect' => $redirect,
            ]);
        }

        return response()->json([
            'status' => 0,
            'info' => 'Invalid login details'
        ]);
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->flush();
        request()->session()->invalidate();
        return redirect('/login');
    }

}
