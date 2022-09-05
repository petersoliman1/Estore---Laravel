<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment','status', 'product_id', 'user_id'
    ];

    /**
     * Get the user for the blog comment.
     * Relationship Below.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product for the blog comment.
     * Relationship Below.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
