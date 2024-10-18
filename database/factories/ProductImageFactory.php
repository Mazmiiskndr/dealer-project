<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{
    ProductImage,
    Product
};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    protected $model = ProductImage::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->uuid,
            'product_id' => Product::factory(), // Relasi dengan produk
            'image' => $this->faker->imageUrl(640, 480, 'motorcycle'), // Gambar
            'description' => $this->faker->sentence(),
        ];
    }
}
