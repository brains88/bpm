<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
<<<<<<< HEAD

    /**
     * Plans duration before expiry
     */
    public static $durations = [
        'weekly' => '7days', 
        'daily' => '24hours', 
        'monthly' => '30days', 
        'yearly' => '360days',
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
    ];
=======
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
}
