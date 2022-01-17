<?php

namespace App\Http\Controllers\User;
use App\Models\{Unit, Payment, Credit};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Helpers\Paystack;
use \Exception;
use Validator;


class CreditsController extends Controller
{
	/**
     * User credits list view
     */
    public function index()
    {
        $reference = request()->get('reference');
        return view('user.credits.index')->with(['credits' => Credit::where(['user_id' => auth()->user()->id])->latest('created_at')->paginate(12), 'units' => Unit::all(), 'verify' => $this->verify($reference), 'reference' => $reference]);
    }

    /**
     * Buy ads credit
     */
    public function buy()
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
            $reference = \Str::uuid();

            DB::beginTransaction();
            $payment = Payment::create([
                'reference' => $reference,
                'amount' => $amount,
                'type' => 'advert',
                'status' => 'initialized',
                'user_id' => auth()->user()->id,
            ]);

            Credit::create([
                'price' => $amount,
                'payment_id' => $payment->id,
                'duration' => $unit->duration,
                'unit_id' => $unit->id,
                'units' => $unit->units,
                'reference' => $reference,
                'status' => 'initialized',
                'user_id' => auth()->user()->id,
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

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function verify($reference = '') {
        if(empty($reference)) {
            return response()->json([
                'status' => 0,
                'info' => 'Invalid payment verification'
            ]);
        }

        DB::beginTransaction();
        $payment = Payment::where(['reference' => $reference])->first();
        if (empty($payment)) {
            return response()->json([
                'status' => 0,
                'info' => 'Invalid payment transaction'
            ]);
        }elseif (strtolower($payment->status) === 'paid') {
            return response()->json([
                'status' => 1,
                'info' => 'Payment already verified.'
            ]);
        }

        try {
            $verify = (new Paystack())->verify($reference);
            if (empty($verify) || $verify === false) {
                return response()->json([
                    'status' => 0,
                    'info' => 'Verification failed.'
                ]);
            }

            if ('success' === strtolower($verify->data->status) && 'NGN' === strtoupper($verify->data->currency) && $verify->data->customer->email === auth()->user()->email && ((int)$verify->data->amount/100) === (int)$payment->amount) {

                $payment->status = 'paid';
                $payment->update();
                $credit = Credit::where(['reference' => $reference, 'user_id' => auth()->user()->id])->first();
                $credit->status = 'paused';
                $credit->update();
                DB::commit();

                return response()->json([
                    'status' => 1,
                    'info' => 'Transaction successfull.'
                ]);
            }

            $payment->status = 'failed';
            $payment->update();
            return response()->json([
                'status' => 0,
                'info' => 'Payment verification failed. Refresh you page.'
            ]);
        } catch (Exception $error) {
            DB::rollback();
            return response()->json([
                'status' => 0,
                'info' => 'Unknown error. Try again.'
            ]);
        }    
            
    }
}
