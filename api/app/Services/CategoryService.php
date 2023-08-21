<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Repositories\CategoryRepository;

class CategoryService
{
    /**
     * categoryRepository
     *
     * @var mixed
     */
    private $categoryRepository;

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
    public function __construct(
        CategoryRepository $categoryRepository,
        FileServices $fileService
    ) {
        $this->categoryRepository = $categoryRepository;
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
        return $this->categoryRepository->create($data);
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
        return $this->categoryRepository->update($category, $data);
    }

    /**
     * delete
     *
     * @param  mixed $category
     * @return void
     */
    public function delete($category)
    {
        return $this->categoryRepository->delete($category);
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

        $category = Category::find($id);
        $url = 'public/' . $category->image;

        $category->image = null;
        $category->save();

        $this->fileService->deleteImage($url);

        DB::commit();

        return $category;
    }

}
