<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

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
                'title' => $cat->name,
                'path' => '/'.Str::lower(str_replace(' ', '_', $cat->name)),
                'image' => $cat->image
            ];

            if (isset($cat->translations)) {
                foreach ( $cat->translations as $tr) {
                    if ( $tr->language == $lang  ) {
                        $thisCategory['title'] = $tr->name;
                    }
                }
            }

            if (isset($cat->subcategories)) {

                $thisCategory['subcategories'] = [];

                foreach ( $cat->subcategories as $sub) {
                    $thisSub = [
                        'title' => $sub->name,
                        'path' => '/'.Str::lower(str_replace(' ', '_', str_replace(',', '', $sub->name))),
                        'image' => $sub->image
                    ];

                    if (isset($sub->translations)) {
                        foreach ( $sub->translations as $tr) {
                            if ( $tr->language == $lang  ) {
                                $thisSub['title'] = $tr->name;
                            }
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
                "title" => $lang == 'en' ? "Home" : ( $lang == 'am' ? "Գլխավոր էջ" : '' )
            ],
            [
                "id" => "About Us",
                "path" => "/about",
                "title" => $lang == 'en' ? "About Us" : ( $lang == 'am' ? "Մեր մասին" : '' )
            ],
            [
                "id" => "Contact Us",
                "path" => "/contact",
                "title" => $lang == 'en' ? "Contact Us" : ( $lang == 'am' ? "Կենտակտներ" : '' )
            ],
            [
                "id" => "products",
                "path" => "/products",
                "title" => $lang == 'en' ? "Products" : ( $lang == 'am' ? "Ապրանքեր" : '' ),
                'categories' => $dataCategoryes
            ],
        ];

        return response()->json($data);

    }
}
