<?php

namespace App\Http\Controllers\User;
use App\Models\{Review, Payment, Credit};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Helpers\Paystack;
use \Exception;
use Validator;


class ReviewsController extends Controller
{
	/**
     * User reviews list view
     */
    public function index()
    {
        $user = auth()->user()->profile;
        return view('user.reviews.index')->with(['reviews' => Review::where(['profile_id' => $user->id])->paginate(10)]);
    }

    /**
     * Review a user
     */
    public function add($profileid)
    {
        $data = request()->only(['review']);
        $validator = Validator::make($data, [
            'review' => ['required', 'string', 'max:500'],
        ]);

        $reviewer = Review::where(['profile_id' => $profileid, 'user_id' => auth()->user()->id])->first();
        if (!empty($reviewer)) {
            return response()->json([
                'status' => 0, 
                'info' => 'You have already reviewed this profile.'
            ]);
        }

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        Review::create([
            'review' => $data['review'],
            'profile_id' => $profileid,
            'status' => 'active',
            'user_id' => auth()->user()->id,
        ]);

        return response()->json([
            'status' => 1, 
            'info' => 'Operation successful',
            'redirect' => '',
        ]);       
    }

}