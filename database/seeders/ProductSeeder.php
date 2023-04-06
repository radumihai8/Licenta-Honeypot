<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'iPhone 14 Pro Clear Case',
                'slug' => 'iphone14p-clear',
                'description' => 'Clear case for iPhone 14 Pro',
                'category_id' => Category::where('slug', 'iphone14p')->first()->id,
                'image' => 'clear.jpg',
                'price' => 10.00,
                'featured' => true,
                'views' => 50,
                'sales' => 20,
                'rating' => 5,
            ],
            [
                'name' => 'iPhone 14 Pro Max Clear Case',
                'slug' => 'iphone14pm-clear',
                'description' => 'Clear case for iPhone 14 Pro Max',
                'category_id' => Category::where('slug', 'iphone14pm')->first()->id,
                'image' => 'clear.jpg',
                'price' => 10.00,
                'featured' => true,
                'views' => 50,
                'sales' => 20,
                'rating' => 4,
            ],
            [
                'name' => 'iPhone 14 Clear Case',
                'slug' => 'iphone14-clear',
                'description' => 'Clear case for iPhone 14',
                'category_id' => Category::where('slug', 'iphone14')->first()->id,
                'image' => 'clear.jpg',
                'price' => 10.00,
                'featured' => true,
                'views' => 50,
                'sales' => 20,
                'rating' => 5,
            ],
            [
                'name' => 'iPhone 13 Pro Clear Case',
                'slug' => 'iphone13p-clear',
                'description' => 'Clear case for iPhone 13 Pro',
                'category_id' => Category::where('slug', 'iphone13p')->first()->id,
                'image' => 'clear.jpg',
                'price' => 10.00,
                'featured' => true,
                'views' => 50,
                'sales' => 20,
                'rating' => 5,
            ],
            [
                'name' => 'iPhone 13 Pro Max Clear Case',
                'slug' => 'iphone13pm-clear',
                'description' => 'Clear case for iPhone 13 Pro Max',
                'category_id' => Category::where('slug', 'iphone13pm')->first()->id,
                'image' => 'clear.jpg',
                'price' => 10.00,
                'featured' => true,
                'views' => 50,
                'sales' => 20,
                'rating' => 5,
            ],
            [
                'name' => 'iPhone 13 Clear Case',
                'slug' => 'iphone13-clear',
                'description' => 'Clear case for iPhone 13',
                'category_id' => Category::where('slug', 'iphone13')->first()->id,
                'image' => 'clear.jpg',
                'price' => 10.00,
                'featured' => true,
                'views' => 50,
                'sales' => 20,
                'rating' => 5,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
