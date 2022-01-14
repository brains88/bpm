<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Models\{Subscription, Property, Unit};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * About page view
     */
    public function index()
    {
        $limit = 4;
        $properties = Property::latest('created_at')->where(['user_id' => auth()->user()->id])->paginate($limit);
        return view('user.dashboard.index')->with(['properties' => $properties, 'limit' => $limit, 'subscription' => Subscription::where(['user_id' => auth()->user()->id])->first(), 'units' => Unit::all()]);
    }
}
