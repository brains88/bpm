<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    /**
     * Plans duration before expiry
     */
    public static $durations = [
        'weekly' => 7, //7days
        'quaterly' => 120, //120days
        'monthly' => 30, //30days
        'yearly' => 360, //360days
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price', 
        'duration', 
        'name', 
        'listing', 
        'details',
        'currency_id',
    ];

    /**
     * Membership types
     *
     * @var array
     */
    public static $names = [
        'Individual', 
        'Corporate', 
        'Enterprise',
    ];

    /**
     * A membership is listed in a particular currency
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
