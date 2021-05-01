<?php


namespace App\Modules\KanBan\Core\Application\Service\Menu\ListMenu;


use App\Modules\KanBan\Core\Domain\Repository\MenuRepositoryInterface;

class ListMenuService
{
    private MenuRepositoryInterface $menu_repository;

    /**
     * GetAllMenuService constructor.
     * @param MenuRepositoryInterface $menu_repository
     */
    public function __construct(MenuRepositoryInterface $menu_repository)
    {
        $this->menu_repository = $menu_repository;
    }

    public function execute (){
        $menus = $this->menu_repository->listMenu();
//        /** @var ListMenuResponse[] $response */
//        $response = [];
//
//        foreach ($menus as $menu){
//            $response[] = new ListMenuResponse(
//                $menu->id,
//                $menu->name,
//                $menu->description ?? '-'
//            );
//        }

        return $menus;
    }
}
