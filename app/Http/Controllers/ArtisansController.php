<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ArtisansController extends Controller
{
    /**
     * Artisans home page
     */
    public function index()
    {
        return view('frontend.artisans.index');
    }

    /**
     * Artisan profile page
     */
    public function profile()
    {
        return view('frontend.artisans.profile');
    }
}
