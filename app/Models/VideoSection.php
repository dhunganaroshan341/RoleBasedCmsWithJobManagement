<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoSection extends Model
{
    protected $fillable = ['section', 'video_urls'];

    protected $casts = [
        'video_urls' => 'array',
    ];
}
