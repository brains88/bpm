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
        $limit = 4;
        $properties = Property::latest('created_at')->paginate($limit);
        return view('user.profile.index')->with(['properties' => $properties, 'limit' => $limit]);
    }
}
