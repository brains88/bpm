<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'plan_id',
        'payment_id',
        'reference',
        'status',
        'started',
        'duration',
        'user_id',
        'expiry',
        'renewals',
        'amount',
        'currency_id'
    ];

    /**
     * All Subscription status
     *
     * @var string[]
     */
    public static $status = [
        'active', 
        'suspended', 
        'paused', 
        'cancelled', 
        'error',
        'expired',
        'renewed',
        'initialized'
    ];

    /**
     * A subscription belongs to a user.
     * An agent, realtor, company etc
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A subscription belongs to a user.
     * An agent, realtor, company etc
     */
    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
}
