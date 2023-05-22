<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use GuzzleHttp\Client;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $client = new Client();
        $categories = DB::table('categories')->get();

        foreach ($categories as $category) {
            for ($i = 0; $i < 6; $i++) {  // 6 pages for each category, 0-indexed
                try {
                    $response = $client->request('GET', 'https://www.googleapis.com/books/v1/volumes', [
                        'query' => [
                            'q' => 'subject:' . $category->name,
                            'maxResults' => 40,
                            'startIndex' => $i * 40,  // next page of results
                        ]
                    ]);

                    $books = json_decode($response->getBody(), true);

                    foreach ($books['items'] as $book) {
                        $volumeInfo = $book['volumeInfo'];

                        try {
                            DB::table('products')->insert([
                                'title' => $volumeInfo['title'],
                                'subtitle' => $volumeInfo['subtitle'] ?? null,
                                'slug' => Str::slug($volumeInfo['title']),
                                'description' => $volumeInfo['description'] ?? null,
                                'category_id' => $category->id,
                                'image' => $volumeInfo['imageLinks']['thumbnail'] ?? null,
                                'page_count' => $volumeInfo['pageCount'] ?? null,
                                'publisher' => $volumeInfo['publisher'] ?? null,
                                'published_date' => $volumeInfo['publishedDate'] ?? null,
                                'author_list' => implode(', ', $volumeInfo['authors'] ?? []),
                                'isbn' => $volumeInfo['industryIdentifiers'][0]['identifier'] ?? null,
                                'isbn13' => $volumeInfo['industryIdentifiers'][1]['identifier'] ?? null,
                                'price' => $book['saleInfo']['listPrice']['amount'] ?? rand(20, 180),
                                'featured' => rand(0, 1),
                                'views' => rand(1, 1000),
                                'sales' => rand(1, 500),
                                'rating' => round($this->randomFloat(3, 5), 2),
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);
                        } catch (\Exception $e) {
                            continue;
                        }
                    }

                } catch (\Exception $e) {
                    print("Error: " . $e->getMessage() . "\n");
                    print($category->name . "\n");

                    continue;
                }
            }
        }

    }

    private function randomFloat($min = 0, $max = 1)
    {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }
}
