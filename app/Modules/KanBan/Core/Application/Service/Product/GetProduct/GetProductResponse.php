<?php
namespace App\Modules\KanBan\Core\Application\Service\Product\GetProduct;

use JsonSerializable;

class GetProductResponse implements JsonSerializable
{
    private string $id;
    private string $name;
    private string $description;
    private int $price;
    private string $badge;

    /**
     * GetProductResponse constructor.
     * @param string $id
     * @param string $name
     * @param string $description
     */
    public function __construct(string $id, string $name, int $price, string $description, string $badge)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->badge = $badge;
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

    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    public function getBadge(): string
    {
        return $this->badge;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'badge' => $this->badge,
        ];
    }
}
