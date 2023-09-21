<?php

namespace App\Repositories;

use App\Models\Subcategory;
use App\Models\SubcategoryTranslations;
use App\Services\FileServices;
use Illuminate\Support\Facades\DB;

class SubcategoryRepository
{

    /**
     * fileServices
     *
     * @var mixed
     */
    private $fileServices;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        FileServices $fileServices
    ) {
        $this->fileServices = $fileServices;
    }

    public function create($data)
    {
        DB::beginTransaction();

        $subcategory = Subcategory::create([
            'name' => $data['en_name'],
            'category_id' => $data['category'],
            'parent_id' => $data['subcategory'] ? $data['subcategory'] : NULL,
            'level' => $data['subcategory'] ? 2 : 1
        ]);

        SubcategoryTranslations::insert([
            [ 'subcategory_id' => $subcategory->id, 'language' => 'en', 'name' => $data['en_name'] ],
            [ 'subcategory_id' => $subcategory->id, 'language' => 'am', 'name' => $data['am_name'] ]
        ]);

        if ( isset($data['image']) ) {
            $imageFileName = rand(1000000, 99999999999) . '_subcategory_' . $subcategory->id . '_image.' . strtolower($data['image']->getClientOriginalExtension());

            $path = $this->fileServices->savePhoto(1000, $data['image'], 'subcategories', $imageFileName);

            Subcategory::where('id', $subcategory->id)->update([
                'image' => $path
            ]);
        }

        DB::commit();

        return $subcategory;
    }

    /**
     * update
     *
     * @param  mixed $subcategory
     * @param  mixed $data
     * @return void
     */
    public function update($subcategory, $data)
    {
        DB::beginTransaction();

        $subcategory->update([
            'name' => $data['en_name'],
            'category_id' => $data['category'],
            'parent_id' => $data['subcategory'] ? $data['subcategory'] : NULL,
            'level' => $data['subcategory'] ? 2 : 1
        ]);

        SubcategoryTranslations::where('subcategory_id', $subcategory->id)->delete();
        SubcategoryTranslations::insert([
            [ 'subcategory_id' => $subcategory->id, 'language' => 'en', 'name' => $data['en_name'] ],
            [ 'subcategory_id' => $subcategory->id, 'language' => 'am', 'name' => $data['am_name'] ]
        ]);

        if ( isset($data['image']) ) {
            $imageFileName = rand(1000000, 99999999999) . '_subcategory_' . $subcategory->id . '_image.' . strtolower($data['image']->getClientOriginalExtension());

            $path = $this->fileServices->savePhoto(1000, $data['image'], 'subcategories', $imageFileName);

            $subcategory->update([
                'image' => $path
            ]);
        }

        DB::commit();

        return $subcategory;
    }

    /**
     * delete
     *
     * @param  mixed $subcategory
     * @return void
     */
    public function delete($subcategory)
    {
        DB::beginTransaction();

        SubcategoryTranslations::where('subcategory_id', $subcategory->id)->delete();
        $subcategory->delete();

        DB::commit();

        return $subcategory;
    }
}
