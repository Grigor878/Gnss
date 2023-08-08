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
        $category = [
            ['name' => 'Medical solutions'],
            ['name' => 'Laboratory solutions'],
            ['name' => 'Geometrical solutions']
        ];

        foreach ($category as $cat) {
            Category::create($cat);
        }
    }
}
