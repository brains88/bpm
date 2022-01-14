<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index() {
    
        return view('frontend.Agency.index');

    }

    public function agencylisting(){

        return view('frontend.Agency.AgencyListing');
    }
}
