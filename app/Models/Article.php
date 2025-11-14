<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'thumbnail', 'excerpt', 'body',
        'is_published', 'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /** Scope: hanya yang published */
    public function scopePublished($q)
    {
        return $q->where('is_published', true);
    }

    /** Route model binding by slug (opsional, berguna kalau mau pakai Article $article di route) */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /** Accessor URL thumbnail (opsional) */
    public function getThumbnailUrlAttribute(): ?string
    {
        return $this->thumbnail ? asset('storage/'.$this->thumbnail) : null;
    }
}
