<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{

    public function getHeaderItems() : JsonResponse
    {

        $categories = Category::with(
            'translations',
            'subcategories.translations',
            'subcategories.product.images',
            'subcategories.product.translations'
        )->get();

        $dataCategoryes = [];

        foreach ($categories as $cat) {

            $thisCategory = [
                'name' => $cat->name,
                'image' => $cat->image
            ];

            if (isset($cat->translations)) {
                $thisCategory['translations'] = [];

                foreach ( $cat->translations as $tr) {
                    $thisCategory['translations'] += [$tr->language => $tr->name];
                }
            }

            if (isset($cat->subcategories)) {

                $thisCategory['subcategories'] = [];

                foreach ( $cat->subcategories as $sub) {
                    $thisSub = [
                        'name' => $sub->name,
                        'image' => $sub->image
                    ];

                    if (isset($sub->translations)) {
                        $thisSub['translations'] = [];

                        foreach ( $sub->translations as $tr) {
                            $thisSub['translations'] += [$tr->language => $tr->name];
                        }
                    }

                    if (isset($sub->product)) {

                        $thisSub['products'] = [];

                        foreach ( $sub->product as $product) {

                            $thisProduct = [
                                'name' => $product->name,
                                "price" => $product->price,
                                "description" => $product->description,
                                "count" => $product->count,
                            ];

                            if (isset($product->translations)) {
                                $thisProduct['translations'] = [];

                                foreach ( $product->translations as $tr) {

                                    $thisProductTr[$tr->language] = [
                                        'name' => $tr->name,
                                        'description' => $tr->description
                                    ];

                                    $thisProduct['translations'] += $thisProductTr;
                                }
                            }

                            if (isset($product->images)) {

                                $thisProduct['images'] = [];

                                foreach ($product->images as $image) {
                                    array_push($thisProduct['images'], $image->filename);
                                }


                            }

                            $thisSub['products'] += $thisProduct;
                        }
                    }

                    array_push($thisCategory['subcategories'], $thisSub);
                }
            }

            array_push($dataCategoryes, $thisCategory);
        }

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
                'categories' => $dataCategoryes
            ],
        ];

        return response()->json($data);
    }
}
