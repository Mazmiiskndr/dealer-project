<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UseUuid as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [];

    // TODO: MEMBUAT COLUMNS
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
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    protected static function booted()
    {
        static::creating(function ($product) {
            $product->slug = str()->slug($product->title);
        });

        static::updating(function ($product) {
            if ($product->isDirty('title')) {
                $product->slug = str()->slug($product->title);
            }
        });
    }
}
