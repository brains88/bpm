<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

            /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'credit_id',
        'duration',
        'started',
        'expiry',
        'promoted',
        'status',
        'user_id',
        'property_id',
        'material_id',
        'artisan_id',
    ];

    /**
     * A property may belong to a property listed
     */
    // public function property()
    // {
    //     return $this->belongsTo(Property::class);
    // }
}