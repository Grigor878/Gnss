<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{

    /**
     * checkCustomerByPhone
     *
     * @param  mixed $phone
     * @return void
     */
    public function checkCustomerByPhone($phone)
    {
        $customer = Customer::where('phone', $phone);

        if ( $customer->exists() ) {
            return $customer->get()[0];
        } else {
            return false;
        }
    }

    public function CheckAndCreate($data)
    {
        try {
            $customer = Customer::where('phone', $data['phone'])->first();
            if ($customer == null) {
                $customer = Customer::create($data);
            }
            return $customer;
        } catch (\Exception $e) {
            return [
                'status' => 400,
                'message' => "Something went wrong",
                'data' => $e->getMessage(),
            ];
        }
    }
}
