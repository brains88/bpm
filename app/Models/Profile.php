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
     * To deserialize it from JSON into a PHP array
     */
    protected $casts = [
        'skills' => 'array',
        'roles' => 'array',
    ];

    /**
     * Profile roles.
     *
     * @var []
     */
    public static $roles = [
        'ats' => 'Artisan Worker',
        'bmd' => 'Building Materials Dealer',
        'red' => 'Real Estate Developer', 
        'rea' => 'Real Estate Agent',
    ];

    /**
     * A user may have a profile
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
