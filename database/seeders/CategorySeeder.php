<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'iPhone 14 Pro',
                'slug' => 'iphone14p',
                'description' => 'Cases for iPhone 14 Pro',
            ],
            [
                'name' => 'iPhone 14 Pro Max',
                'slug' => 'iphone14pm',
                'description' => 'Cases for iPhone 14 Pro Max',
            ],
            [
                'name' => 'iPhone 14',
                'slug' => 'iphone14',
                'description' => 'Cases for iPhone 14',
            ],
            [
                'name' => 'iPhone 13 Pro',
                'slug' => 'iphone13p',
                'description' => 'Cases for iPhone 13 Pro',
            ],
            [
                'name' => 'iPhone 13 Pro Max',
                'slug' => 'iphone13pm',
                'description' => 'Cases for iPhone 13 Pro Max',
            ],
            [
                'name' => 'iPhone 13',
                'slug' => 'iphone13',
                'description' => 'Cases for iPhone 13',
            ],
            [
                'name' => 'iPhone 12 Pro',
                'slug' => 'iphone12p',
                'description' => 'Cases for iPhone 12 Pro',
            ],
            [
                'name' => 'iPhone 12 Pro Max',
                'slug' => 'iphone12pm',
                'description' => 'Cases for iPhone 12 Pro Max',
            ],
            [
                'name' => 'iPhone 12',
                'slug' => 'iphone12',
                'description' => 'Cases for iPhone 12',
            ],
            // Add more categories as needed
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

    }
}
