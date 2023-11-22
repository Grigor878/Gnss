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
}
