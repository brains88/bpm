<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentsController extends Controller
{
    /**
     * Agents page view
     */
    public function index()
    {
        return view('frontend.agents.index');
    }

    /**
     * Agent profile page
     */
    public function profile()
    {
        return view('frontend.agents.profile');
    }
}
