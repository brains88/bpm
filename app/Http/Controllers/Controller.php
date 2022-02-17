<?php


namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

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
        Request::macro('subdomain', function () {
            return current(explode('.', $this->getHost()));
        });
        //dd(request()->subdomain());
        //dd(\App\Models\Profile::all());
        // $visitor = Visitor::lookup();
        // dd($visitor);
        //echo gettype(geoip());
    }
    
}