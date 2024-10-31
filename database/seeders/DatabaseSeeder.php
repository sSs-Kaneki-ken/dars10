<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Madiyor Shodiev',
            'email' => 'admin@gmail.com',
        ]);

        Category::create(['name' => 'Web Programming']);
        Category::create(['name' => 'Data Science']);
        Category::create(['name' => 'Mobile Development']);
        Category::create(['name' => 'DevOps']);
        Category::create(['name' => 'Game Development']);

    }
}
