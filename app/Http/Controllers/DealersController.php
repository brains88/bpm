<?php

namespace App\Http\Controllers;
use App\Models\{Profile, Review};
use Illuminate\Http\Request;

class DealersController extends Controller
{
    /**
     * Dealers page view
     */
    public function index()
    {
        return view('frontend.dealers.index')->with(['dealers' => Profile::where(['role' => 'dealer'])->paginate(24)]);
    }

    /**
     * Dealers profile page
     */
    public function profile($id, $name)
    {
        return view('frontend.dealers.profile')->with(['profile' => Profile::findOrFail($id)]);
    }
}
