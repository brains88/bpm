<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Helpers\Paystack;
use App\Models\{Subscription, Plan, Payment};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
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
            $reference = \Str::uuid();

            DB::beginTransaction();
            Subscription::create([
                'duration' => Plan::$durations[$plan->duration],
                'user_id' => auth()->user()->id,
                'reference' => $reference,
                'plan_id' => $plan->id ?? 0,
                'status' => 'initialized',
                'amount' => $amount,
                'currency_id' => $plan->currency->id
            ]);

            Payment::create([
                'reference' => $reference,
                'amount' => $amount,
                'type' => 'subscription',
                'status' => 'initialized',
                'currency_id' => $plan->currency->id,
                'user_id' => auth()->user()->id,
            ]);

            DB::commit();
            $paystack = (new Paystack())->initialize([
                'amount' => $amount * 100, //in kobo
                'email' => auth()->user()->email, 
                'reference' => $reference,
                'currency' => 'NGN',
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

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function verify() {
        $reference = request('reference');
        if(!$reference) {
            return [
                'status' => 0,
                'info' => 'Invalid payment verification'
            ];
        }

        DB::beginTransaction();
        $payment = Payment::where(['reference' => $reference])->first();
        if (empty($payment)) {
            return [
                'status' => 0,
                'info' => 'Invalid payment transaction'
            ];
        }elseif (strtolower($payment->status) === 'paid') {
            return [
                'status' => 1,
                'info' => 'Payment already verified.'
            ];
        }

        try {
            $verify = (new Paystack())->verify($reference);
            if ($verify) {
                if ('success' === $verify->data->status && 'NGN' === strtoupper($verify->data->currency) && $verify->data->customer->email === auth()->user()->email && ((int)$verify->data->amount/100) === (int)$payment->amount) {

                    $payment->status = 'paid';
                    $payment->update();
                    $subscription = Subscription::where(['reference' => $reference, 'user_id' => auth()->user()->id])->first();
                    $subscription->subscribed = Carbon::now();
                    $subscription->expiry = Carbon::now()->addDays($subscription->duration);
                    $subscription->update();
                    DB::commit();

                    return [
                        'status' => 1,
                        'info' => 'Transaction successfull.'
                    ];
                }
            }

            return [
                'status' => 0,
                'info' => 'Payment verification failed. Refresh you page.'
            ];
        } catch (Exception $error) {
            DB::rollback();
            return [
                'status' => 0,
                'info' => 'Unknown error. Try again.'
            ];
        }

            
            
    }
}
