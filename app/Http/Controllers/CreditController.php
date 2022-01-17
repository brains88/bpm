<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    /**
     * Verify ads credit purchage
     */
    public function verify()
    {
        return view('frontend.agents.index');
    }
}
