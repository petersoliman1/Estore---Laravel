<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'image',
        'sub_image',
        'old_price',
        'current_price',
        'status',
        'amount',
        'category_id'
    ];

    // ===================== Begin Relationship =====================

    /**
     * Get the product that owns the category.
     * Relationship Below.
     */
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the product for the blog comment.
     * Relationship Below.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // ======================= End Relationship =======================
}
