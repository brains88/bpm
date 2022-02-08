<?php


namespace App\Http\Controllers;
//dd(password_hash('12034', PASSWORD_DEFAULT));
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
     * Get subdomain value
     * e.g., admin or user
     */
    protected $subdomain = '';

    /**
     * API Request timeout
     * 180 seconds or 3Minutes
     */
    public static $timeout = 180;

    public function __construct()
    {
        $this->subdomain = explode('.', request()->getHost())[0] ?? '';
        // $visitor = Visitor::lookup();
        // dd($visitor);
        //echo gettype(geoip());
    }
    
}