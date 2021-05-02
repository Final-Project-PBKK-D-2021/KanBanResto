<?php


namespace App\Modules\KanBan\Core\Application\Service\Product\EditProduct;


class EditProductRequest
{
    private int $id;
    private string $name;
    private int $price;
    private string $description;
    private string $badge;

    /**
     * EditProductRequest constructor.
     * @param int $id
     * @param string $name
     * @param string $description
     */
    public function __construct(int $id, string $name, int $price, string $description, string $badge)
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

    
    public function getPrice(): int
    {
        return $this->price;
    }

    public function getBadge(): string
    {
        return $this->badge;
    }
}
