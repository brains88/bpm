<?php

namespace App\Http\Controllers;
use App\Models\{Category, Property};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        return view('frontend.home.index')->with(['title' => env('APP_NAME'), 'propertyCategories' => Category::where(['type' => 'property'])->get(), 'allProperties' => Property::where('action', '!=', 'sold off')->paginate(9)]);
=======
        return view('frontend.home.index')->with(['title' => 'Home | Geohomes Services Limited', 'propertyCategories' => Category::where(['type' => 'property'])->get(), 'allProperties' => Property::where('action', '!=', 'sold off')->paginate(9)]);
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
    }
}
