<?php

namespace App\Http\Controllers\Admin;
use App\Models\{Category, Property, Country, Image};
use App\Http\Controllers\Controller;
use \Exception;
use Validator;

class PropertiesController extends Controller
{
    /**
     * Admin Properties list view
     */
    public function index()
    {
        $properties = Property::latest('created_at')->paginate(12);
        return view('admin.properties.index')->with(['properties' => $properties, 'categories' => Category::where(['type' => 'property'])->get(), 'countries' => Country::all()]);
    }

    /**
     * Admin get properties by country
     */
    public function country($countryid = 0)
    {
        $properties = Property::whereHas('country', function ($query) use ($countryid) {
            $query->where(['id' => $countryid]);
        })->paginate(12);

        $categories = Category::where(['type' => 'property'])->get();
        return view('admin.properties.country')->with(['properties' => $properties, 'categories' => $categories]);
    }

    /**
     * Admin view to edit property
     */
    public function edit($category = '', $id = 0)
    {
        $property = Property::find($id);
        $categories = Category::where(['type' => 'property'])->get();
        return view('admin.properties.edit')->with(['property' => $property, 'categories' => $categories, 'category' => $category, 'countries' => Country::all()]);
    }

    /**
     * Admin get properties by user
     */
    public function user($userid = 0)
    {
        $properties = Property::whereHas('user', function ($query) use ($userid) {
            $query->where(['id' => $userid]);
        })->paginate(12);

        $categories = Category::where(['type' => 'property'])->get();
        return view('admin.properties.user')->with(['properties' => $properties, 'categories' => $categories]);
    }

    /**
     * Admin get properties by category
     */
    public function category($categoryname = 'lands')
    {
        $properties = Property::whereHas('category', function ($query) use ($categoryname) {
            $query->where(['name' => $categoryname]);
        })->paginate(12);

        $categories = Category::where(['type' => 'property'])->get();
        return view('admin.properties.category')->with(['properties' => $properties, 'categories' => $categories]);
    }

    /**
     * Admin search Properties
     */
    public function search()
    {
        $properties = Property::search(request()->query)->paginate(16);
        return view('admin.properties.index')->with(['properties' => $properties, 'categories' => Category::where(['type' => 'property'])->get()]);
    }

}
