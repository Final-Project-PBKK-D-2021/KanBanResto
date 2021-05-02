<?php


namespace App\Modules\KanBan\Core\Application\Service\Product\EditProduct;


use App\Modules\KanBan\Core\Domain\Repository\ProductRepositoryInterface;

class EditProductService
{
    private ProductRepositoryInterface $product_repository;

    /**
     * EditProductService constructor.
     * @param ProductRepositoryInterface $Product_repository
     */
    public function __construct(ProductRepositoryInterface $product_repository)
    {
        $this->product_repository = $product_repository;
    }

    public function execute (EditProductRequest $request){
        $product = $this->product_repository->getProductById($request->getId());

        $product->name = $request->getName();
        $product->description = $request->getDescription();
        $product->price = $request->getPrice();
        $product->badge = $request->getBadge();

        $this->product_repository->persist($product);
    }
}
