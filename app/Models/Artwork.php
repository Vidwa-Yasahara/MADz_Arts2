<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $fillable = [
        'title',
        'artist',
        'price',
        'size',
        'year',
        'image',
        'description',
        'stock',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where('title', 'like', "%{$term}%")
            ->orWhere('artist', 'like', "%{$term}%")
            ->orWhere('description', 'like', "%{$term}%");
    }
}

