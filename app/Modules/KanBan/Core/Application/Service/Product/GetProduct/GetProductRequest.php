<?php


namespace App\Modules\KanBan\Core\Application\Service\Product\GetProduct;


class GetProductRequest
{
    private int $product_id;

    /**
     * GetProductRequest constructor.
     * @param int $Product_id
     */
    public function __construct(int $product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->product_id;
    }
}
