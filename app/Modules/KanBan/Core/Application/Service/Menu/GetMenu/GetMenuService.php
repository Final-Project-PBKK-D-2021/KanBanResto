<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\GetMenu;


use App\Modules\KanBan\Core\Domain\Repository\MenuRepositoryInterface;

class GetMenuService
{
    private MenuRepositoryInterface $menu_repository;

    /**
     * GetMenuService constructor.
     * @param MenuRepositoryInterface $menu_repository
     */
    public function __construct(MenuRepositoryInterface $menu_repository)
    {
        $this->menu_repository = $menu_repository;
    }

    public function execute(GetMenuRequest $request)
    {
        $menu = $this->menu_repository->getMenuById($request->getMenuId());

        return new GetMenuResponse(
            $menu->id,
            $menu->name,
            $menu->description,
            $menu->list_products
        );
    }
}
