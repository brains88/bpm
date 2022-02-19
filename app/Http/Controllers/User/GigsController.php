<?php

namespace App\Http\Controllers\User;
use App\Models\Gig;
use App\Http\Controllers\Controller;
use Validator;


class GigsController extends Controller
{
	/**
     * User gigs list view
     */
    public function index()
    {
        return view('user.gigs.index')->with(['gigs' => Gig::where(['user_id' => auth()->user()->id])->get()]);
    }

    /**
     * Buy ads credit
     */
    public function create()
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'description' => ['required', 'string', 'max:400'],
            'service' => ['required', 'integer',],
            'price' => ['required', 'numeric'],
        ]);

        $gig = Gig::where([
            'user_id' => auth()->user()->id, 
            'service_id' => $data['service']
        ])->first();

        if (!empty($gig)) {
            return response()->json([
                'status' => 0, 
                'info' => 'You have already created a gig with the service selected.'
            ]);
        }

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        Gig::create([
            'description' => $data['description'],
            'service_id' => $data['service'],
            'price' => $data['price'],
            'status' => 'active',
            'user_id' => auth()->user()->id,
        ]);

        return response()->json([
            'status' => 1, 
            'info' => 'Operation successful',
            'redirect' => '',
        ]);       
    }

    /**
     * Buy ads credit
     */
    public function edit($id)
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'description' => ['required', 'string', 'max:400'],
            'service' => ['required', 'integer',],
            'price' => ['nullable', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $gig = Gig::find($id);
        $gig->description = $data['description'];
        $gig->service_id = $data['service'];
        $gig->price = $data['price'];
        $gig->update();

        return response()->json([
            'status' => 1, 
            'info' => 'Operation successful',
            'redirect' => '',
        ]);       
    }

}