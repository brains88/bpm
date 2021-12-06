<?php

namespace App\Http\Controllers\Admin;
use App\Models\{Category, Property, Country};
use App\Http\ControllerS\Controller;

class PropertiesController extends Controller
{
    /**
     * Admin Properties home view
     */
    public function index()
    {
        return view('admin.properties.index')->with(['propertyCategories' => Category::where(['type' => 'property'])->get(), 'allProperties' => Property::where('status', '!=', 'sold off')->paginate(21), 'soldProperties' => Property::where(['status' => 'sold off'])->paginate(6), 'allCountries' => Country::all()]);
    }

    /**
     * Admin add Property
     */
    public function add()
    {
        return view('admin.properties.add')->with(['propertyCategories' => Category::where(['type' => 'property'])->get(), 'allProperties' => Property::where('status', '!=', 'sold off')->paginate(21), 'allCountries' => Country::all()]);
    }

}
