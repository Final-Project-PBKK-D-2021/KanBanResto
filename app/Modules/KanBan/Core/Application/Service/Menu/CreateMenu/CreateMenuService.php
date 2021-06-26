<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\CreateMenu;


use App\Modules\KanBan\Core\Domain\Model\Menu;
use App\Modules\KanBan\Core\Domain\Model\MenuProduct;
use App\Modules\KanBan\Core\Domain\Repository\MenuRepositoryInterface;

class CreateMenuService
{
    private MenuRepositoryInterface $menu_repository;

    /**
     * CreateMenuService constructor.
     * @param MenuRepositoryInterface $menu_repository
     */
    public function __construct(MenuRepositoryInterface $menu_repository)
    {
        $this->menu_repository = $menu_repository;
    }

    public function execute(CreateMenuRequest $request)
    {
        $menu = new Menu();

        $menu->name = $request->getName();
        $menu->description = $request->getDescription();
        $menu->business_id = $request->getBusinessId();

        $product_ids = $request->getProducts();

        $this->menu_repository->persist($menu, $product_ids);
    }
}
