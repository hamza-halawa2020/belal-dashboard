<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
        ]);
        Category::create([
            'title' => 'Category 1',
            'image' => 'Category 1',
            'status' => 1,
            'created_by' => 1,
        ]);
        Category::create([
            'title' => 'Category 2',
            'image' => 'Category 2',
            'status' => 1,
            'created_by' => 1,
        ]);
    }
}
