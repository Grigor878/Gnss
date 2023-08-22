<?php

namespace App\Services;

use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;
use App\Repositories\SubcategoryRepository;

class SubcategoryService
{

    /**
     * categoryRepository
     *
     * @var mixed
     */
    private $subcategoryRepository;

    /**
     * fileService
     *
     * @var mixed
     */
    private $fileService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (
        SubcategoryRepository $subcategoryRepository,
        FileServices $fileService
    ) {
        $this->subcategoryRepository = $subcategoryRepository;
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
        return $this->subcategoryRepository->create($data);
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
        return $this->subcategoryRepository->update($subcategory, $data);
    }

    /**
     * delete
     *
     * @param  mixed $subcategory
     * @return void
     */
    public function delete ($subcategory)
    {
        return $this->subcategoryRepository->delete($subcategory);
    }


    /**
     * deleteImage
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteImage(string $id)
    {
        DB::beginTransaction();

        $subcategory = Subcategory::find($id);
        $url = 'public/' . $subcategory->image;

        $subcategory->image = null;
        $subcategory->save();

        $this->fileService->deleteImage($url);

        DB::commit();

        return $subcategory;
    }
}
