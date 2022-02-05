<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Models\{Profile};
use App\Http\Controllers\Controller;


class ProfileController extends Controller
{
    /**
     * Api add Profile
     */
    public function add()
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:300'],
            'country' => ['required', 'integer'],
            'state' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'currency' => ['required', 'integer'],
            'additional' => ['required', 'string', 'max:500'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $material = Profile::create([
            'name' => $data['name'],
            'country_id' => $data['country'],
            'state' => $data['state'],
            'address' => $data['address'],
            'city' => $data['city'],
            'quantity' => $data['quantity'],
            'user_id' => auth()->user()->id,
            'additional' => $data['additional'],
            'reference' => \Str::uuid(),
            'currency_id' => $data['currency'] ?? 0,
            'price' => $data['price'],
        ]);

        if ($material) {
            return response()->json([
                'status' => 1, 
                'info' => 'Operation successful',
                'redirect' => route("{$this->subdomain}.profile"),
            ]); 
        }else {
            return response()->json([
                'status' => 0, 
                'info' => 'Operation failed. Try again.',
            ]);   
        }

    }
}
