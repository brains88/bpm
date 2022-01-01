<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

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
    ];

    /**
     * A subscription belongs to a user.
     * An agent, realtor, company etc
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * A subscription belongs to a user.
     * An agent, realtor, company etc
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
