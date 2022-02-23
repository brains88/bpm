<?php

namespace App\Http\Controllers\User;
use App\Models\Advert;
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
        $data = request()->only(['unit']);
        $validator = Validator::make($data, [
            'unit' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $unit = Unit::find($data['unit']);
        if (empty($unit)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid ads unit'
            ]);
        }

        try {
            $amount = $unit->price ?? 0;
            $reference = (string)Str::uuid();

            DB::beginTransaction();
            $payment = Payment::create([
                'reference' => $reference,
                'amount' => $amount,
                'product_id' => $unit->id,
                'type' => 'adverts',
                'status' => 'initialized',
                'user_id' => auth()->id(),
            ]);

            DB::commit();
            $paystack = (new Paystack())->initialize([
                'amount' => $amount * 100, //in kobo
                'email' => auth()->user()->email, 
                'reference' => $reference,
                'currency' => 'NGN',
                'callback_url' => route('user.credits')
            ]);

            if ($paystack) {
                return response()->json([
                    'status' => 1, 
                    'info' => 'Please wait . . .',
                    'redirect' => $paystack->data->authorization_url,
                ]);
            }
            
            return response()->json([
                'status' => 0, 
                'info' => 'Payment initialization failed. Try again.',
            ]);
        } catch (Exception $error) {
            DB::rollback();
            return response()->json([
                'status' => 0, 
                'info' => 'An error occured. Refresh the page and try again.'
            ]);
        }         
    }

}