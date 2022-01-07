<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Models\{Category, Blog, Country};
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * About page view
     */
    public function index()
    {
        return view('user.dashboard.index');
    }
}
