<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SubcategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use App\Services\SubcategoryService;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{

    /**
     * subcategoryService
     *
     * @var mixed
     */
    private $subcategoryService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        SubcategoryService $subcategoryService
    ) {
        $this->subcategoryService = $subcategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::all();

        return view('dashboard.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->with('translations')->get();
        $subCategories = Subcategory::with('translations', 'parent', 'subcategories')
        ->where([
            ['level', 1],
            ['parent_id', NULL],
        ])
        ->get();

        return view('dashboard.subcategory.create', compact('categories', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubcategoryRequest $request)
    {
        $data = $request->validated();

        $this->subcategoryService->create($data);

        return redirect()->route('subcategories.index');
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
        $subcategory = Subcategory::with('translations', 'parent', 'subcategories')->find($id);
        $categories = Category::select('id', 'name')->with('translations')->get();
        $subCategories = Subcategory::with('translations', 'parent', 'subcategories')
        ->where([
            ['level', 1],
            ['parent_id', NULL],
        ])
        ->get();

        return view('dashboard.subcategory.edit', compact('subcategory', 'categories', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubcategoryRequest $request, Subcategory $subcategory)
    {
        $data = $request->validated();

        $this->subcategoryService->update($subcategory, $data);

        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = Subcategory::with('translations')->find($id);

        $this->subcategoryService->deleteImage($id, 'image');
        $this->subcategoryService->deleteImage($id, 'bg-image');

        $this->subcategoryService->delete($subcategory);

        return redirect()->route('subcategories.index');
    }

    /**
     * deleteImage
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteImage (string $id, $bg_image = false)
    {
        try {
            $this->subcategoryService->deleteImage($id, $bg_image);
            return [
                'status' => 1,
                'message' => 'Image Deleted'
            ];
        } catch (\Exception $e) {
            return [
                'status' => 0,
                'message' => $e->getMessage()
            ];
        }
    }
}
