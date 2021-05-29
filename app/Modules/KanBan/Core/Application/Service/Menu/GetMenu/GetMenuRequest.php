<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\GetMenu;


class GetMenuRequest
{
    private int $id;

    /**
     * GetMenuRequest constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getMenuId(): int
    {
        return $this->id;
    }
}
