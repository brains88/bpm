<?php

namespace App\Http\Controllers\User;
use App\Models\{Credit, Unit};
use App\Http\Controllers\Controller;


class CreditsController extends Controller
{
	/**
     * User credits list view
     */
    public function index()
    {
        return view('user.credits.index')->with(['credits' => auth()->user()->credits->paginate(12), 'units' => Unit::all()]);
    }
}
