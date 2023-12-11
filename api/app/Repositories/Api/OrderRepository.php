<?php

namespace App\Repositories\Api;

use App\Models\Order;
use App\Models\Customer;
use App\Services\ResponseService;
use Illuminate\Support\Facades\DB;

class OrderRepository
{

    /**
     * response
     *
     * @var mixed
     */
    private $response;

    /**
     * __construct
     *
     * @param   $response
     * @return void
     */
    public function __construct(
        ResponseService $response
    ) {
        $this->response = $response;
    }

    /**
     * create
     *
     * @param  array $order
     * @param  array $customer
     * @return void
     */
    public function create(array $order, array $customer)
    {
        DB::beginTransaction();

        try {
            $newCustomer = Customer::create($customer);
            $order['customer_id'] = $newCustomer->id;
            $newOrder = Order::create($order);

            DB::commit();
            return $this->response->success([$newCustomer, $newOrder], 'Order Created');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->response->badRequest([], $e->getMessage());
        }

    }

    /**
     * createOrder
     *
     * @param  mixed $order
     * @param  mixed $customerId
     * @return void
     */
    public function createOrder($order, $customerId)
    {
        DB::beginTransaction();

        try {
            $order['customer_id'] = $customerId;
            $newOrder = Order::create($order);

            DB::commit();
            return $this->response->success($newOrder, 'Order Created');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->response->badRequest([], $e->getMessage());
        }
    }


}
