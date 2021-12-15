<?php

namespace App\Http\Controllers\Admin;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\ControllerS\Controller;

class CountriesController extends Controller
{
    
    /**
     * About page view
     */
    public function index()
    {
        $countries = Country::with('properties')->skip(0)->take(12)->get()->SortByDesc(function($country){
            return $country->properties->count();
        });

        return view('admin.countries.index')->with(['countries' => $countries]);
    }

}
