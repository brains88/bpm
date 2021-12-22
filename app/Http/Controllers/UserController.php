<?php

namespace App\Http\Controllers;
use App\Models\{User};
use Illuminate\Http\Request;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class UserController extends Controller
{
    
    public function index() 
    {   
<<<<<<< HEAD
        return view('app.user.index')->with([]);
=======
        return view('frontend.home.index')->with([]);
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
    }

}
