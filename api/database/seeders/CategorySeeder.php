<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            ['name' => 'Medical solutions'],
            ['name' => 'Laboratory solutions'],
            ['name' => 'Geometrical solutions']
        ];

        foreach ($category as $cat) {
            Category::create($cat);
        }

        $categoryTranslations = [
            ['category_id' => '1', 'language' => 'en', 'name' => 'Medical solutions'],
            ['category_id' => '1', 'language' => 'am', 'name' => 'Բժշկական լուծումներ'],

            ['category_id' => '2', 'language' => 'en', 'name' => 'Laboratory solutions'],
            ['category_id' => '2', 'language' => 'am', 'name' => 'Լաբորատոր լուծումներ'],

            ['category_id' => '3', 'language' => 'en', 'name' => 'Geometrical solutions'],
            ['category_id' => '3', 'language' => 'am', 'name' => 'Երկրաչափական լուծումներ'],
        ];

        foreach ($categoryTranslations as $cat) {
            CategoryTranslations::create($cat);
        }

    }
}
