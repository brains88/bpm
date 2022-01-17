<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\{Subscription, Membership, Payment};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helpers\Paystack;
use \Exception;
use \Carbon\Carbon;


class SubscriptionController extends Controller
{
    /**
     * initialize and Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function initialize()
    {
        $data = request()->only(['amount', 'plan']);
        $amount = $data['amount'] ?? 0;
        $plan = $data['plan'] ?? 0;

        if (empty($plan) || empty($amount)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid Payment request'
            ]);
        }

        try {
            $plan = Membership::find($data['plan']);
            if (empty($plan)) {
                return response()->json([
                    'status' => 0, 
                    'info' => 'Invalid Payment request'
                ]);
            }

            /**
             * This method generates a unique super secure cryptographic hash token to use as transaction reference
             * @returns string
             */
            $reference = (string)Str::uuid();
            DB::beginTransaction();
            $payment = Payment::create([
                'reference' => $reference,
                'amount' => $amount,
                'type' => 'subscription',
                'status' => 'initialized',
                'user_id' => auth()->user()->id,
            ]);

            $days = Membership::$durations[$plan->duration] ?? 0;
            Subscription::create([
                'duration' => $days,
                'user_id' => auth()->user()->id,
                'reference' => $reference,
                'membership_id' => $plan->id ?? 0,
                'status' => 'initialized',
                'amount' => $amount,
                'payment_id' => $payment->id,
            ]);

            DB::commit();
            $paystack = (new Paystack())->initialize([
                'amount' => $amount * 100, //in kobo
                'email' => auth()->user()->email, 
                'reference' => $reference,
                'currency' => 'NGN',
                'callback_url' => route('user'),
            ]);

            //dd($paystack);

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
            
        }catch(Exception $error) {
            DB::rollback();
            return response()->json([
                'status' => 0, 
                'info' => 'An error occured. Refresh the page and try again.'
            ]);
        }        
    }

}
