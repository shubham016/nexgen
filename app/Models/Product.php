<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'category_id', 'description', 'price', 'old_price',
        'stock', 'sku', 'image', 'rating', 'badge',
        'status', 'is_featured', 'features',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'price'       => 'decimal:2',
        'old_price'   => 'decimal:2',
        'rating'      => 'decimal:1',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function badgeClass(): string
    {
        return match($this->badge) {
            'hot'  => 'pbh',
            'new'  => 'pbn',
            'sale' => 'pbsl',
            default => '',
        };
    }

    public function imageUrl(): string
    {
        if (!$this->image) {
            return asset('images/camera/4.jpg.jpeg');
        }
        // stored via Storage::disk('public')
        return asset('storage/' . $this->image);
    }

    public function formattedPrice(): string
    {
        return 'Rs ' . number_format($this->price, 0);
    }

    public function formattedOldPrice(): ?string
    {
        return $this->old_price ? 'Rs ' . number_format($this->old_price, 0) : null;
    }
}
