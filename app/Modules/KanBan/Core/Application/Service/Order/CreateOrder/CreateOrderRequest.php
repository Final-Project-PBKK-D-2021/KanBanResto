<?php


namespace App\Modules\KanBan\Core\Application\Service\Order\CreateOrder;


class CreateOrderRequest
{
    private string $name;
    private int $total_price;
    private array $qty;
    private array $id_product;

    /**
     * CreateMenuRequest constructor.
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, int $total_price, array $qty, array $id_product )
    {
        $this->name = $name;
        $this->total_price = $total_price;
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

    public function getTotalPrice(): int
    {
        return $this->total_price;
    }

    public function getQty(): array
    {
        return $this->qty;
    }

    public function getIdProduct(): array
    {
        return $this->id_product;
    }



}
