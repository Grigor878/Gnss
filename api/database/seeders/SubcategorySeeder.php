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
            ['name' => 'IHC, ISH, FISH', 'category_id' => '2']
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

            ['subcategory_id' => '7', 'language' => 'en', 'name' => 'UROLOGY AND GYNECOLOGY'],
            ['subcategory_id' => '7', 'language' => 'am', 'name' => 'ՈՒՐՈԼՈԳԻԱ ԵՎ ԳԻՆԵԿՈԼՈԳԻԱ'],

            ['subcategory_id' => '8', 'language' => 'en', 'name' => 'DENTAL'],
            ['subcategory_id' => '8', 'language' => 'am', 'name' => 'ԱՏԱՄՆԱԲՈՒԺՈՒԹՅՈՒՆ'],


            ['subcategory_id' => '9', 'language' => 'en', 'name' => 'HISTOLOGY EQUIPMENT'],
            ['subcategory_id' => '9', 'language' => 'am', 'name' => 'ՀՅՈՒՍՎԱԾՔԱԲԱՆԱԿԱՆ ՍԱՐՔԵՐ'],

            ['subcategory_id' => '10', 'language' => 'en', 'name' => 'DIGITAL PATHOLOGY'],
            ['subcategory_id' => '10', 'language' => 'am', 'name' => 'ԹՎԱՅԻՆ ՊԱԹՈԼՈԳԻԱ'],

            ['subcategory_id' => '11', 'language' => 'en', 'name' => 'CLINIC MICROSCOPE'],
            ['subcategory_id' => '11', 'language' => 'am', 'name' => 'ԿԼԻՆԻԿԱԿԱՆ ՄԱՆՐԱԴԻՏԱԿՆԵՐ'],

            ['subcategory_id' => '12', 'language' => 'en', 'name' => 'HISTOLOGY CONSUMABLES'],
            ['subcategory_id' => '12', 'language' => 'am', 'name' => 'ՕԳՏԱԳՈՐԾՎՈՂ ՆՅՈՒԹԵՐ'],

            ['subcategory_id' => '13', 'language' => 'en', 'name' => 'IHC, ISH, FISH'],
            ['subcategory_id' => '13', 'language' => 'am', 'name' => 'ԱՎՏՈՄԱՏԱՑՎԱԾ ԻՄՈՒՆԱՀԻՍԹՈԼՈԳԻԱ'],
        ];

        SubcategoryTranslations::insert($subcategoryTranslations);


        $childSubcategories = [
            ['name' => 'Surgical ENT microscopes', 'category_id' => '1', 'parent_id' => '1', 'level' => '2'],
            ['name' => 'ENT Instruments', 'category_id' => '1', 'parent_id' => 1, 'level' => '2'],

            ['name' => 'General Surgery Instruments', 'category_id' => '1', 'parent_id' => '2', 'level' => '2'],
            ['name' => 'Imaging system', 'category_id' => '1', 'parent_id' => '2', 'level' => '2'],
            ['name' => 'Microscopes for plastic and reconstructive surgery', 'category_id' => '1', 'parent_id' => '2', 'level' => '2'],

            ['name' => 'Surgical Ophthalmic Microscopes', 'category_id' => '1', 'parent_id' => '3', 'level' => '2'],
            ['name' => 'TONOMETRY', 'category_id' => '1', 'parent_id' => '3', 'level' => '2'],
            ['name' => 'RETINAL IMAGING', 'category_id' => '1', 'parent_id' => '3', 'level' => '2'],
            ['name' => 'OCT', 'category_id' => '1', 'parent_id' => '3', 'level' => '2'],
            ['name' => 'LASER IMAGING', 'category_id' => '1', 'parent_id' => '3', 'level' => '2'],
            ['name' => 'PERIMETER', 'category_id' => '1', 'parent_id' => '3', 'level' => '2'],
            ['name' => 'INSTRUNENTS FOR OPHTHALMOLOGY', 'category_id' => '1', 'parent_id' => '3', 'level' => '2'],

            ['name' => 'Neurosurgical Microsopes', 'category_id' => '1', 'parent_id' => '4', 'level' => '2'],
            ['name' => 'Neurourgery Instruments', 'category_id' => '1', 'parent_id' => '4', 'level' => '2'],

            ['name' => 'CARDIOVASCULAR INSTRUMENTS', 'category_id' => '1', 'parent_id' => '5', 'level' => '2'],

            ['name' => 'Surgical Microscopes', 'category_id' => '1', 'parent_id' => '6', 'level' => '2'],
            ['name' => 'Scalp cooling system', 'category_id' => '1', 'parent_id' => '6', 'level' => '2'],

            ['name' => 'Surgical Urology Microscopes', 'category_id' => '1', 'parent_id' => '7', 'level' => '2'],
            ['name' => 'Gynecology & Obstetrical Instruments', 'category_id' => '1', 'parent_id' => '7', 'level' => '2'],

            ['name' => 'Dental Microscopes', 'category_id' => '1', 'parent_id' => '8', 'level' => '2'],
            ['name' => 'DENTAL INSTRUMENTS', 'category_id' => '1', 'parent_id' => '8', 'level' => '2'],

            ['name' => 'Tissue Processors', 'category_id' => '2', 'parent_id' => '9', 'level' => '2'],
            ['name' => 'Microtomes', 'category_id' => '2', 'parent_id' => '9', 'level' => '2'],
            ['name' => 'Cryostats', 'category_id' => '2', 'parent_id' => '9', 'level' => '2'],
            ['name' => 'H&E Slide Stainers, Special Stainers & Coverslipper', 'category_id' => '2', 'parent_id' => '9', 'level' => '2'],
            ['name' => 'Specimen Identification Solutions', 'category_id' => '2', 'parent_id' => '9', 'level' => '2'],
            ['name' => 'Embedding Solutions', 'category_id' => '2', 'parent_id' => '9', 'level' => '2'],

            ['name' => 'Scan', 'category_id' => '2', 'parent_id' => '10', 'level' => '2'],
            ['name' => 'Digital Pathology Software', 'category_id' => '2', 'parent_id' => '10', 'level' => '2'],

            ['name' => 'Invested light microscope', 'category_id' => '2', 'parent_id' => '11', 'level' => '2'],
            ['name' => 'Stereo Microscopes', 'category_id' => '2', 'parent_id' => '11', 'level' => '2'],

            ['name' => 'Product', 'category_id' => '2', 'parent_id' => '12', 'level' => '2'],

            ['name' => 'Fully automated Instruments', 'category_id' => '2', 'parent_id' => '13', 'level' => '2'],
        ];


        foreach($childSubcategories as $sub) {
            Subcategory::create($sub);
        }

        $childSubcategoryTranslations =[
            ['subcategory_id' => '14', 'language' => 'en', 'name' => 'Surgical ENT microscopes'],
            ['subcategory_id' => '14', 'language' => 'am', 'name' => 'Վիրաբուժական ԼՕՌ մանրադիտակներ'],

            ['subcategory_id' => '15', 'language' => 'en', 'name' => 'ENT Instruments'],
            ['subcategory_id' => '15', 'language' => 'am', 'name' => 'ԼOՌ Գործիքներ'],


            ['subcategory_id' => '16', 'language' => 'en', 'name' => 'General Surgery Instruments'],
            ['subcategory_id' => '16', 'language' => 'am', 'name' => 'Հիմնական վիրահատական գործիքներ'],

            ['subcategory_id' => '17', 'language' => 'en', 'name' => 'Imaging system'],
            ['subcategory_id' => '17', 'language' => 'am', 'name' => 'Պատկերման համակարգ'],

            ['subcategory_id' => '18', 'language' => 'en', 'name' => 'Microscopes for plastic and reconstructive surgery'],
            ['subcategory_id' => '18', 'language' => 'am', 'name' => 'Մանրադիտակներ պլաստիկ և վերականգնողական վիրաբուժության համար'],


            ['subcategory_id' => '19', 'language' => 'en', 'name' => 'Surgical Ophthalmic Microscopes'],
            ['subcategory_id' => '19', 'language' => 'am', 'name' => 'ՎԻՐԱԲՈՒԺԱԿԱՆ ՄԱՆՐԱԴԻՏԱԿՆԵՐ'],

            ['subcategory_id' => '20', 'language' => 'en', 'name' => 'TONOMETRY'],
            ['subcategory_id' => '20', 'language' => 'am', 'name' => 'ՏՈՆՈՄԵՏՐ'],

            ['subcategory_id' => '21', 'language' => 'en', 'name' => 'RETINAL IMAGING'],
            ['subcategory_id' => '21', 'language' => 'am', 'name' => 'ՌԵՏԻՆԱԼ ՀԵՏԱԶՈՏՈՒԹՅՈՒՆ'],

            ['subcategory_id' => '22', 'language' => 'en', 'name' => 'OCT'],
            ['subcategory_id' => '22', 'language' => 'en', 'name' => 'ՕՊՏԻԿԱԿԱՆ ՏՈՄՈԳՐԱՖԻԱ'],

            ['subcategory_id' => '23', 'language' => 'am', 'name' => 'LASER IMAGING'],
            ['subcategory_id' => '23', 'language' => 'am', 'name' => 'ԼԱԶԵՐԱՅԻՆ ՀԵՏԱԶՈՏՈՒԹՅՈՒՆ'],

            ['subcategory_id' => '24', 'language' => 'am', 'name' => 'PERIMETER'],
            ['subcategory_id' => '24', 'language' => 'am', 'name' => 'ՊԵՐԻՄԵՏՐԻԱ'],

            ['subcategory_id' => '25', 'language' => 'en', 'name' => 'INSTRUNENTS FOR OPHTHALMOLOGY'],
            ['subcategory_id' => '25', 'language' => 'am', 'name' => 'Ակնաբուժական գործիքներ'],


            ['subcategory_id' => '26', 'language' => 'am', 'name' => 'Neurosurgical Microsopes'],
            ['subcategory_id' => '26', 'language' => 'am', 'name' => 'Նյարդավիրաբուժական մանրադիտակներ'],

            ['subcategory_id' => '27', 'language' => 'en', 'name' => 'Neurourgery Instruments'],
            ['subcategory_id' => '27', 'language' => 'am', 'name' => 'Նյարդավիրաբուժական գործիքներ'],


            ['subcategory_id' => '28', 'language' => 'en', 'name' => 'CARDIOVASCULAR INSTRUMENTS'],
            ['subcategory_id' => '28', 'language' => 'am', 'name' => 'ՍՐՏԱԲԱՆԱԿԱՆ ԳՈՐԾԻՔՆԵՐ'],


            ['subcategory_id' => '29', 'language' => 'en', 'name' => 'Surgical Microscopes'],
            ['subcategory_id' => '29', 'language' => 'am', 'name' => 'Վիրաբուժական մանրադիտակներ'],

            ['subcategory_id' => '30', 'language' => 'en', 'name' => 'Scalp cooling system'],
            ['subcategory_id' => '30', 'language' => 'am', 'name' => 'Գլխի սառեցման համակարգ'],


            ['subcategory_id' => '31', 'language' => 'en', 'name' => 'Surgical Urology Microscopes'],
            ['subcategory_id' => '31', 'language' => 'am', 'name' => 'Վիրահատական Ուռոլոգիայի Մանրադիտակներ'],

            ['subcategory_id' => '32', 'language' => 'en', 'name' => 'Gynecology & Obstetrical Instruments'],
            ['subcategory_id' => '32', 'language' => 'am', 'name' => 'Գինեկոլոգիա և մանկաբարձական գործիքներ'],


            ['subcategory_id' => '33', 'language' => 'en', 'name' => 'Dental Microscopes'],
            ['subcategory_id' => '33', 'language' => 'am', 'name' => 'Ատամնաբուժական մանրադիտակներ'],

            ['subcategory_id' => '34', 'language' => 'en', 'name' => 'DENTAL INSTRUMENTS'],
            ['subcategory_id' => '34', 'language' => 'am', 'name' => 'Ստոմատոլոգիական գործիքներ'],


            ['subcategory_id' => '35', 'language' => 'en', 'name' => 'Tissue Processors'],
            ['subcategory_id' => '35', 'language' => 'am', 'name' => 'Հյուսվածքի պրոցեսոր'],

            ['subcategory_id' => '36', 'language' => 'en', 'name' => 'Microtomes'],
            ['subcategory_id' => '36', 'language' => 'am', 'name' => 'Միկրոտոմներ'],

            ['subcategory_id' => '37', 'language' => 'en', 'name' => 'Cryostats'],
            ['subcategory_id' => '37', 'language' => 'am', 'name' => 'Կրիոստատներ'],

            ['subcategory_id' => '38', 'language' => 'en', 'name' => 'H&E Slide Stainers, Special Stainers & Coverslipper'],
            ['subcategory_id' => '38', 'language' => 'am', 'name' => 'Ներկման համակարգեր'],

            ['subcategory_id' => '39', 'language' => 'en', 'name' => 'Specimen Identification Solutions'],
            ['subcategory_id' => '39', 'language' => 'am', 'name' => 'Նույնականացման համակարգեր'],

            ['subcategory_id' => '40', 'language' => 'en', 'name' => 'Embedding Solutions'],
            ['subcategory_id' => '40', 'language' => 'am', 'name' => 'Նույնականացման համակարգեր'],


            ['subcategory_id' => '41', 'language' => 'en', 'name' => 'Scan'],
            ['subcategory_id' => '41', 'language' => 'am', 'name' => 'Սկանավորում'],

            ['subcategory_id' => '42', 'language' => 'en', 'name' => 'Digital Pathology Software'],
            ['subcategory_id' => '42', 'language' => 'am', 'name' => 'Թվային պաթոլոգիայի ծրագրային ապահովում'],


            ['subcategory_id' => '43', 'language' => 'en', 'name' => 'Invested light microscope'],
            ['subcategory_id' => '43', 'language' => 'am', 'name' => 'Ինվեստացված լուսային մանրադիտակ'],

            ['subcategory_id' => '44', 'language' => 'en', 'name' => 'Stereo Microscopes'],
            ['subcategory_id' => '44', 'language' => 'am', 'name' => 'Ստերեո Մանրադիտակների'],


            ['subcategory_id' => '45', 'language' => 'en', 'name' => 'Product'],
            ['subcategory_id' => '45', 'language' => 'am', 'name' => 'Ապրանք'],


            ['subcategory_id' => '46', 'language' => 'en', 'name' => 'Fully automated Instruments'],
            ['subcategory_id' => '46', 'language' => 'am', 'name' => 'Ավտոմատացված սարքավորումներ'],
        ];

        SubcategoryTranslations::insert($childSubcategoryTranslations);



    }
}
