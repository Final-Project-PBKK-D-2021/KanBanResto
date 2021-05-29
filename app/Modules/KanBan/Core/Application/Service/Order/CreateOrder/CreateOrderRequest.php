<?php


namespace App\Modules\KanBan\Core\Application\Service\Order\CreateOrder;


class CreateOrderRequest
{
    private string $name;
    private int $total_price;

    /**
     * CreateMenuRequest constructor.
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, int $total_price)
    {
        $this->name = $name;
        $this->total_price = $total_price;
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





}
