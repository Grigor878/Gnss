<?php

namespace App\Services\Api;

use App\Repositories\Api\OrderRepository;
use App\Repositories\CustomerRepository;

class OrderService
{

    const OPENED = 'opened';
    const RELEASED = 'released';
    const INPROGRESS = 'in_progress';
    const CLOSED = 'closed';

    /**
     * orderRepository
     *
     * @var mixed
     */
    private $orderRepository;

    /**
     * customerRepository
     *
     * @var mixed
     */
    private $customerRepository;

    /**
     * __construct
     *
     * @param  OrderRepository $orderRepository
     * @param  CustomerRepository $customerRepository
     * @return void
     */
    public function __construct (
        OrderRepository $orderRepository,
        CustomerRepository $customerRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->customerRepository = $customerRepository;
    }

    public function create($data)
    {
        $thisCostomer = [
            'email' => $data['mail'],
            'fullName' => $data['fullName'],
            'phone' => $data['phone'],
            'company' => $data['company']
        ];

        $order = [
            'product_id' => $data['id'],
            'count' => $data['count'],
            'note' => $data['notes'],
            'status' => self::OPENED
        ];

        if ( $customer = $this->customerRepository->checkCustomerByPhone($thisCostomer['phone']) ) {
            return $this->orderRepository->createOrder($order, $customer->id);
        } else {
            return $this->orderRepository->create($order, $thisCostomer);
        }
    }
}
