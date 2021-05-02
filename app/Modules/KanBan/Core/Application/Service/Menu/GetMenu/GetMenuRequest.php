<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\GetMenu;


class GetMenuRequest
{
    private int $menu_id;

    /**
     * GetMenuRequest constructor.
     * @param int $menu_id
     */
    public function __construct(int $menu_id)
    {
        $this->menu_id = $menu_id;
    }

    /**
     * @return int
     */
    public function getMenuId(): int
    {
        return $this->menu_id;
    }
}
