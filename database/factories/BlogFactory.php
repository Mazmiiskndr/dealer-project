<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{
    Blog,
    Tag,
    BlogCategory
};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    protected $model = Blog::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(6);
        $tags = Tag::inRandomOrder()->take(3)->pluck('name')->toArray();
        return [
            'id' => $this->faker->uuid,
            'category_id' => BlogCategory::factory(),
            'title' => $title,
            'slug' => str()->slug($title),
            'summary' => $this->faker->paragraph,
            'content' => $this->faker->paragraphs(5, true),
            'tags' => json_encode($tags),
            'thumbnail_image' => $this->faker->imageUrl(800, 600, 'blogs', true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
