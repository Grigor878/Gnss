<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{

    public function getHeaderItems() : JsonResponse
    {

        $categories = Category::with('subcategories.product')->get();

        $data = [
            [
                "id" => "Home",
                "path" => "/",
                "translations" => [
                    "am" => "Գլխավոր էջ",
                    "en" => "Home"
                ]
            ],
            [
                "id" => "About Us",
                "path" => "/about",
                "translations" => [
                    "am" => "",
                    "en" => "About Us"
                ]
            ],
            [
                "id" => "Contact Us",
                "path" => "/contact",
                "translations" => [
                    "am" => "",
                    "en" => "Contact Us"
                ]
            ],
            [
                "id" => "products",
                "path" => "/products",
                "translations" => [
                    "am" => "",
                    "en" => "products"
                ],
                'categories' => $categories->toArray()
            ],
        ];

        return response()->json($data);
    }
}
