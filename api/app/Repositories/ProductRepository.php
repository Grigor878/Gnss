<?php

namespace App\Repositories;

use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductSubcategory;
use App\Models\ProductTranslations;
use App\Services\FileServices;
use Illuminate\Support\Facades\DB;

class ProductRepository
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

    public function create($data)
    {
        DB::beginTransaction();

        $product = Product::create([
            'name' => $data['en_name'],
            'price' => $data['price'],
            'description' => $data['en_description'],
            'count' => $data['count']
        ]);

        ProductTranslations::insert([
            [
                'product_id' => $product->id,
                'language' => 'en',
                'name' => $data['en_name'],
                'description' => $data['en_description'],
            ],
            [
                'product_id' => $product->id,
                'language' => 'am',
                'name' => $data['am_name'],
                'description' => $data['am_description'],
            ]
        ]);

        if ( isset($data['images']) ) {
            foreach ($data['images'] as $key => $image) {
                $imageFileName = rand(1000000, 99999999999) . '_product_' . $product->id . '_image_' . $key + 1 . '.' . strtolower($image->getClientOriginalExtension());

                $path = $this->fileServices->savePhoto(1000, $image, 'products/' . $product->id, $imageFileName);

                ProductImages::create([
                    'product_id' => $product->id,
                    'filename' => $path,
                ]);
            }
        }

        if ( isset($data['categories']) ) {
            foreach ( $data['categories'] as $catergory ) {
                CategoryProduct::create([
                    'category_id' => $catergory,
                    'product_id' => $product->id
                ]);
            }
        }

        if ( isset($data['subcategories']) ) {
            foreach ( $data['subcategories'] as $subcategory) {
                ProductSubcategory::create([
                    'subcategory_id' => $subcategory,
                    'product_id' => $product->id
                ]);
            }
        }

        DB::commit();

        return $product;
    }
}
