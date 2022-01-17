<?php

namespace App\Http\Controllers\User;
use App\Models\{Subscription, Unit, Payment, Property};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helpers\Paystack;
use \Exception;
use \Carbon\Carbon;


class DashboardController extends Controller
{
    /**
     * Dashboard page view
     */
    public function index()
    {
        $limit = 4;
        $reference = request()->get('reference');
        $properties = Property::latest('created_at')->where(['user_id' => auth()->user()->id])->paginate($limit);
        return view('user.dashboard.index')->with(['properties' => $properties, 'limit' => $limit, 'subscription' => Subscription::where(['user_id' => auth()->user()->id])->first(), 'units' => Unit::all(), 'reference' => $reference, 'verify' => $this->verify($reference)]);
    }

    /**
     * Verify subscription payment transaction
     *
     * @return \Illuminate\Http\Response
     */
    public function verify($reference = '') {
        if(empty($reference)) {
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
            if (empty($verify) || $verify === false) {
                return [
                    'status' => 0,
                    'info' => 'Verification failed.'
                ];
            }

            if ('success' === $verify->data->status && 'NGN' === strtoupper($verify->data->currency) && $verify->data->customer->email === auth()->user()->email && ((int)$verify->data->amount/100) === (int)$payment->amount) {

                $payment->status = 'paid';
                $payment->update();
                $subscription = Subscription::where(['reference' => $reference, 'user_id' => auth()->user()->id])->first();
                $subscription->started = Carbon::now();
                $subscription->expiry = Carbon::now()->addDays($subscription->duration);
                $subscription->update();
                DB::commit();

                return [
                    'status' => 1,
                    'info' => 'Transaction successfull.'
                ];
            }

            $payment->status = 'failed';
            $payment->update();
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
