<?php


namespace App\Modules\KanBan\Core\Application\Service\Product\CreateProduct;


use App\Modules\KanBan\Core\Domain\Model\Product;
use App\Modules\KanBan\Core\Domain\Repository\ProductRepositoryInterface;

class CreateProductService
{
    private ProductRepositoryInterface $product_repository;

    /**
     * CreateProductService constructor.
     * @param ProductRepositoryInterface $Product_repository
     */
    public function __construct(ProductRepositoryInterface $product_repository)
    {
        $this->product_repository = $product_repository;
    }

    public function execute(CreateProductRequest $request)
    {
        $product = Product::create(
            [
                'name' => $request->getName(),
                'description' => $request->getDescription(),
                'price' => $request->getPrice(),
                'badge' => $request->getBadge()

            ]
        );

        $this->product_repository->persist($product);
    }
}
