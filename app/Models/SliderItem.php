<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SliderItem extends Model
{
    protected $fillable = [
        'slider_id',
        'image',
        'heading',
        'subheading',
        'button_text',
        'button_url',
        'button_target',
        'order',
        'status',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    public function slider(): BelongsTo
    {
        return $this->belongsTo(Slider::class);
    }
}
