<?php

namespace App\Http\Controllers\Api;
use App\Models\Social;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use \Exception;
use Validator;

class SocialsController extends Controller
{

    /**
     * Add social
     */
    public function add()
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'linkedin' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'facebook' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'whatsapp' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        Social::create([
            'twitter' => $data['twitter'],
            'youtube' => $data['youtube'],
            'facebook' => $data['facebook'],
            'instagram' => $data['instagram'],
            'reference' => Str::uuid(),
            'whatsapp' => $data['whatsapp'],
            'linkedin' => $data['linkedin'],
            'user_id' => auth()->id(),
        ]);
            
        return response()->json([
            'status' => 1, 
            'info' => 'Operation successful.',
            'redirect' => '',
        ]);        
    }

    /**
     * Edit social
     */
    public function edit($id = 0)
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'linkedin' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'facebook' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'whatsapp' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $social = Social::find($id);
        $social->whatsapp = $data['whatsapp'];
        $social->linkedin = $data['linkedin'];
        $social->twitter = $data['twitter'];
        $social->facebook = $data['facebook'];
        $social->instagram = $data['instagram'];
        $social->youtube = $data['youtube'];
        $social->update();
            
        return response()->json([
            'status' => 1, 
            'info' => 'Operation successful.',
            'redirect' => '',
        ]);        
    }

}