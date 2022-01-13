<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'transaction_id',
        'amount',
        'reference',
        'type',
        'status',
        'user_id',
        'currency_id'
    ];

    /**
     * All payment status
     *
     * @var string[]
     */
    public static $status = [
        'paid', 
        'initialized', 
        'failed', 
        'cancelled', 
        'error'
    ];

    /**
     * All payment types
     *
     * @var string[]
     */
    public static $types = [
        'advert', 
        'subscription',
    ];

    /**
     * A payment is made in a particular currency
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
