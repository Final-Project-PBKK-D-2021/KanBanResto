<?php


namespace App\Modules\KanBan\Core\Application\Service\Product\ListProduct;


use App\Modules\KanBan\Core\Domain\Repository\ProductRepositoryInterface;

class ListProductService
{
    private ProductRepositoryInterface $product_repository;

    /**
     * GetAllProductService constructor.
     * @param ProductRepositoryInterface $Product_repository
     */
    public function __construct(ProductRepositoryInterface $product_repository)
    {
        $this->product_repository = $product_repository;
    }

    public function execute (){
        $products = $this->product_repository->listProduct();
        return $products;
    }
}
