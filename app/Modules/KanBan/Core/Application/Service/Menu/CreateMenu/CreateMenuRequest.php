<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\CreateMenu;


class CreateMenuRequest
{
    private string $name;
    private string $description;
    private int $business_id;
    private array $products;

    /**
     * CreateMenuRequest constructor.
     * @param string $name
     * @param string $description
     * @param int $business_id
     * @param array $products
     */
    public function __construct(string $name, string $description, int $business_id, array $products)
    {
        $this->name = $name;
        $this->description = $description;
        $this->business_id = $business_id;
        $this->products = $products;
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

    /**
     * @return int
     */
    public function getBusinessId(): int
    {
        return $this->business_id;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }
}
