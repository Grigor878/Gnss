<?php

namespace App\Repositories;

use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductSubcategory;
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
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'count' => $data['count']
        ]);

        if ( isset($data['images']) ) {
            foreach ($data['images'] as $key => $image) {
                $imageFileName = rand(1000000, 99999999999) . '_product_' . $product->id . '_image_' . $key + 1 . '.' . strtolower($image->getClientOriginalExtension());
                $path = $this->fileServices->savePhoto(1000, $image, 'products/' . $product->id . '/', $imageFileName);

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
