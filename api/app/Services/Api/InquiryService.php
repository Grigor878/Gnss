<?php

namespace App\Services\Api;

use App\Models\Inquiry;
use App\Repositories\Api\InquiryRepository;

class InquiryService
{
    /**
     * inquiryRepository
     *
     * @var mixed
     */
    private $inquiryRepository;

    /**
     * __construct
     *
     * @param  InquiryRepository $inquiryRepository
     * @return void
     */
    public function __construct(
        InquiryRepository $inquiryRepository
    ) {
        $this->inquiryRepository = $inquiryRepository;
    }

    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    public function create($data)
    {
        return $this->inquiryRepository->create($data);
    }

    /**
     * reject
     *
     * @param  mixed $id
     * @return void
     */
    public function reject($id)
    {
        return $this->inquiryRepository->reject($id);
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        return $this->inquiryRepository->delete($id);
    }

    /**
     * toOpportunity
     *
     * @param  mixed $data
     * @return void
     */
    public function toOpportunity($data)
    {
        $inquiry = Inquiry::find($data['id'])->toArray();

        $customer = [
            'name' => 'required',
            'address' => '',
            'contactPersons' => [
                
            ]
        ];





        $opportunity = [
            'product_id' => $inquiry['product_id'],
            'customer_id' => '----',
            'user_id' => $data['manager'],
            'count' => $inquiry['product_id']
        ];

        dd($inquiry, $opportunity);
    }

}
