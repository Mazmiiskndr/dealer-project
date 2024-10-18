<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UseUuid as Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories';
    protected $guarded = [];

    protected $fillable = [
        'id',
        'slug',
        'name',
        'description'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    protected static function booted()
    {
        static::creating(function ($productCategory) {
            $productCategory->slug = str()->slug($productCategory->name);
        });
    }
}
