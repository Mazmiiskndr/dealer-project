<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    BlogCategory,
    Blog,
    User,
    Tag,
    ProductCategory,
    Product,
    ProductImage
};
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Blog Related Data
        BlogCategory::factory(5)->create();
        Tag::factory(10)->create();
        Blog::factory(20)->create();
        User::factory(10)->create();

        // Seed Product Related Data
        ProductCategory::factory(5)
            ->has(
                Product::factory(10)
                    ->has(ProductImage::factory(3), 'images')
            )
            ->create();


        $this->call([
            UserSeeder::class,
        ]);
    }
}
