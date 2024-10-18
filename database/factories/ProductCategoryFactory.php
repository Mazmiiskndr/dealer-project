<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    protected $model = ProductCategory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(2, true); // Nama kategori
        return [
            'id' => $this->faker->unique()->uuid,
            'name' => ucwords($name),
            'slug' => str()->slug($name),
            'description' => $this->faker->sentence(10),
        ];
    }
}
