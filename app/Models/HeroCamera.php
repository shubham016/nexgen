<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HeroCamera extends Model
{
    protected $fillable = ['label', 'video_path', 'sort_order', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public function videoUrl(): string
    {
        if (!$this->video_path) {
            return asset('videos/cctv_footage.mp4');
        }
        return asset('storage/' . $this->video_path);
    }
}
