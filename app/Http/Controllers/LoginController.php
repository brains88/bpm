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
    public function authenticate()
    {
        $data = request()->only('email', 'password');
        $validator = Validator::make($data, [
            'email' => ['required', 'email'], 
            'password' => ['required']
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        $user = User::where([
            'email' => $data['email']
        ])->first();
        
        if (empty($user)) {
            return response()->json([
                'status' => 0,
                'info' => 'Invalid login details.'
            ]);
        }

        if ((int)$user->active !== 1) {
            return response()->json([
                'status' => 0,
                'info' => 'Please verify your account. A verification link was sent to your email after signup.'
            ]);
        }

        if (auth()->attempt($data, true)) {
            request()->session()->regenerate();
            $redirect = auth()->user()->role === 'admin' ? route('admin') : route('agent');

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
