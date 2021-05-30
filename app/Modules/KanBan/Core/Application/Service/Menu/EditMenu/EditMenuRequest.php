<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\EditMenu;


class EditMenuRequest
{
    private int $id;
    private string $name;
    private string $description;
    private array $list_products;

    /**
     * EditMenuRequest constructor.
     * @param int $id
     * @param string $name
     * @param string $description
     * @param array $list_products
     */
    public function __construct(int $id, string $name, string $description, array $list_products)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->list_products = $list_products;
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
    public function getId(): int
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
     * @return array
     */
    public function getListProducts(): array
    {
        return $this->list_products;
    }
}
