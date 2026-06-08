<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model
{
    use HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'title',
        'meta_description',
        'meta_keywords',
        'og_image',
        'status',
        'order',
        'slider_id',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function slider(): BelongsTo
    {
        return $this->belongsTo(Slider::class);
    }

    public function sections(): BelongsToMany
    {
        return $this->belongsToMany(Section::class, 'page_section')
            ->withPivot('order')
            ->withTimestamps()
            ->orderByPivot('order');
    }

    public function activeSections(): BelongsToMany
    {
        return $this->sections()->where('sections.status', 'active');
    }
}
