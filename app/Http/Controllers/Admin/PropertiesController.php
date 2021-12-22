<?php

namespace App\Http\Controllers\Admin;
use App\Models\{Category, Property, Country};
use App\Http\Controllers\Controller;

class PropertiesController extends Controller
{
    /**
     * Admin Properties list view
     */
    public function index()
    {
        return view('admin.properties.index')->with(['allProperties' => Property::paginate(21)]);
    }

    /**
     * Admin add Property
     */
    public function add()
    {
        return view('admin.properties.add')->with(['propertiesCategories' => Category::where(['type' => 'property'])->get(), 'allCountries' => Country::all()]);
    }

    /**
     * Admin Properties categories
     */
    public function categories()
    {
        return view('admin.properties.categories')->with(['propertiesCategories' => Category::where(['type' => 'property'])->get()]);
    }


}
