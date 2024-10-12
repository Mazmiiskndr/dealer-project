<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UseUuid as Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class BlogCategory extends Model
{
    use HasFactory;
    protected $table = 'blog_categories';
    protected $guarded = [];
    protected $fillable = [
        'id',
        'slug',
        'name',
        'description'
    ];

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class, 'category_id');
    }

    protected static function booted()
    {
        static::creating(function ($category) {
            $category->slug = str()->slug($category->name);
        });
    }
}
