<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProductRequest;
use App\Models\Category;
use App\Models\Product;
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
    public function __construct
    (
        ProductService $productService
    )
    {
        $this->productService = $productService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category','subcategory', 'productTraslations', 'images')
        ->paginate(30);

        return view("dashboard.product.index", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $subCategories = Subcategory::select('id', 'name')->get();

        return view('dashboard.product.create', compact('categories', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        $this->productService->create($data);

        return redirect()->route('product.index');
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
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd('delete');
    }
}
