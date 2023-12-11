<?php

namespace App\Services;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use App\Repositories\OpportunityRepository;

class OpportunityService
{
    /**
     * opportunityRepository
     *
     * @var mixed
     */
    private $opportunityRepository;

    /**
     * customerRepository
     *
     * @var mixed
     */
    private $customerRepository;

    /**
     * __construct
     *
     * @param  OpportunityRepository $opportunityRepository
     * @param  CustomerRepository $customerRepository
     * @return void
     */
    public function __construct(
        OpportunityRepository $opportunityRepository,
        CustomerRepository $customerRepository
    ) {
        $this->opportunityRepository = $opportunityRepository;
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
        $thisCostomer = [
            'email' => $data['email'],
            'fullName' => $data['fullName'],
            'phone' => $data['phone'],
            'company' => $data['company']
        ];

        $opportunity = [
            'product_id' => $data['product_id'],
            'count' => $data['count'],
            'note' => $data['note'],
            'status_id' => 1
        ];

        $customer = $this->customerRepository->CheckAndCreate($thisCostomer);
        $opportunity['customer_id'] = $customer->id;
        $opportunity = $this->opportunityRepository->create($opportunity);

        return $opportunity;
    }

    /**
     * updateStatus
     *
     * @param  string $opportunityId
     * @param  string $statusId
     * @return void
     */
    public function updateStatus(string $opportunityId, string $statusId)
    {
        return $this->opportunityRepository->updateStatus($opportunityId, $statusId);
    }

}
