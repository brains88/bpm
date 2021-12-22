<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
<<<<<<< HEAD

    /**
     * A user may have a profile
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
=======
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
}
