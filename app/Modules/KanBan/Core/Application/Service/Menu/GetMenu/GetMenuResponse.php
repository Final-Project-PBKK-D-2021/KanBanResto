<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\GetMenu;


use JsonSerializable;

class GetMenuResponse implements JsonSerializable
{
    private string $id;
    private string $name;
    private string $description;
    private array $products;

    /**
     * GetMenuResponse constructor.
     * @param string $id
     * @param string $name
     * @param string $description
     * @param array $products
     */
    public function __construct(string $id, string $name, string $description, array $products)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->products = $products;
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
    public function getProducts(): array
    {
        return $this->products;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'products' => $this->products
        ];
    }
}
