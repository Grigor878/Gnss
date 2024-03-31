<?php

namespace App\Services;

use App\Repositories\CustomerRepository;

class CustomerService
{
    /**
     * customerRepository
     *
     * @var mixed
     */
    private $customerRepository;

    /**
     * __construct
     *
     * @param  mixed $customerRepository
     * @return void
     */
    public function __construct(
        CustomerRepository $customerRepository
    ) {
        $this->customerRepository = $customerRepository;
    }

    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    public function create($data)
    {
        return $this->customerRepository->create($data);
    }

    /**
     * update
     *
     * @param  mixed $customer
     * @param  mixed $data
     * @return void
     */
    public function update($customer, $data)
    {
        return $this->customerRepository->update($customer, $data);
    }

    /**
     * deletePerson
     *
     * @param  mixed $id
     * @return void
     */
    public function deletePerson(string $id)
    {
        return $this->customerRepository->deletePerson($id);
    }
}
