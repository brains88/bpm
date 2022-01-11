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
        $properties = Property::latest('created_at')->paginate(12);
        return view('user.properties.index')->with(['properties' => $properties, 'categories' => Category::where(['type' => 'property'])->get()]);
    }

    /**
     * User add property view
     */
    public function add()
    {
        $properties = Property::latest('created_at')->limit(4)->get();
        return view('user.properties.add')->with(['properties' => $properties, 'categories' => Category::where(['type' => 'property'])->get(), 'countries' => Country::all()]);
    }

    /**
     * User edit property view
     */
    public function edit($category = 'any', $id = 0)
    {
        $property = Property::findOrFail($id);
        return view('user.properties.edit')->with(['categories' => Category::where(['type' => 'property'])->get(), 'countries' => Country::all(), 'property' => $property, 'category' => $category]);
    }

}