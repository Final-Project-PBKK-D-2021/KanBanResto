<?php


namespace App\Modules\KanBan\Core\Application\Service\Product\DeleteProduct;


use App\Modules\KanBan\Core\Domain\Repository\ProductRepositoryInterface;

class DeleteProductService
{
    private ProductRepositoryInterface $product_repository;

    /**
     * DeleteProductService constructor.
     * @param ProductRepositoryInterface $Product_repository
     */
    public function __construct(ProductRepositoryInterface $product_repository)
    {
        $this->product_repository = $product_repository;
    }

    public function execute(DeleteProductRequest $request)
    {
        $this->product_repository->deleteProductById($request->getProductId());
    }
}
