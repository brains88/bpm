<?php

namespace App\Http\Controllers;
use App\Models\{Category, Property};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home.index')->with(['title' => env('APP_NAME'), 'propertyCategories' => Category::where(['type' => 'property'])->get(), 'allProperties' => Property::where('action', '!=', 'sold')->paginate(9)]);
    }
}
