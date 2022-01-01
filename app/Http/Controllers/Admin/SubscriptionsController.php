<?php

namespace App\Http\Controllers\Admin;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionsController extends Controller
{
    /**
     * Admin countries page view
     */
    public function index()
    {
        $subscriptions = Subscription::paginate(16);
        return view('admin.subscriptions.index')->with(['subscriptions' => $subscriptions]);
    }

}
