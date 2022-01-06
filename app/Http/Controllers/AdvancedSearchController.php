<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvancedSearchController extends Controller
{
    public function index() 
    {
        return view('frontend.AdvancedSearch.index');
    }
}
