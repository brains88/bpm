<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingsController extends Controller
{
    /**
     * Properties home view
     */
    public function index()
    {
        return view('listings.index')->with(['propertyCategories' => Category::where(['type' => 'property'])->get(), 'allProperties' => Property::where('status', '!=', 'sold off')->paginate(15), 'soldProperties' => Property::where(['status' => 'sold off'])->paginate(6)]);
    }

    /**
     * Find Single Property
     */
    public function property($category = 'lands', $id = 5, $slug = '')
    {
        $property = Property::findOrFail($id);
        $categoryid = $property->category_id ?? 0;
        $propertiesByCategory = Property::where(['category_id' => $categoryid])->paginate(15);
        return view('listings.property')->with(['propertyCategories' => Category::where(['type' => 'property'])->get(), 'propertiesByCategory' => $propertiesByCategory, 'property' => $property, 'soldProperties' => Property::where(['status' => 'sold off'])->paginate(4), 'relatedProperties' => Property::where(['category_id' => $categoryid, 'country_id' => $property->country_id ?? $id, 'status' => $property->status ?? 'for sale'])->paginate(6)]); 
    }

    /**
     * Find Properties by category
     */
    public function category($category = 'lands')
    {
        $categoryid = Category::where(['name' => $category])->first()->id ?? 0;
        $categoryProperties = Property::where(['category_id' => $categoryid])->paginate(16);
        return view('listings.category')->with(['categoryProperties' => $categoryProperties, 'propertyCategories' => Category::where(['type' => 'property'])->get(), 'soldProperties' => Property::where(['status' => 'sold off'])->paginate(6), 'name' => $category]);
    }

    /**
     * Find Properties by country
     */
    public function country($country = 'usa')
    {
        $countryid = Country::where(['name' => ucfirst($country)])->first()->id ?? 0;
        $countryProperties = Property::where(['country_id' => $countryid])->paginate(16);
        return view('listings.country')->with(['countryProperties' => $countryProperties, 'propertyCategories' => Category::where(['type' => 'property'])->get(), 'soldProperties' => Property::where(['status' => 'sold off'])->paginate(6), 'country' => $country]);
    }
}
