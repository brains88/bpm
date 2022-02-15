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
        'weekly' => 7 * 24, //7days * 24hours
        'quaterly' => 120 * 24, //120days * 24hours
        'monthly' => 30 * 24, //30days * 24hours
        'yearly' => 360 * 24, //360days * 24hours
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
     * A membership is listed in a particular currency
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
