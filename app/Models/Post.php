<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasSlug;

    protected $fillable = [
        'section_id',
        'title',
        'slug',
        'excerpt',
        'body',
        'image',
        'icon',
        'button_text',
        'button_url',
        'button_target',
        'badge',
        'tag',
        'order',
        'status',
        'published_at',
    ];

    protected $casts = [
        'order'        => 'integer',
        'published_at' => 'datetime',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
}
