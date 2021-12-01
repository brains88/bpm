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
        return view('admin.properties')->with(['propertyCategories' => Category::where(['type' => 'property'])->get(), 'allProperties' => Property::where('status', '!=', 'sold off')->paginate(33), 'soldProperties' => Property::where(['status' => 'sold off'])->paginate(6)]);
    }

}
