<?php


namespace App\Modules\KanBan\Presentation\Controller;


use App\Modules\KanBan\Core\Application\Service\Menu\CreateMenu\CreateMenuRequest;
use App\Modules\KanBan\Core\Application\Service\Menu\CreateMenu\CreateMenuService;
use App\Modules\KanBan\Core\Application\Service\Menu\DeleteMenu\DeleteMenuRequest;
use App\Modules\KanBan\Core\Application\Service\Menu\DeleteMenu\DeleteMenuService;
use App\Modules\KanBan\Core\Application\Service\Menu\EditMenu\EditMenuRequest;
use App\Modules\KanBan\Core\Application\Service\Menu\EditMenu\EditMenuService;
use App\Modules\KanBan\Core\Application\Service\Menu\GetMenu\GetMenuRequest;
use App\Modules\KanBan\Core\Application\Service\Menu\GetMenu\GetMenuService;
use App\Modules\KanBan\Core\Application\Service\Menu\ListMenu\ListMenuService;
use Illuminate\Http\Request;
use Throwable;

class MenuController
{
    public function showCreateMenuForm()
    {
        return view('KanBan::menu.create_menu_form');
    }

    public function createMenu(Request $request)
    {
        $request->validate(
            [
                'menu_name' => 'required|max:255',
                'menu_description' => 'required'
            ]
        );

        $input = new CreateMenuRequest(
            $request->input('menu_name'),
            $request->input('menu_description'),
        );

        /** @var CreateMenuService $service */
        $service = resolve(CreateMenuService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return redirect()->back()->with('alert', 'Menu Creation Failed');
        }
        return redirect()->route('owner.withBusiness.menu..index');
    }

    public function listMenu(){
        /** @var ListMenuService $service */
        $service = resolve(ListMenuService::class);

        $menus =  $service->execute();

        return view('KanBan::menu.menu_list', compact('menus'));
    }

    public function showEditMenuForm(int $menu_id){
        $input = new GetMenuRequest($menu_id);

        /** @var GetMenuService $service */
        $service = resolve(GetMenuService::class);

        $menu =  $service->execute($input);

        return view('KanBan::menu.edit_menu_form', compact('menu'));
    }

    public function editMenu (int $menu_id, Request $request){
        $request->validate(
            [
                'menu_name' => 'required|max:255',
                'menu_description' => 'required'
            ]
        );

        $input = new EditMenuRequest(
            $menu_id,
            $request->input('menu_name'),
            $request->input('menu_description'),
        );

        /** @var EditMenuService $service */
        $service = resolve(EditMenuService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return redirect()->back()->with('alert', 'Menu Update Failed');
        }
        return redirect()->route('owner.withBusiness.menu..index');
    }

    public function deleteMenu (int $menu_id){
        $input = new DeleteMenuRequest(
            $menu_id
        );

        /** @var DeleteMenuService $service */
        $service = resolve(DeleteMenuService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return redirect()->back()->with('alert', 'Menu Delete Failed');
        }
        return redirect()->route('owner.withBusiness.menu..index');
    }
}
