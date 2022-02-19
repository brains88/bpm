<?php

namespace App\Http\Controllers\Api;
use App\Models\{Category, Property, Country, Image, Division};
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use \Carbon\Carbon;
use \Exception;
use Validator;

class PropertiesController extends Controller
{
	/**
     * Api add Property
     */
    public function add()
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'country' => ['required', 'integer'],
            'state' => ['required', 'string'],
            'category' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'currency' => ['required', 'integer'],
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

        $property = Property::create([
            'country_id' => $data['country'],
            'state' => $data['state'],
            'address' => $data['address'],
            'city' => $data['city'],
            'action' => $data['action'],
            'category' => $data['category'],
            'measurement' => $data['measurement'],
            'user_id' => auth()->user()->id,
            'additional' => $data['additional'],
            'reference' => Str::random(64),
            'currency_id' => $data['currency'] ?? 0,
            'price' => $data['price'],
        ]);

        return response()->json([
            'status' => 1, 
            'info' => 'Operation successful',
            'redirect' => route(request()->subdomain().'.property.edit', [
                'category' => strtolower($property->category),
                'id' => $property->id,
            ]),
        ]); 

    }

    /**
     * Api [post] edit Property
     */
    public function update($id = 0, $category = 'any')
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'country' => ['required', 'integer'],
            'state' => ['required', 'string'],
            'category' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'currency' => ['required', 'integer'],
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

        $property = Property::findOrFail($id);
        $property->country_id = $data['country'];
        $property->state = $data['state'];
        $property->address = $data['address'];
        $property->city = $data['city'];
        $property->action = $data['action'];
        $property->category = $data['category'];
        $property->measurement = $data['measurement'];
        $property->additional = $data['additional'];
        $property->price = $data['price'];
        $property->currency_id = $data['currency'] ?? 0;
        $property->update();

        return response()->json([
            'status' => 1, 
            'info' => 'Operation successful',
            'redirect' => route(request()->subdomain().'.properties'),
        ]);
            
    }

    /**
     * Property api for image upload
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
        $filename = Str::uuid().'.'.$extension;
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

        $reference = Str::uuid();
        $property = Property::find($id);
        if (is_string($role) && $role === 'main') {
            $imageurl = $property->image ?? '';
            if (!empty($imageurl)) {
                $delete($imageurl);
            }

            $property->image = $link;
            $property->reference = $reference;
            $image->move($path, $filename);
            $property->update();
            return response()->json([
                'status' => 1, 
                'info' => 'Operation successful'
            ]);
        }else {
            $imageid = $role;
            $picture = Image::where([
                'property_id' => $id, 
                'id' => $imageid,
            ])->first();
            
            if (empty($picture)) {
                $lastid = Image::create([
                    'property_id' => $id,
                    'reference' => $reference,
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
            if (!empty($imageurl)) {
                $delete($imageurl);
            }

            $picture->link = $link;
            $picture->reference = $reference;
            $picture->update();

            $image->move($path, $filename);
            return response()->json([
                'status' => 1, 
                'info' => 'Operation successful'
            ]);
                
        }     
    }

    /**
     * Api update property action
     */
    public function action($id = 0)
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'action' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $property = Property::find($id);
        $property->action = $data['action'];
        $updated = $property->update();

        return response()->json([
            'status' => 1, 
            'info' => 'Operation successful',
            'redirect' => '',
        ]);
    }

    /**
     * Api update property specifics
     * 
     * Like only residential properties should have bedrooms
     */
    public function specifics($id, $category = 'land')
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'group' => ['nullable', 'string'],
            'bedrooms' => ['nullable', 'integer'],
            'toilets' => ['nullable', 'integer'],
            'listed' => ['required', 'string'],
        ], ['listed.required' => 'Please select yes or no']);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $property = Property::find($id);
        if (empty($property->image) && $data['listed'] == 'yes') {
            return response()->json([
                'status' => 0, 
                'info' => 'You have to upload property images before listing.',
                'redirect' => '',
            ]);
        }

        $property->group = $data['group'];
        $property->bedrooms = $data['bedrooms'] ?? null;
        $property->toilets = $data['toilets'] ?? null;
        $property->listed = $data['listed'];
        $updated = $property->update();

        return response()->json([
            'status' => 1, 
            'info' => 'Operation successful',
            'redirect' => route('user.properties'),
        ]);
    }

    /**
     * Api promote property
     */
    public function promote($id = 0)
    {
        $data = request()->only(['credit', 'property']);
        $validator = Validator::make($data, [
            'credit' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $creditid = $data['credit'];
        $credit = Credit::find($creditid);
        if (empty($credit)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid credit.',
            ]);
        }

        $propertyid = $data['property'] ?? 0;
        $property = Property::find($propertyid);
        if (empty($property)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid property promotion.',
            ]);
        }

        try {
            DB::beginTransaction();
            $credit->status = 'running';
            $credit->update();

            $days = $credit->duration ?? 0;
            Promotion::create([
                'credit_id' => $credit->id,
                'duration' => $days,
                'started' => Carbon::today(),
                'expiry' => Carbon::today()->addDays($days),
                'status' => 'active',
                'user_id' => auth()->user()->id,
                'property_id' => $property->id,
            ]);

            DB::commit();
            return response()->json([
                'status' => 1, 
                'info' => 'Operation successful',
                'redirect' => '',
            ]);
            
        } catch (Exception $error) {
            DB::rollback();
            return response()->json([
                'status' => 0, 
                'info' => 'Operation failed',
            ]);
        }
    }
}