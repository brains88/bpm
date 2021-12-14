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
        return view('admin.properties.index')->with(['allProperties' => Property::paginate(20), 'propertiesCategories' => Category::where(['type' => 'property'])->get()]);
    }

    /**
     * Admin add Property
     */
    public function add()
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'country' => ['required', 'integer'],
            'state' => ['required', 'string'],
            'category' => ['required', 'integer'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
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

        $reference = \Str::uuid();
        $property = Property::create([
            'country_id' => $data['country'],
            'state_id' => $data['state'],
            'address' => $data['address'],
            'city' => $data['city'],
            'action' => $data['action'],
            'category_id' => $data['category'],
            'measurement' => $data['dimension'],
            'user_id' => auth()->user()->id ?? 0,
            'additional' => $data['additional'],
            'reference' => $reference,
            'price' => $data['price'],
        ]);

        return response()->json([
            'status' => 1, 
            'info' => 'Operation successful',
            'redirect' => route('admin.property.edit', ['id' => $property->id, 'reference' => $reference])
        ]);     
    }

    /**
     * Admin edit Property
     */
    public function edit($id = 0, $reference = '')
    {
        $method = strtolower(request()->method());
        switch ($method) {
            case 'get':
                return view('admin.properties.edit')->with(['propertiesCategories' => Category::where(['type' => 'property'])->get(), 'property' => Property::find($id), 'allCountries' => Country::all()]);
                break;
            case 'post':
                $data = request()->all();
                $validator = Validator::make($data, [
                    'country' => ['required', 'integer'],
                    'state' => ['required', 'integer'],
                    'category' => ['required', 'integer'],
                    'address' => ['required', 'string'],
                    'city' => ['required', 'string'],
                    'action' => ['required', 'string'],
                    'measurement' => ['required', 'string'],
                    'additional' => ['required', 'string', 'max:500'],
                    'price' => ['required', 'numeric'],
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => 0, 
                        'error' => $validator->errors()
                    ]);
                }

                $property = Property::find($id);
                $property->country_id = $data['country'];
                $property->state_id = $data['state'];
                $property->address = $data['address'];
                $property->city = $data['city'];
                $property->action = $data['action'];
                $property->category_id = $data['category'];
                $property->measurement = $data['measurement'];
                $property->additional = $data['additional'];
                $property->price = $data['price'];
                $property->update();

                return response()->json([
                    'status' => 1, 
                    'info' => 'Operation successful',
                    'redirect' => route('admin.property.edit', ['id' => $property->id, 'reference' => $reference])
                ]);
            default:
                throw new Exception('Invalid request method');
                break;
        }
            
    }

    /**
     * Admin property add images
     */
    public function image($id = 0, $role = 'main')
    {
        $image = request()->file('image');
        $validator = Validator::make(['image' => $image], [
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg|max:10240']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $extension = $image->getClientOriginalExtension();
        $filename = \Str::uuid().'.'.$extension;
        $path = 'images/properties';
        $link = env('APP_URL')."/images/properties/{$filename}";

        /**
         * Delete previous image file if any
         */
        $delete = function($imageurl = '') use($path) {
            $prevfile = explode('/', $imageurl);
            $previmage = end($prevfile);
            $file = "{$path}/{$previmage}";
            if (file_exists($file)) {
                unlink($file);
            }
        };

        $property = Property::find($id);
        if (is_string($role) && $role === 'main') {
            $imageurl = $property->image ?? '';
            if (!empty($imageurl)) $delete($imageurl);
            $property->image = $link;

            $image->move($path, $filename);
            $property->update();
        }else {
            $imageid = $role;
            $picture = Image::where(['type_id' => $id, 'id' => $imageid])->first();
            if (empty($picture)) {
                $lastid = Image::create([
                    'type_id' => $id,
                    'link' => $link,
                    'type' => 'property',
                ])->id;

                if($lastid) {
                    $image->move($path, $filename);
                    return response()->json([
                        'status' => 1, 
                        'info' => 'Operation successful'
                    ]);
                }else {
                    return response()->json([
                        'status' => 1, 
                        'info' => 'Operation failed'
                    ]);
                }
            }

            $imageurl = $picture->link ?? '';
            if (!empty($imageurl)) $delete($imageurl);
            $picture->link = $link;
            $success = $picture->update();

            if ($success) {
                $image->move($path, $filename);
                return response()->json([
                    'status' => 1, 
                    'info' => 'Operation successful'
                ]);
            }else {
                return response()->json([
                    'status' => 1, 
                    'info' => 'Operation failed'
                ]);
            }
                
        }     
    }

}
