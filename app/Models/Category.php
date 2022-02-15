<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'type',
    ];

     /**
     * Category types
     *
     * @var string[]
     */
    public static $types = [
        'news',
        'property',
        'blog',
    ];

    /**
     * A property category may have many properties
     */
    public function properties()
    {
        return $this->hasMany(Property::class, 'category_id');
    }
}
