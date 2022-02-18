<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'service_id',
        'user_id',
        'description',
        'price',
        'image',
        'status',
    ];

    /**
     * A gig is created with a particular service
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
