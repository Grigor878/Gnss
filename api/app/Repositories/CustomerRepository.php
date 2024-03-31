<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Models\CustomerContactPerson;
use Illuminate\Support\Facades\DB;

class CustomerRepository
{
    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    public function create($data)
    {
        DB::beginTransaction();

        $customer = Customer::create([
            'name' => $data['name'],
            'address' => $data['address']
        ]);

        foreach ($data['contactPersons'] as $person) {
            if ($person['name'] != null) {
                $person['customer_id'] = $customer->id;
                CustomerContactPerson::create($person);
            }
        }

        DB::commit();

        return $customer;
    }

    public function update($customer, $data)
    {
        DB::beginTransaction();

        if ( isset($data['contactPersons']) ) {
            foreach ($data['contactPersons'] as $person) {
                if (isset($person['id'])) {
                    CustomerContactPerson::where('id', $person['id'])->update($person);
                } else {
                    if ($person['name'] != null) {
                        $person['customer_id'] = $customer->id;
                        CustomerContactPerson::create($person);
                    }
                }
            }
        }

        $customer->update([
            'name' => $data['name'],
            'address' => $data['address']
        ]);

        DB::commit();

        return $customer;
    }

    /**
     * deletePerson
     *
     * @param  mixed $id
     * @return void
     */
    public function deletePerson(string $id)
    {
        DB::beginTransaction();
        $person = CustomerContactPerson::where('id', $id)->delete();
        DB::commit();

        return $person;
    }

}
