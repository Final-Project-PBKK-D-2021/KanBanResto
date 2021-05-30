<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\CreateMenu;


use App\Modules\KanBan\Core\Domain\Model\Menu;
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
        $menu = Menu::create(
            [
                'name' => $request->getName(),
                'description' => $request->getDescription(),
                'business_id' => $request->getBusinessId(),
                'list_products' => $request->getListProducts()
            ]
        );

        $this->menu_repository->persist($menu);
    }
}
