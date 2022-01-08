<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authorController extends Controller
{
    public function index(){
        return view('frontend.Author.index');
    }
}
