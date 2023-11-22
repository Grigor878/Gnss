<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use App\Services\Api\OrderService;

class OrderController extends Controller
{

    /**
     * orderService
     *
     * @var mixed
     */
    private $orderService;

    /**
     * __construct
     *
     * @param  OrderService $orderService
     * @return void
     */
    public function __construct(
        OrderService $orderService
    ) {
        $this->orderService = $orderService;
    }

    /**
     * startOrder
     *
     * @param  mixed $request
     * @return void
     */
    public function startOrder(OrderRequest $request)
    {
        $data = $request->validated();

        return $this->orderService->create($data);
    }
}
