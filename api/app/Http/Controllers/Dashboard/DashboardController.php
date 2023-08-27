<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {

        $allProducts = Product::query()->count();
        $allCategories = Category::query()->count();
        $allSubcategories = Subcategory::query()->count();
        $allPartners = Partner::query()->count();
        $allUsers = User::query()->count();

//         dd(
//             $allProducts,
// $allCategories,
// $allSubcategories,
// $allPartners,
// $allUsers
//         );

        return view('dashboard.index',
            compact (
                'allProducts',
                'allCategories',
                'allSubcategories',
                'allPartners',
                'allUsers'
            )
        );
    }
}
