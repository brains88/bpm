<?php

namespace App\Http\Controllers;
use App\Models\{Category, Property, Country};

class PropertiesController extends Controller
{
    /**
     * Properties home view
     */
    public function index()
    {
        return view('frontend.properties.index')->with(['propertyCategories' => Category::where(['type' => 'property'])->get(), 'allProperties' => Property::where('status', '!=', 'sold off')->paginate(15), 'soldProperties' => Property::where(['status' => 'sold off'])->paginate(3)]);
    }


    /**
     * Find Single Property
     */
    public function property($category = 'lands', $id = 45, $slug = '')
    {
        $property = Property::findOrFail($id);
        $categoryid = $property->category_id ?? 0;
        $propertiesByCategory = Property::where(['category_id' => $categoryid])->paginate(15);
        return view('frontend.properties.property')->with(['propertyCategories' => Category::where(['type' => 'property'])->get(), 'propertiesByCategory' => $propertiesByCategory, 'property' => $property, 'soldProperties' => Property::where(['status' => 'sold off'])->paginate(3), 'relatedProperties' => Property::where(['category_id' => $categoryid, 'country_id' => $property->country_id ?? $id, 'status' => $property->status ?? 'for sale'])->paginate(6)]); 
    }

    /**
     * Find Properties by category
     */
    public function category($category = 'lands')
    {
        $categoryid = Category::where(['name' => $category])->first()->id ?? 0;
        $categoryProperties = Property::where(['category_id' => $categoryid])->paginate(16);
        return view('frontend.properties.category')->with(['categoryProperties' => $categoryProperties, 'propertyCategories' => Category::where(['type' => 'property'])->get(), 'soldProperties' => Property::where(['status' => 'sold off'])->paginate(3), 'name' => $category]);
    }

    /**
     * Find Properties by country
     */
    public function country($country = 'usa')
    {
        $countryid = Country::where(['name' => ucfirst($country)])->first()->id ?? 0;
        $countryProperties = Property::where(['country_id' => $countryid])->paginate(16);
        return view('frontend.properties.country')->with(['countryProperties' => $countryProperties, 'propertyCategories' => Category::where(['type' => 'property'])->get(), 'soldProperties' => Property::where(['status' => 'sold off'])->paginate(3), 'country' => $country]);
    }

}
