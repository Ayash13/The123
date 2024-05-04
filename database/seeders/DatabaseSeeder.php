<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Todo;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'is_admin' => true
        ]);
        User::factory()->create([
            'name' => 'Muhammad Ayash Al-fatih',
            'email' => 'm.ayashal.f@gmail.com',
            'is_admin' => false
        ]);

        User::factory(100)->create();

        User::all()->each(function ($user) {
            $categories = Category::factory(5)->create(['user_id' => $user->id]);

            $categories->each(function ($category) use ($user) {
                Todo::factory(2)->create([
                    'user_id' => $user->id,
                    'category_id' => $category->id
                ]);
            });
        });
    }
}
