<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Models\{Category, Blog, Property};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * User profile view
     */
    public function index()
    {
        return view('user.profile.index')->with([]);
    }

    /**
     * User profile setup view
     */
    public function setup()
    {
        return view('user.profile.setup')->with([]);
    }
}
