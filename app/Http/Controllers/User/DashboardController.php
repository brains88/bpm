<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Models\{Category, Blog, Property};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * About page view
     */
    public function index()
    {
        $properties = Property::latest('created_at')->where(['user_id' => Auth::id()])->paginate(12);
        return view('user.dashboard.index')->with(['properties' => $properties]);
    }
}
