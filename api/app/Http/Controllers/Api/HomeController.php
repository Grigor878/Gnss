<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{

    public function getHeaderItems(string $lang) : JsonResponse
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
                foreach ( $cat->translations as $tr) {
                    if ( $tr->language == $lang  ) {
                        $thisCategory['name'] = $tr->name;
                    }
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
                        foreach ( $sub->translations as $tr) {
                            if ( $tr->language == $lang  ) {
                                $thisSub['name'] = $tr->name;
                            }
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
                                foreach ( $product->translations as $tr) {

                                    if ( $tr->language == $lang  ) {
                                        $thisProduct['name'] = $tr->name;
                                        $thisProduct['description'] = $tr->description;
                                    }
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

        if ($lang == 'en') {
            $data = [
                [
                    "id" => "Home",
                    "path" => "/",
                    "title" => "Home"
                ],
                [
                    "id" => "About Us",
                    "path" => "/about",
                    "title" => "About Us"
                ],
                [
                    "id" => "Contact Us",
                    "path" => "/contact",
                    "title" => "Contact Us"
                ],
                [
                    "id" => "products",
                    "path" => "/products",
                    "title" => "products",
                    'categories' => $dataCategoryes
                ],
            ];
        } else if ($lang == 'am') {
            $data = [
                [
                    "id" => "Home",
                    "path" => "/",
                    "title" => "Գլխավոր էջ"
                ],
                [
                    "id" => "About Us",
                    "path" => "/about",
                    "title" => "Մեր մասին"
                ],
                [
                    "id" => "Contact Us",
                    "path" => "/contact",
                    "title" => "Կենտակտներ"
                ],
                [
                    "id" => "products",
                    "path" => "/products",
                    "title" => "Ապրանքեր",
                    'categories' => $dataCategoryes
                ],
            ];

        }

        return response()->json($data);

    }
}
