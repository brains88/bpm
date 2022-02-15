<?php

namespace App\Http\Controllers;
use App\Models\{Profile, Review};
use Illuminate\Http\Request;

class AgentsController extends Controller
{
    /**
     * Agents page view
     */
    public function index()
    {
        return view('frontend.agents.index')->with(['agents' => Profile::where(['role' => 'agent'])->paginate(24)]);
    }

    /**
     * Agent profile page
     */
    public function profile($id, $name)
    {
        return view('frontend.agents.profile')->with(['profile' => Profile::findOrFail($id)]);
    }
}
