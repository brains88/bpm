<?php

namespace App\Http\Controllers\User;
use App\Models\{Advert, Credit};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use \Exception;
use Validator;


class AdvertsController extends Controller
{

    /**
     * Post advert
     */
    public function post()
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'credit' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'link' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $credit = Credit::find($data['credit']);
        if (empty($credit)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid advert credit'
            ]);
        }

        try {
            Advert::create([
                'reference' => Str::random(64),
                'description' => $data['description'],
                'credit_id' => $credit->id,
                'link' => $data['link'],
                'user_id' => auth()->id(),
                'status' => 'initialized',
            ]);

            $credit->inuse = true;
            $credit->update();
            return response()->json([
                'status' => 1, 
                'info' => 'Operation successful.',
                'redirect' => ''
            ]);
        } catch (Exception $error) {
            return response()->json([
                'status' => 0, 
                'info' => 'Operation failed. Try again.'
            ]);
        }         
    }

}