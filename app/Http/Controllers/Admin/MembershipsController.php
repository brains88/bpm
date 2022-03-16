<?php

namespace App\Http\Controllers\Admin;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembershipsController extends Controller
{
    /**
     * Admin memberships page view
     */
    public function index()
    {
        $memberships = Membership::paginate(24);

        return view('admin.memberships.index')->with(['memberships' => $memberships]);
    }

}
