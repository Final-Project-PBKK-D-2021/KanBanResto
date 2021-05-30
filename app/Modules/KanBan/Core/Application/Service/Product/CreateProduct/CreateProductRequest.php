<?php


namespace App\Modules\KanBan\Core\Application\Service\Product\CreateProduct;


class CreateProductRequest
{
    private string $name;
    private string $description;
    private int $price;
    private string $badge;
    private int $business_id;
    /**
     * CreateMenuRequest constructor.
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, int $price, string $description, string $badge, int $business_id)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->badge = $badge;
        $this->business_id = $business_id;
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

    public function getBusinessId(): int
    {
        return $this->business_id;
    }





}
