<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    BlogCategory,
    Blog,
    User,
    Tag
};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        BlogCategory::factory(5)->create();
        Tag::factory(10)->create();
        Blog::factory(20)->create();
        User::factory(10)->create();
        $this->call([
            UserSeeder::class,
        ]);
    }
}
