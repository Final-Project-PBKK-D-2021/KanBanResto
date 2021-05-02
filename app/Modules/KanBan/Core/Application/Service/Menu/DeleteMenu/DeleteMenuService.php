<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\DeleteMenu;


use App\Modules\KanBan\Core\Domain\Repository\MenuRepositoryInterface;

class DeleteMenuService
{
    private MenuRepositoryInterface $menu_repository;

    /**
     * DeleteMenuService constructor.
     * @param MenuRepositoryInterface $menu_repository
     */
    public function __construct(MenuRepositoryInterface $menu_repository)
    {
        $this->menu_repository = $menu_repository;
    }

    public function execute(DeleteMenuRequest $request)
    {
        $this->menu_repository->deleteMenuById($request->getMenuId());
    }
}
