<?php

namespace App\Http\Controllers\Api;
use App\Models\{Profile, User};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;


class ProfileController extends Controller
{

    /**
     * Profile image upload
     */
    public function image($id = 0)
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
        $path = 'images/profiles';

        $profile = Profile::find($id);
        if (!empty($profile->image)) {
            $prevfile = explode('/', $profile->image);
            $previmage = end($prevfile);
            $file = "{$path}/{$previmage}";
            if (file_exists($file)) {
                unlink($file);
            }
        }
            
        $profile->image = env('APP_URL')."/images/profiles/{$filename}";
        $image->move($path, $filename);
        $profile->update();
        return response()->json([
            'status' => 1, 
            'info' => 'Profile image updated successfully'
        ]);    
    }
    /**
     * Api add Profile
     */
    public function add()
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
            'phone' => ['nullable', 'unique:profiles'],
            'website' => ['nullable', 'url'],
            'email' => ['nullable', 'email', 'unique:profiles'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        try {
            DB::beginTransaction();
            $profile = Profile::create([
                'country_id' => $data['country'],
                'description' => $data['description'],
                'state' => $data['state'],
                'address' => $data['address'],
                'city' => $data['city'],
                'website' => $data['website'],
                'email' => $data['email'],
                'user_id' => auth()->id(),
                'designation' => $data['designation'],
                'reference' => Str::random(64),
                'role' => $data['role'],
                'phone' => $data['phone'],
            ]);

            $user = auth()->user();
            $user->name = $data['name'];
            $user->update();

            DB::commit();
            return response()->json([
                'status' => 1, 
                'info' => 'Operation successful',
                'redirect' => route('user'),
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
            if (auth()->user()->name !== $data['name']) {
                $user = User::find(auth()->user()->id);
                $user->name = $data['name'];
                $user->update();
            }

            $profile = Profile::find($id);
            $profile->country_id = $data['country'];
            $profile->state = $data['state'];
            $profile->address = $data['address'];
            $profile->designation = $data['designation'];
            $profile->city = $data['city'];
            $profile->description = $data['description'];
            $profile->phone = $data['phone'];
            $profile->role = $data['role'];
            $profile->update();

            DB::commit();
            return response()->json([
                'status' => 1, 
                'info' => 'Operation successful',
                'redirect' => route(request()->subdomain()),
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
