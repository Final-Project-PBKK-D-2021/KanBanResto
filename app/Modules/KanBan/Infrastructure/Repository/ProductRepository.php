<?php


namespace App\Modules\KanBan\Infrastructure\Repository;


use App\Modules\KanBan\Core\Domain\Model\Product;
use App\Modules\KanBan\Core\Domain\Repository\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{

    public function getProductById($id)
    {
        return Product::where('id', $id)->first();
    }

    public function persist(Product $product)
    {
        $product->save();
    }

    public function listProduct()
    {
        return Product::paginate(10);
    }

    public function deleteProductById($id)
    {
        Product::where('id', $id)->delete();
    }
}
