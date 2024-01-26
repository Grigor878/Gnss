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
    public function deleteImage(string $id, $bg_image)
    {
        DB::beginTransaction();

        $subcategory = Subcategory::find($id);
        if ($bg_image == 'bg-image') {
            $url = 'public/' . $subcategory->bg_image;
            $subcategory->bg_image = null;
        } else if ($bg_image == 'image') {
            $url = 'public/' . $subcategory->image;
            $subcategory->image = null;
        }
        $subcategory->save();

        $this->fileService->deleteFile($url);

        DB::commit();

        return $subcategory;
    }
}
