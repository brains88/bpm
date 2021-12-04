<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    /**
     * Property actions.
     *
     * @var string[]
     */
    public static $actions = [
        'To Rent', 
        'For Sale', 
        'For Lease', 
        'Sold off',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'type',
        'status',
        'role'
    ];

    /**
     * Property conditions.
     *
     * @var string[]
     */
    public static $conditions = [
        'Furnished', 
        'Unfurnished', 
        'New',
        'Serviced', 
    ];

    /**
     * Property status.
     *
     * @var string[]
     */
    public static $status = [
        'active', 
        'inactive', 
        'suspended',
        'audit', 
        'banned', 
        'rejected', 
    ];

    /**
     * A property belongs to a user who listed it.
     * An agent, realtor, company etc
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A property belongs to a Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * A property is listed in a particular country
     * Nigeria, US, Australia etc
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * A property is listed in a perticular state in a country
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
     * A residential building has a house type
     */
    public function house()
    {
        return $this->belongsTo(House::class);
    }

    /**
     * A property has many images
     */
    public function images()
    {
        return $this->hasMany(Image::class, 'type_id')->take(4);
    }
    
}
