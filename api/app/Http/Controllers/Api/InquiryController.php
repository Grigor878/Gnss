<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\InquiryRequest;
use App\Services\Api\InquiryService;

class InquiryController extends Controller
{
    /**
     * inquiryService
     *
     * @var mixed
     */
    private $inquiryService;

    /**
     * __construct
     *
     * @param  mixed $inquiryService
     * @return void
     */
    public function __construct (
        InquiryService $inquiryService
    ) {
        $this->inquiryService = $inquiryService;
    }

    public function index(InquiryRequest $request)
    {
        $data = $request->validated();
        return $this->inquiryService->create($data);
    }
}
