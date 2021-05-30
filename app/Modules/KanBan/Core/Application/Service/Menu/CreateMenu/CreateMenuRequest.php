<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\CreateMenu;


class CreateMenuRequest
{
    private string $name;
    private string $description;
    private int $business_id;
    private array $list_products;

    /**
     * CreateMenuRequest constructor.
     * @param string $name
     * @param string $description
     * @param int $business_id
     * @param array $list_products
     */
    public function __construct(string $name, string $description, int $business_id, array $list_products)
    {
        $this->name = $name;
        $this->description = $description;
        $this->business_id = $business_id;
        $this->list_products = $list_products;
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
    public function getListProducts(): array
    {
        return $this->list_products;
    }
}
