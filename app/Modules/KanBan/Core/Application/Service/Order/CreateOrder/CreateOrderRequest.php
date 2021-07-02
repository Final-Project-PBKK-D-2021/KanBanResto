<?php


namespace App\Modules\KanBan\Core\Application\Service\Order\CreateOrder;


class CreateOrderRequest
{
    private string $name;
    private int $total_price;
    private int $outlet_id;
    private array $qty;
    private array $id_product;

    /**
     * CreateOrderRequest constructor.
     * @param string $name
     * @param int $total_price
     * @param int $outlet_id
     * @param array $qty
     * @param array $id_product
     */
    public function __construct(string $name, int $total_price, int $outlet_id, array $qty, array $id_product)
    {
        $this->name = $name;
        $this->total_price = $total_price;
        $this->outlet_id = $outlet_id;
        $this->qty = $qty;
        $this->id_product = $id_product;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getTotalPrice(): int
    {
        return $this->total_price;
    }

    /**
     * @return int
     */
    public function getOutletId(): int
    {
        return $this->outlet_id;
    }

    /**
     * @return array
     */
    public function getQty(): array
    {
        return $this->qty;
    }

    /**
     * @return array
     */
    public function getIdProduct(): array
    {
        return $this->id_product;
    }
}
