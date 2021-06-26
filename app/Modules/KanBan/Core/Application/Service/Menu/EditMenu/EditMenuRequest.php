<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\EditMenu;


class EditMenuRequest
{
    private int $id;
    private string $name;
    private string $description;
    private array $products;

    /**
     * EditMenuRequest constructor.
     * @param int $id
     * @param string $name
     * @param string $description
     * @param array $products
     */
    public function __construct(int $id, string $name, string $description, array $products)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->products = $products;
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
    public function getProducts(): array
    {
        return $this->products;
    }
}
