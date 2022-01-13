<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Plan;

class PricingController extends Controller
{
    /**
     * About page view
     */
    public function index()
    {
        return view('frontend.pricing.index')->with(['plans' => Plan::all()]);
    }
}
