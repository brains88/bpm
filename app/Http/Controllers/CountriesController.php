<?php

namespace App\Http\Controllers\Admin;
use App\Models\Country;
use App\Http\ControllerS\Controller;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    
    /**
     * About page view
     */
    public function index()
    {
        return view('admin.countries.index')->with(['allCountries' => Country::cursorPaginate(22)]);
    }

}
