<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * catrgoryService
     *
     * @var CategoryService
     */
    private $catrgoryService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        CategoryService $catrgoryService
    ) {
        $this->catrgoryService = $catrgoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        $this->catrgoryService->create($data);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::with('translations')->find($id);

        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        $this->catrgoryService->update($category, $data);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::with('translations')->find($id);

        $this->catrgoryService->deleteImage($id);

        $this->catrgoryService->delete($category);

        return redirect()->route('categories.index');
    }

    public function deleteImage (string $id)
    {
        try {
            $this->catrgoryService->deleteImage($id);
            return [
                'status' => 1,
                'message' => 'Image Deleted'
            ];
        } catch (\Exception $e) {
            return [
                'status' => 0,
                'message' => $e
            ];
        }

    }
}
