<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Subcategory;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * productService
     *
     * @var ProductService
     */
    private $productService;

    /**
     * ProductController constructor
     *
     * @param ProductService $productService
     **/
    public function __construct (
        ProductService $productService
    ) {
        $this->productService = $productService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category','subcategory', 'images')
        ->paginate(30);

        return view("dashboard.product.index", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->with('translations')->get();
        $subCategories = Subcategory::select('id', 'name', 'category_id')->with('translations')->get();

        return view('dashboard.product.create', compact('categories', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        $this->productService->create($data);

        return redirect()->route('products.index');
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
        $product = Product::with('translations', 'images', 'category', 'subcategory')->find($id);
        $categories = Category::select('id', 'name')->with('translations')->get();
        $subCategories = Subcategory::select('id', 'name', 'category_id')->with('translations')->get();

        return view('dashboard.product.edit', compact('product','categories', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        $this->productService->update($product, $data);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::with('translations', 'images', 'category', 'subcategory')->find($id);

        $this->productService->delete($product);

        return redirect()->route('products.index');
    }

    /**
     * deleteImage
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteImage (string $id) {
        try {
            $this->productService->deleteImage($id);
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
