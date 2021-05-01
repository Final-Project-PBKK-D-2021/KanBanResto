<?php


namespace App\Modules\KanBan\Core\Application\Service\Product\DeleteProduct;


class DeleteProductRequest
{
    private int $product_id;

    /**
     * DeleteProductRequest constructor.
     * @param int $Product_id
     */
    public function __construct(int $Product_id)
    {
        $this->Product_id = $Product_id;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->Product_id;
    }
}

