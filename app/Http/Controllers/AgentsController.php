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
        return view('agents.index');
    }
}
