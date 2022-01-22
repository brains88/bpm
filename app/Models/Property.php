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
        'rent' => 'for rent', 
        'auction' => 'for auction',
        'sale' => 'for sale', 
        'lease' => 'for lease', 
        'sold' => 'sold off',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'country_id',
        'state',
        'address',
        'currency_id',
        'city',
        'action',
        'category_id',
        'measurement',
        'user_id',
        'additional',
        'reference',
        'price',
    ];

    /**
     * Property conditions.
     *
     * @var string[]
     */
    public static $conditions = [
        'furnished', 
        'unfurnished', 
        'newly built',
        'old', 
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
     * A property is listed in a particular currency
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * A residential property has a house type
     */
    public function house()
    {
        return $this->belongsTo(House::class);
    }

    /**
     * A property may have many images
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * A property may have been promoted
     */ 
    public function promoted()
    {
        return $this->hasOne(Promotion::class);
    }
    
}
