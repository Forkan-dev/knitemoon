<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Slider extends Model
{
    use HasSlug;

    protected $fillable = [
        'name',
        'identifier',
        'autoplay',
        'autoplay_speed',
        'effect',
        'status',
    ];

    protected $casts = [
        'autoplay'       => 'boolean',
        'autoplay_speed' => 'integer',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('identifier')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function items(): HasMany
    {
        return $this->hasMany(SliderItem::class)->orderBy('order');
    }

    public function activeItems(): HasMany
    {
        return $this->hasMany(SliderItem::class)
            ->where('status', 'active')
            ->orderBy('order');
    }

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}
