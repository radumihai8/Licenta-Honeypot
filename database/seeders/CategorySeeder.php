<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            'ARCHITECTURE', 'ART', 'RELIGION',
            'BIOGRAPHY & AUTOBIOGRAPHY', 'BODY, MIND & SPIRIT', 'BUSINESS & ECONOMICS',
            'COMICS & GRAPHIC NOVELS', 'COOKING', 'CRAFTS & HOBBIES',
            'POETRY', 'DESIGN', 'POLITICAL SCIENCE', 'DRAMA', 'PSYCHOLOGY', 'EDUCATION',
            'FAMILY & RELATIONSHIPS', 'FICTION', 'SCIENCE',
            'FOREIGN LANGUAGE STUDY', 'SELF-HELP', 'SOCIAL SCIENCE',
            'GARDENING', 'SPORTS & RECREATION', 'HEALTH & FITNESS', 'HISTORY',
            'TECHNOLOGY & ENGINEERING', 'HUMOR', 'TRAVEL',
            'TRUE CRIME', 'JUVENILE NONFICTION', 'YOUNG ADULT FICTION',
            'LANGUAGE ARTS & DISCIPLINES', 'YOUNG ADULT NONFICTION', 'LAW'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => Str::lower($category),
                'slug' => Str::slug(Str::lower($category)),
                'description' => Str::lower($category),
            ]);
        }
    }

}
