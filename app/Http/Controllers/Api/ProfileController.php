<?php

namespace App\Http\Controllers\Api;
use App\Models\{Profile, User};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;


class ProfileController extends Controller
{
    /**
     * Api add Profile
     */
    public function setup()
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:300'],
            'country' => ['required', 'integer'],
            'designation' => ['required', 'string'],
            'state' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'description' => ['required', 'string', 'max:500'],
            'role' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        try {
            DB::beginTransaction();
            $user = User::find(auth()->user()->id);
            $user->name = $data['name'];
            $user->update();

            Profile::create([
                'country_id' => $data['country'],
                'state' => $data['state'],
                'address' => $data['address'],
                'designation' => $data['designation'],
                'city' => $data['city'],
                'user_id' => auth()->user()->id,
                'description' => $data['description'],
                'reference' => \Str::uuid(),
                'roles' => $data['role'],
                'phone' => $data['phone'],
            ]);

            DB::commit();
            return response()->json([
                'status' => 1, 
                'info' => 'Operation successful',
                'redirect' => route("{$this->subdomain}.profile"),
            ]);
        } catch (Exception $error) {
            DB::rollback();
            return response()->json([
                'status' => 0, 
                'info' => 'Operation failed. Try again.',
            ]);
        }    

    }

    /**
     * Api edit Profile
     */
    public function edit($id)
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:300'],
            'country' => ['required', 'integer'],
            'designation' => ['required', 'string'],
            'state' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'description' => ['required', 'string', 'max:500'],
            'phone' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        try {
            DB::beginTransaction();
            if (auth()->user()->name !== $data['name']) {
                $user = User::findOrFail(auth()->user()->id);
                $user->name = $data['name'];
                $user->update();
            }

            $profile = Profile::findOrFail($id);
            $profile->country_id = $data['country'];
            $profile->state = $data['state'];
            $profile->address = $data['address'];
            $profile->designation = $data['designation'];
            $profile->city = $data['city'];
            $profile->description = $data['description'];
            $profile->phone = $data['phone'];
            $profile->update();

            DB::commit();
            return response()->json([
                'status' => 1, 
                'info' => 'Operation successful',
                'redirect' => route("{$this->subdomain}.profile"),
            ]);
        } catch (Exception $error) {
            DB::rollback();
            return response()->json([
                'status' => 0, 
                'info' => 'Operation failed. Try again.',
            ]);
        }    

    }
}
