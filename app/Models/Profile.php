<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * Profile designations.
     *
     * @var []
     */
    public static $designations = ['corporate', 'individual'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'image',
        'description',
        'phone',
        'skills',
        'address',
        'country_id',
        'qualifications',
        'idnumber',
        'status',
        'roles',
        'rcnumber',
        'iscertified',
        'reference',
        'designation',
        'user_id',
        'state',
        'city',
    ];


    /**
     * To deserialize it from JSON into a PHP array
     */
    protected $casts = [];

    /**
     * Profile roles.
     *
     * @var []
     */
    public static $roles = [
        'ats' => ['name' => 'Artisan Worker', 'type' => 'artisan'],
        'bmd' => ['name' => 'Building Materials Dealer', 'type' => 'dealer'],
        'red' => ['name' => 'Real Estate Developer', 'type' => 'agent'], 
        'rea' => ['name' => 'Real Estate Agent', 'type' => 'agent'],
        'prd' => ['name' => 'Property Developer', 'type' => 'agent'],
    ];

    /**
     * A user may have a profile
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
