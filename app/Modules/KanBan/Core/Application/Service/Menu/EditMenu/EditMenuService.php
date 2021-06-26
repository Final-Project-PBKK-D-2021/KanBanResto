<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\EditMenu;


use App\Modules\KanBan\Core\Domain\Repository\MenuRepositoryInterface;

class EditMenuService
{
    private MenuRepositoryInterface $menu_repository;

    /**
     * EditMenuService constructor.
     * @param MenuRepositoryInterface $menu_repository
     */
    public function __construct(MenuRepositoryInterface $menu_repository)
    {
        $this->menu_repository = $menu_repository;
    }

    public function execute (EditMenuRequest $request)
    {
        $menu = $this->menu_repository->getMenuById($request->getId());
        $this->menu_repository->resetMenuProductById($request->getId());

        $menu->name = $request->getName();
        $menu->description = $request->getDescription();

        $product_ids = $request->getProducts();

        $this->menu_repository->persist($menu, $product_ids);
    }
}
