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
            'facebook' => ['required', 'url'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        Social::create([
            'twitter' => $data['twitter'],
            'facebook' => $data['facebook'],
            'reference' => Str::uuid(),
            'whatsapp' => $data['whatsapp'] ?? null,
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
            'qualification' => ['required', 'string'],
            'institution' => ['required', 'string'],
            'year' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $certificate = Social::find($id);
        $certificate->institution = $data['institution'];
        $certificate->year = $data['year'];
        $certificate->qualification = $data['qualification'];
        $certificate->update();
            
        return response()->json([
            'status' => 1, 
            'info' => 'Operation successful.',
            'redirect' => '',
        ]);        
    }

}