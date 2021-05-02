<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\GetMenu;


class GetMenuResponse
{
    private string $id;
    private string $name;
    private string $description;

    /**
     * GetMenuResponse constructor.
     * @param string $id
     * @param string $name
     * @param string $description
     */
    public function __construct(string $id, string $name, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
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
}
