<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\CreateMenu;


class CreateMenuRequest
{
    private string $name;
    private string $description;
    private int $business_id;

    /**
     * CreateMenuRequest constructor.
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, string $description, int $business_id)
    {
        $this->name = $name;
        $this->description = $description;
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

    /**
     * @return int
     */
    public function getBusinessId(): int
    {
        return $this->business_id;
    }
}
