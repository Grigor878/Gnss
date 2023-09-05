<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function getPartners() : JsonResponse
    {
        $partners = Partner::select('id', 'name as title', 'image')->get();
        $dataPartners = $partners->toArray();

        return response()->json($dataPartners);
    }
}
