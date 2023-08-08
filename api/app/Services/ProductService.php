<?php

namespace App\Services;

use App\Repositories\ProductRepository;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductService
{

    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * ProductService constructor
     *
     *  @param ProductRepository $productRepository
     **/
    public function __construct
    (
        ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }


    public function create($data)
    {
        return $this->productRepository->create($data);
    }
}
