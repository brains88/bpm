<?php

namespace App\Http\Controllers;
use App\Models\{User};
use Illuminate\Http\Request;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class UserController extends Controller
{
    
    public function index() 
    {   
        return view('frontend.home.index')->with([]);
    }

}
