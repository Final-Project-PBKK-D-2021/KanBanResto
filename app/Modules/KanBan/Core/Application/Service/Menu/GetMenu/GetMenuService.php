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
        $menu_products = $this->menu_repository->getListProductById($request->getMenuId());
        $menu_product_ids = array();

        foreach ($menu_products as $menu_product) {
            $menu_product_ids[] = $menu_product->product_id;
        }

        return new GetMenuResponse(
            $menu->id,
            $menu->name,
            $menu->description,
            $menu_product_ids
        );
    }
}
