<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
    use HasFactory;

    /**
     * Overriding Eloquent table verifies
     */
    protected $table = 'verify';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'phone_token_expiry',
        'email_token_expiry',
        'phone_token',
        'user_id',
        'email_token',
        'email_status',
        'phone_status',
    ];
}
