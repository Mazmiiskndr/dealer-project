<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UseUuid as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $guarded = [];
    protected $fillable = [
        'id',
        'category_id',
        'title',
        'slug',
        'summary',
        'content',
        'tags',
        'images',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    protected static function booted()
    {
        static::creating(function ($blog) {
            $blog->slug = str()->slug($blog->title);
        });

        static::updating(function ($blog) {
            if ($blog->isDirty('title')) {
                $blog->slug = str()->slug($blog->title);
            }
        });
    }
}
