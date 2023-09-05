<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    public function getSubcategories( string $id, string $lang ) : JsonResponse
    {

        $dataSubcategoryes = [];

        $subcategoryes = Subcategory::select('id', 'name', 'image', 'category_id')
        ->with('translations')
        ->where('category_id', $id)
        ->get();

        foreach ($subcategoryes as $sub) {

            $thisSubcategory['id'] = $sub->id;

            if (isset($sub->translations)) {
                foreach ( $sub->translations as $tr) {
                    if ( $tr->language == $lang  ) {
                        $thisSubcategory['title'] = $tr->name;
                    }
                }
            }

            $thisSubcategory['path'] = '/'.str_replace(' ', '_',  str_replace(',','',strtolower($sub->name)) );
            $thisSubcategory['image'] = $sub->image;
            $thisSubcategory['category_id'] = $sub->category_id;


            array_push($dataSubcategoryes, $thisSubcategory);
        }

        return response()->json($dataSubcategoryes);
    }
}
