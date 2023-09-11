<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    /**
     * getAllSubCategories
     *
     * @param  string $lang
     * @return JsonResponse
     */
    public function getAllSubCategories(string $lang) : JsonResponse
    {
        $dataSubcategoryes = [];

        $subcategoryes = Subcategory::select('id', 'name', 'image', 'category_id')
        ->with('translations', 'category')
        ->get();

        foreach ($subcategoryes as $sub) {
            $thisSubcategory['id'] = $sub->id;

            if (isset($sub->translations)) {
                foreach ($sub->translations as $tr) {
                    if ($tr->language == $lang) {
                        $thisSubcategory['title'] = $tr->name;
                    }
                }
            }

            $path_parent = str_replace(' ', '_',  str_replace(',', '', strtolower($sub->category->name)));
            $path_sub = str_replace(' ', '_',  str_replace(',', '', strtolower($sub->name)));

            $thisSubcategory['path'] = '/' . $path_parent . '/' . $path_sub;
            $thisSubcategory['image'] = $sub->image;
            $thisSubcategory['parent'] = $sub->category->name;
            $thisSubcategory['category_id'] = $sub->category_id;

            array_push($dataSubcategoryes, $thisSubcategory);
        }

        return response()->json($dataSubcategoryes);
    }

    /**
     * getSubcategories
     *
     * @param  int $id
     * @param  string $lang
     * @return JsonResponse
     */
    public function getSubcategories(int $id, string $lang): JsonResponse
    {
        $dataSubcategoryes = [];

        $subcategoryes = Subcategory::select('id', 'name', 'image', 'category_id')
            ->with('translations', 'category')
            ->where('category_id', $id)
            ->get();

        foreach ($subcategoryes as $sub) {

            $thisSubcategory['id'] = $sub->id;

            if (isset($sub->translations)) {
                foreach ($sub->translations as $tr) {
                    if ($tr->language == $lang) {
                        $thisSubcategory['title'] = $tr->name;
                    }
                }
            }

            $path_parent = str_replace(' ', '_',  str_replace(',', '', strtolower($sub->category->name)));
            $path_sub = str_replace(' ', '_',  str_replace(',', '', strtolower($sub->name)));

            $thisSubcategory['path'] = '/' . $path_parent . '/' . $path_sub;
            $thisSubcategory['image'] = $sub->image;
            $thisSubcategory['parent'] = $sub->category->name;
            $thisSubcategory['category_id'] = $sub->category_id;


            array_push($dataSubcategoryes, $thisSubcategory);
        }

        return response()->json($dataSubcategoryes);
    }

    /**
     * getSubcategoryProducts
     *
     * @param  int $id
     * @param  string $lang
     * @return JsonResponse
     */
    public function getSubcategoryProducts(int $id, string $lang): JsonResponse
    {
        $dataProducts = [];

        $products = Product::with('translations', 'images', 'subcategory')
            ->whereHas('subcategory', function ($query) use ($id) {
                $query->where('subcategories.id', $id);
            })
            ->get();

        foreach ($products as $product) {
            if ($product->count) {

                $thisProduct['id'] = $product->id;

                if (isset($product->translations)) {

                    foreach ($product->translations as $tr) {
                        if ($tr->language == $lang) {
                            $thisProduct['title'] = $tr->name;
                        }
                    }
                }

                foreach ($product->subcategory as $key => $cat) {
                    if ($cat->id != $id) {
                        unset($product->subcategory[$key]);
                    } else {
                        $thisProduct['parent'] = $cat->name;
                    }
                }

                $thisProduct['count'] = $product->count;
                $thisProduct['path'] = '/product/' . $product->id;
                $thisProduct['images'] = [];
                foreach ($product->images as $image) {
                    array_push($thisProduct['images'], $image->filename);
                }

                array_push($dataProducts, $thisProduct);
            }
        }

        return response()->json($dataProducts);
    }
}
