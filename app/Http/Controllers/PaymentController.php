<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Paystack;

class PaymentController extends Controller
{

    /**
     * initialize and Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function initialize()
    {
        $data = request()->only(['amount', '']);
        $validator = Validator::make($data, [
            'amount' => ['required', 'integer'],
            'plan' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        try {
            $plan = Plan::find($data['plan']);
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
            $reference = Paystack::genTranxRef();

            DB::beginTransaction();
            Subscription::create([
                'duration' => Plan::$durations[$plan->duration],
                'user_id' => auth()->user()->id,
                'reference' => $reference,
                'plan_id' => $plan->id ?? 0,
                'status' => 'initialized',
                'amount' => $amount,
            ]);

            Payment::create([
                'reference' => $reference,
                'amount' => $amount,
                'type' => 'subscription',
                'status' => 'initialized',
                'currency' => $plan->currency->id,
            ]);

            DB::commit();
            $redirect = Paystack::getAuthorizationUrl()->redirectNow();
            var_dump($redirect);
            throw new Exception("Error Processing Request", 1);
            
            return response()->json([
                'status' => 0, 
                'info' => 'Payment initialized. Please wait . . .',
                'redirect' => 
            ]);
            
        }catch(Exception $error) {
            DB::rollback();
            return response()->json([
                'status' => 0, 
                'info' => 'An error occured. Refresh the page and try again.'
            ]);
        }        
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Best Property Market Membership."
        ]);
   
        Session::flash('success', 'Payment successful!');
           
        return back();
    }
}
