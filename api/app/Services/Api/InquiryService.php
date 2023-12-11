<?php

namespace App\Services\Api;

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
}
