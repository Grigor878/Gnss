<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use App\Models\SubcategoryTranslations;
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

        $subcategoryTranslations =[
            ['subcategory_id' => '1', 'language' => 'en', 'name' => 'ENT'],
            ['subcategory_id' => '1', 'language' => 'am', 'name' => 'ԼՕՌ'],

            ['subcategory_id' => '2', 'language' => 'en', 'name' => 'PLASTIC AND RECONSTRUCTIVE SURGERY'],
            ['subcategory_id' => '2', 'language' => 'am', 'name' => 'ՊԼԱՍՏԻԿ ԵՎ ՎԵՐԱԿԱՆԳՆՈՂԱԿԱՆ ՎԻՐԱԲՈՒԺՈՒԹՅՈՒՆ'],

            ['subcategory_id' => '3', 'language' => 'en', 'name' => 'OPHTHALMOLOGY'],
            ['subcategory_id' => '3', 'language' => 'am', 'name' => 'ԱԿՆԱԲՈՒԺԱԿԱՆ ԳՈՐԾԻՔՆԵՐ'],

            ['subcategory_id' => '4', 'language' => 'en', 'name' => 'NEUROLOGY'],
            ['subcategory_id' => '4', 'language' => 'am', 'name' => 'ՆՅԱՐԴԱԲԱՆՈՒԹՅՈՒՆ'],

            ['subcategory_id' => '5', 'language' => 'en', 'name' => 'CARDIOLOGY'],
            ['subcategory_id' => '5', 'language' => 'am', 'name' => 'ՍՐՏԱԲԱՆՈՒԹՅՈՒՆ'],

            ['subcategory_id' => '6', 'language' => 'en', 'name' => 'ONCOLOGY'],
            ['subcategory_id' => '6', 'language' => 'am', 'name' => 'ՈՒՌՈՒՑՔԱԲԱՆՈՒԹՅՈՒՆ'],

            ['subcategory_id' => '8', 'language' => 'en', 'name' => 'UROLOGY AND GYNECOLOGY'],
            ['subcategory_id' => '8', 'language' => 'am', 'name' => 'ՈՒՐՈԼՈԳԻԱ ԵՎ ԳԻՆԵԿՈԼՈԳԻԱ'],

            ['subcategory_id' => '9', 'language' => 'en', 'name' => 'DENTAL'],
            ['subcategory_id' => '9', 'language' => 'am', 'name' => 'ԱՏԱՄՆԱԲՈՒԺՈՒԹՅՈՒՆ'],


            ['subcategory_id' => '10', 'language' => 'en', 'name' => 'HISTOLOGY EQUIPMENT'],
            ['subcategory_id' => '10', 'language' => 'am', 'name' => 'ՀՅՈՒՍՎԱԾՔԱԲԱՆԱԿԱՆ ՍԱՐՔԵՐ'],

            ['subcategory_id' => '11', 'language' => 'en', 'name' => 'DIGITAL PATHOLOGY'],
            ['subcategory_id' => '11', 'language' => 'am', 'name' => 'ԹՎԱՅԻՆ ՊԱԹՈԼՈԳԻԱ'],

            ['subcategory_id' => '12', 'language' => 'en', 'name' => 'CLINIC MICROSCOPE'],
            ['subcategory_id' => '12', 'language' => 'am', 'name' => 'ԿԼԻՆԻԿԱԿԱՆ ՄԱՆՐԱԴԻՏԱԿՆԵՐ'],

            ['subcategory_id' => '13', 'language' => 'en', 'name' => 'HISTOLOGY CONSUMABLES'],
            ['subcategory_id' => '13', 'language' => 'am', 'name' => 'ՕԳՏԱԳՈՐԾՎՈՂ ՆՅՈՒԹԵՐ'],

            ['subcategory_id' => '14', 'language' => 'en', 'name' => 'IHC , ISH , FISH'],
            ['subcategory_id' => '14', 'language' => 'am', 'name' => 'ԱՎՏՈՄԱՏԱՑՎԱԾ ԻՄՈՒՆԱՀԻՍԹՈԼՈԳԻԱ'],
        ];

        SubcategoryTranslations::insert($subcategoryTranslations);

    }
}
