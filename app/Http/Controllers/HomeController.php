<?php

namespace App\Http\Controllers;
use App\Models\{Category, Property};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home.index')->with(['title' => 'Home | Geohomes Services Limited', 'propertyCategories' => Category::where(['type' => 'property'])->get(), 'allProperties' => Property::where('status', '!=', 'sold off')->paginate(9)]);
    }
}
