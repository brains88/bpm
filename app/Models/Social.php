<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'facebook',
        'linkedin',
        'twitter',
        'user_id',
        'instagram',
        'whatsapp',
        'youtube',
        'reference',
    ];
}
