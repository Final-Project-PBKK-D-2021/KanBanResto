<?php


namespace App\Modules\KanBan\Core\Domain\Repository;


use App\Modules\KanBan\Core\Domain\Model\Product;

interface ProductRepositoryInterface
{
    public function getProductById($id);

    public function persist (Product $product);

    public function listProductByBusinessId($business_id);

    public function deleteProductById($id);
}


