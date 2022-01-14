<?php

namespace App\Http\Controllers\User;
use App\Models\{Category, Property, Country, Image, Division, State};
use App\Http\Controllers\Controller;


class PropertiesController extends Controller
{
	/**
     * User Properties list view
     */
    public function index()
    {
        $properties = Property::latest('created_at')->where(['user_id' => auth()->user()->id])->paginate(12);
        return view('user.properties.index')->with(['properties' => $properties, 'categories' => Category::where(['type' => 'property'])->get()]);
    }

    /**
     * User add property view
     */
    public function add()
    {
        return view('user.properties.add')->with(['categories' => Category::where(['type' => 'property'])->get(), 'countries' => Country::all()]);
    }

    /**
     * User edit property view
     */
    public function edit($category = 'any', $id = 0)
    {
        $property = Property::where(['id' => $id, 'user_id' => auth()->user()->id])->first();
        return view('user.properties.edit')->with(['categories' => Category::where(['type' => 'property'])->get(), 'countries' => Country::all(), 'property' => $property, 'category' => $category]);
    }

}