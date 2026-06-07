<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Section extends Model
{
    use HasSlug;

    protected $fillable = [
        'name',
        'identifier',
        'description',
        'background_color',
        'css_class',
        'status',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('identifier')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function pages(): BelongsToMany
    {
        return $this->belongsToMany(Page::class, 'page_section')
            ->withPivot('order')
            ->withTimestamps();
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class)->orderBy('order');
    }

    public function publishedPosts(): HasMany
    {
        return $this->hasMany(Post::class)
            ->where('status', 'published')
            ->where(fn ($q) => $q->whereNull('published_at')->orWhere('published_at', '<=', now()))
            ->orderBy('order');
    }
}
