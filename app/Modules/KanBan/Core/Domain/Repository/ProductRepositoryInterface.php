<?php


namespace App\Modules\KanBan\Core\Domain\Repository;


use App\Modules\KanBan\Core\Domain\Model\Product;

interface ProductRepositoryInterface
{
    public function getProductById($id);

    public function persist (Product $product);

    public function listProduct();

    public function deleteProductById($id);
}
