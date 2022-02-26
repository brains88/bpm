<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;

    /**
     * Advert types.
     *
     * @var []
     */
    public static $status = [
        'expired', 
        'active',
        'dormant', 
        'paused',
        'initialized',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'started', 
        'banner',
        'credit_id',
        'description',
        'link',
        'expiry',
        'status', 
        'reference',
        'paused_at',
        'clicks',
    ];

    /**
     * An advert is posted with a particular credit unit
     */
    public function credit()
    {
        return $this->belongsTo(Credit::class);
    }

}
