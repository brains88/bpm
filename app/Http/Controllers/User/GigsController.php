<?php

namespace App\Http\Controllers\User;
use App\Models\Gig;
use App\Http\Controllers\Controller;


class GigsController extends Controller
{
	/**
     * User materials list view
     */
    public function index()
    {
        return view('user.gigs.index')->with(['gigs' => []]);
    }

}