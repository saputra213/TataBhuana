<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function getFormattedPublishedDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('d M Y') : null;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

