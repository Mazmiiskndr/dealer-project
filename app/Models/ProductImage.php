<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UseUuid as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';
    protected $guarded = [];

    protected $fillable = [
        'id',
        'product_id',
        'image',
        'description',
    ];

    /**
     * Relasi dengan produk.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
