<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title_en', 'title_ar', 'description_en', 'description_ar', 'image', 'status'
    ];

    /**
     * Get the Crategory for the blog Product.
     * Relationship Below.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
