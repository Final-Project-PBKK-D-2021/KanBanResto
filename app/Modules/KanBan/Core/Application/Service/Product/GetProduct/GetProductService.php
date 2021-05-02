<?php


namespace App\Modules\KanBan\Core\Application\Service\Product\GetProduct;


use App\Modules\KanBan\Core\Domain\Repository\ProductRepositoryInterface;

class GetProductService
{
    private ProductRepositoryInterface $product_repository;

    /**
     * GetProductService constructor.
     * @param ProductRepositoryInterface $Product_repository
     */
    public function __construct(ProductRepositoryInterface $product_repository)
    {
        $this->product_repository = $product_repository;
    }

    public function execute(GetProductRequest $request)
    {
        $product = $this->product_repository->getProductById($request->getProductId());

        return new GetProductResponse(
            $product->id,
            $product->name,
            $product->price,
            $product->description,
            $product->badge
        );
    }
}
