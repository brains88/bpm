<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'material_id',
        'property_id',
        'link',
        'type',
        'reference'
    ];

    /**
     * An image belongs to a property
     */
    public function property()
    {
        return $this->belongsTo(Property::class)->take(4);
    }

    /**
     * An image belongs to a material
     */
    public function material()
    {
        return $this->belongsTo(Material::class)->take(2);
    }
}
