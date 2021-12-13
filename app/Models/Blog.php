<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    /**
     * A blog post belongs to a category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'user_id', 
        'published', 
        'image', 
        'category_id', 
        'description', 
        'views',
        'reference',
    ];

    /**
     * Blog published status
     */
    public static $publish = ['yes' => 1, 'no' => 0];
}
