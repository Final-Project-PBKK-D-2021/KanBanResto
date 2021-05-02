<?php


namespace App\Modules\KanBan\Core\Application\Service\Product\CreateProduct;


class CreateProductRequest
{
    private string $name;
    private string $description;
    private int $price;
    private string $badge;

    /**
     * CreateMenuRequest constructor.
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, int $price, string $description, string $badge)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->badge = $badge;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getBadge(): string
    {
        return $this->badge;
    }




}
