<?php

namespace App\Http\Controllers\Admin;
use App\Models\{Category, Property, Country};
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
        return view('admin.properties.index')->with(['allProperties' => Property::paginate(20)]);
    }

    /**
     * Admin add Property
     */
    public function add()
    {
        $method = strtolower(request()->method());
        switch ($method) {
            case 'get':
                return view('admin.properties.add')->with(['propertiesCategories' => Category::where(['type' => 'property'])->get()]);
                break;
            case 'post':
                $data = request()->all();
                $validator = Validator::make($data, [
                    'country' => ['required', 'integer'],
                    'state' => ['required', 'integer'],
                    'category' => ['required', 'integer'],
                    'address' => ['required', 'string'],
                    'city' => ['required', 'integer'],
                    'action' => ['required', 'string'],
                    'dimension' => ['required', 'string'],
                    'additional' => ['required', 'string', 'max:500'],
                    'price' => ['required', 'numeric'],
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => 0, 
                        'error' => $validator->errors()
                    ]);
                }

                Property::create([
                    'country_id' => $data['country'],
                    'state_id' => $data['state'],
                    'address' => $data['address'],
                    'city' => $data['city'],
                    'action' => $data['action'],
                    'state_id' => $data['state'],
                    'category_id' => $data['category'],
                    'dimension' => $data['dimension'],
                    'user_id' => auth()->user()->id ?? 0,
                    'additional' => $data['additional'],
                    'reference' => \Str::uuid(),
                    'price' => $data['price'],
                ]);

                return response()->json([
                    'status' => 1, 
                    'info' => 'Operation successful',
                    'redirect' => ''
                ]);
            default:
                throw new Exception('Invalid request method');
                break;
        }
            
    }

    /**
     * Admin Properties categories
     */
    public function categories()
    {
        return view('admin.properties.categories')->with(['propertiesCategories' => Category::where(['type' => 'property'])->get()]);
    }


}
