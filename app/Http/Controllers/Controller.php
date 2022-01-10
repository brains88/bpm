<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Stevebauman\Location\Facades\Location;
use App\Helpers\Visitor;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * API Request timeout
     * 180 seconds or 3Minutes
     */
    public static $timeout = 180;

    public function __construct()
    {
        // $visitor = Visitor::lookup();
        // dd($visitor);
        //echo gettype(geoip());
    }

    /**
     * Send SMS with Kudisms api
     */
    public static function kudisms($sms = [])
    {
        try {
            $mobiles = implode(',', $sms['mobiles']);
            $data = ['username' => env('KUDISMS_API_USERNAME'), 'password' => env('KUDISMS_API_PASSWORD'), 'sender' => env('APP_NAME'), 'message' => $sms['message'], 'mobiles' => $mobiles];
            $fields = http_build_query($data);
            
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, env('KUDISMS_API_URL'));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);
            $result = json_decode(curl_exec($curl));

            dd($result);

            if(isset($result->status) && strtoupper($result->status) == 'OK'){
                return response()->json([
                    'status' => 1,
                    'info' => 'Message sent successfully',
                    'price' => $result->price
                ]);
            }else if(isset($result->error)){
                return response()->json([
                    'status' => 0,
                    'info' => $result->error,
                ]);
            }else{
                return response()->json([
                    'status' => 0,
                    'info' => 'Unknown error. Try again later',
                ]);
            }
        } catch (Exception $error) {
            return response()->json([
                'status' => 0,
                'info' => 'Fatal error. Try again later',
            ]);
        }
            
     }
}