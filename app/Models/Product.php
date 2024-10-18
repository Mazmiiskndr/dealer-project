<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UseUuid as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'description', // Mengganti "content" dengan "description"
        'tags',
        'thumbnail_image', // Thumbnail utama
        'price',
        'installment',
        'engine_type',
        'engine_capacity',
        'frame_type',
        'dimension',
        'fuel_capacity',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

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
