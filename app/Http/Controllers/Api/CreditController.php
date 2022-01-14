<?php

namespace App\Http\Controllers\Api;
use App\Models\{User};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use \Exception;
use Validator;

class CreditController extends Controller
{

    /**
     * Buy ads credit
     */
    public function buy($id = 0)
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'unit' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $reference = \Str::uuid();
        try {
            DB::beginTransaction();
            Payment::create([
                'reference' => $reference,
                'amount' => $amount,
                'type' => 'subscription',
                'status' => 'initialized',
                'user_id' => auth()->user()->id,
            ]);

            Credit::create([]);

            $material = User::find($id);
            $material->name = $data['name'];
            $updated = $material->update();

            DB::commit();
            $paystack = (new Paystack())->initialize([
                'amount' => $amount * 100, //in kobo
                'email' => auth()->user()->email, 
                'reference' => $reference,
                'currency' => 'NGN',
            ]);

            if ($paystack) {
                return response()->json([
                    'status' => 1, 
                    'info' => 'Payment initialized. Please wait . . .',
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