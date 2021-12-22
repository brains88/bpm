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
<<<<<<< HEAD
        'rent' => 'for rent', 
        'auction' => 'auction',
        'sale' => 'for sale', 
        'lease' => 'for lease', 
        'sold' => 'sold',
=======
        'To Rent', 
        'For Sale', 
        'For Lease', 
        'Sold off',
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
<<<<<<< HEAD
        'country_id',
        'state_id',
        'address',
        'city',
        'action',
        'category_id',
        'measurement',
        'user_id',
        'additional',
        'reference',
        'price',
=======
        'name',
        'email',
        'password',
        'phone',
        'type',
        'status',
        'role'
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
    ];

    /**
     * Property conditions.
     *
     * @var string[]
     */
    public static $conditions = [
<<<<<<< HEAD
        'furnished', 
        'unfurnished', 
        'newly built',
        'old', 
=======
        'Furnished', 
        'Not furnished', 
        'Newly Built',
        'Partly Furnished', 
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
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
     * A residential property has a house type
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
