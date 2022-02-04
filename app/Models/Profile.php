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
     * Profile roles.
     *
     * @var []
     */
    public static $roles = [
        'artisans' => [
            'ats' => 'Artisan Worker'
        ],
        'agents' => [
            'red' => 'Real Estate Developer', 
            'rea' => 'Real Estate Agent',
        ],
        'dealers' => [
            'bmd' => 'Building Materials Dealer',
        ]
    ];

    /**
     * A user may have a profile
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
