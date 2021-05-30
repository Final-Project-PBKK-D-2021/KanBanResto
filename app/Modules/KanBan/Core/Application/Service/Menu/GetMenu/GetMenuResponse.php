<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\GetMenu;


class GetMenuResponse
{
    private string $id;
    private string $name;
    private string $description;
    private array $list_products;

    /**
     * GetMenuResponse constructor.
     * @param string $id
     * @param string $name
     * @param string $description
     * @param array $list_products
     */
    public function __construct(string $id, string $name, string $description, array $list_products)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->list_products = $list_products;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
     * @return array
     */
    public function getListProducts(): array
    {
        return $this->list_products;
    }
}
