<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * getCategories
     *
     * @return JsonResponse
     */
    public function getCategories(string $lang) : JsonResponse
    {
        $dataCategoryes = [];

        $categories = Category::select('id', 'name', 'image')->with('translations')->get();

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

            array_push($dataCategoryes, $thisCategory);
        }

        return response()->json($dataCategoryes);
    }
}
