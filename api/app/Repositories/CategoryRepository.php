<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\CategoryTranslations;
use App\Services\FileServices;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{

    /**
     * fileServices
     *
     * @var FileServices
     */
    private $fileServices;

    public function __construct(
        FileServices $fileServices
    ) {
        $this->fileServices = $fileServices;
    }

    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    public function create($data)
    {
        DB::beginTransaction();

        $category = Category::create([
            'name' => $data['en_name']
        ]);

        CategoryTranslations::insert([
            [ 'category_id' => $category->id, 'language' => 'en', 'name' => $data['en_name'] ],
            [ 'category_id' => $category->id, 'language' => 'am', 'name' => $data['am_name'] ]
        ]);

        if ( isset($data['image']) ) {
            $imageFileName = rand(1000000, 99999999999) . '_category_' . $category->id . '_image.' . strtolower($data['image']->getClientOriginalExtension());

            $path = $this->fileServices->savePhoto(1000, $data['image'], 'categories', $imageFileName);

            Category::where('id', $category->id)->update([
                'image' => $path
            ]);
        }

        DB::commit();

        return $category;
    }

    /**
     * update
     *
     * @param  mixed $category
     * @param  mixed $data
     * @return void
     */
    public function update($category, $data)
    {
        DB::beginTransaction();

        $category->update([
            'name' => $data['en_name']
        ]);

        CategoryTranslations::where('category_id', $category->id)->delete();
        CategoryTranslations::insert([
            [ 'category_id' => $category->id, 'language' => 'en', 'name' => $data['en_name'] ],
            [ 'category_id' => $category->id, 'language' => 'am', 'name' => $data['am_name'] ]
        ]);

        if ( isset($data['image']) ) {
            $imageFileName = rand(1000000, 99999999999) . '_category_' . $category->id . '_image.' . strtolower($data['image']->getClientOriginalExtension());

            $path = $this->fileServices->savePhoto(1000, $data['image'], 'categories', $imageFileName);

            $category->update([
                'image' => $path
            ]);
        }

        DB::commit();

        return $category;
    }

    /**
     * delete
     *
     * @param  mixed $category
     * @return void
     */
    public function delete($category)
    {
        DB::beginTransaction();

        CategoryTranslations::where('category_id', $category->id)->delete();
        $category->delete();

        DB::commit();

        return $category;
    }
}
