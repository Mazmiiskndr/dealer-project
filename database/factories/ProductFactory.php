<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{
    Product,
    ProductCategory,
    Tag
};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->words(3, true); // Judul produk
        $tags = Tag::inRandomOrder()->take(3)->pluck('name')->toArray();
        return [
            'id' => $this->faker->unique()->uuid,
            'category_id' => ProductCategory::factory(), // Relasi dengan kategori
            'title' => ucwords($title),
            'slug' => str()->slug($title),
            'summary' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(5),
            'tags' => json_encode($tags),
            'thumbnail_image' => $this->faker->imageUrl(640, 480, 'motorcycle'), // Thumbnail
            'price' => $this->faker->randomFloat(2, 10000000, 50000000),
            'installment' => $this->faker->randomFloat(2, 500000, 3000000),
            'engine_type' => $this->faker->randomElement(['SOHC', 'DOHC', 'V-Twin']),
            'engine_capacity' => $this->faker->numberBetween(110, 250),
            'frame_type' => $this->faker->word(),
            'dimension' => $this->faker->randomElement(['2000x700x1100 mm', '1900x600x1050 mm']),
            'fuel_capacity' => $this->faker->randomElement(['5 L', '8 L']),
        ];
    }
}
