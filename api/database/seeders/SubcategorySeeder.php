<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories =[
            ['name' => 'ENT', 'category_id' => '1'],
            ['name' => 'PLASTIC AND RECONSTRUCTIVE SURGERY', 'category_id' => '1'],
            ['name' => 'OPHTHALMOLOGY', 'category_id' => '1'],
            ['name' => 'NEUROLOGY', 'category_id' => '1'],
            ['name' => 'CARDIOLOGY', 'category_id' => '1'],
            ['name' => 'ONCOLOGY', 'category_id' => '1'],
            ['name' => 'UROLOGY AND GYNECOLOGY', 'category_id' => '1'],
            ['name' => 'DENTAL', 'category_id' => '1'],

            ['name' => 'HISTOLOGY EQUIPMENT', 'category_id' => '2'],
            ['name' => 'DIGITAL PATHOLOGY', 'category_id' => '2'],
            ['name' => 'CLINIC MICROSCOPE', 'category_id' => '2'],
            ['name' => 'HISTOLOGY CONSUMABLES', 'category_id' => '2'],
            ['name' => 'IHC , ISH , FISH', 'category_id' => '2']
        ];

        foreach($subcategories as $sub) {
            Subcategory::create($sub);
        }

    }
}
