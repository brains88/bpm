<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Membership;

class MembershipsController extends Controller
{
    /**
     * About page view
     */
    public function index()
    {
        return view('frontend.memberships.index')->with(['memberships' => Membership::all()]);
    }
}
