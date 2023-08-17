<?php

namespace App\Services;

use App\Models\ProductImages;
use App\Services\FileServices;
use Illuminate\Support\Facades\DB;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductService
{

    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * fileService
     *
     * @var mixed
     */
    private $fileService;

    /**
     * ProductService constructor
     *
     *  @param ProductRepository $productRepository
     **/
    public function __construct(
        ProductRepository $productRepository,
        FileServices $fileService
    ) {
        $this->productRepository = $productRepository;
        $this->fileService = $fileService;
    }


    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    public function create($data)
    {
        return $this->productRepository->create($data);
    }

    /**
     * update
     *
     * @param  mixed $product
     * @param  mixed $data
     * @return void
     */
    public function update($product, $data)
    {
        return $this->productRepository->update($product, $data);
    }

    public function delete($product)
    {
        Storage::deleteDirectory('public/products/' . $product->id);

        return $this->productRepository->delete($product);
    }

    /**
     * deleteImage
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteImage($id)
    {
        DB::beginTransaction();

        $image = ProductImages::find($id);
        $url = 'public/' . $image->filename;

        $this->fileService->deleteImage($url);
        $image->delete();

        DB::commit();

        return true;
    }
}
