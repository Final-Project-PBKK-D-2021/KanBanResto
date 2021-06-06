<?php


namespace App\Modules\KanBan\Presentation\Controller;


use App\Http\Requests\MenuFormRequest;
use App\Modules\KanBan\Core\Application\Service\Menu\CreateMenu\CreateMenuRequest;
use App\Modules\KanBan\Core\Application\Service\Menu\CreateMenu\CreateMenuService;
use App\Modules\KanBan\Core\Application\Service\Menu\DeleteMenu\DeleteMenuRequest;
use App\Modules\KanBan\Core\Application\Service\Menu\DeleteMenu\DeleteMenuService;
use App\Modules\KanBan\Core\Application\Service\Menu\EditMenu\EditMenuRequest;
use App\Modules\KanBan\Core\Application\Service\Menu\EditMenu\EditMenuService;
use App\Modules\KanBan\Core\Application\Service\Menu\GetMenu\GetMenuRequest;
use App\Modules\KanBan\Core\Application\Service\Menu\GetMenu\GetMenuService;
use App\Modules\KanBan\Core\Application\Service\Menu\ListMenu\ListMenuService;
use App\Modules\KanBan\Core\Application\Service\Product\ListProduct\ListProductService;
use App\Modules\KanBan\Core\Application\Service\QRCode\QRCodeService;
use App\Modules\KanBan\Core\Domain\Service\QRCodeServiceInterface;
use Illuminate\Http\Request;
use Throwable;

class MenuController
{
    public function showCreateMenuForm()
    {
        /** @var ListProductService $service */
        $service = resolve(ListProductService::class);

        $products =  $service->execute();

        return view('KanBan::menu.create', compact('products'));
    }

    public function createMenu(MenuFormRequest $request)
    {
        $input = new CreateMenuRequest(
            $request->input('menu_name'),
            $request->input('menu_description'),
            $request->business_id,
            $request->input('list_products')
        );

        /** @var CreateMenuService $service */
        $service = resolve(CreateMenuService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return redirect()->back()->with('alert', 'Menu Creation Failed');
        }
        return redirect()->route('owner.withBusiness.menu.index', ['business_id' => request()->route('business_id')]);
    }

    public function listMenu(){
        /** @var ListMenuService $service */
        $service = resolve(ListMenuService::class);

        $menus =  $service->execute();

        return view('KanBan::menu.menu_list', compact('menus'));
    }

    public function showEditMenuForm(Request $request){
        $input = new GetMenuRequest($request->menu_id);

        /** @var GetMenuService $service */
        $service = resolve(GetMenuService::class);

        $menu =  $service->execute($input);

        /** @var ListProductService $service */
        $service = resolve(ListProductService::class);

        $products =  $service->execute();

        return view('KanBan::menu.edit', compact('menu', 'products'));
    }

    public function editMenu (MenuFormRequest $request){
        $input = new EditMenuRequest(
            $request->input('menu_id'),
            $request->input('menu_name'),
            $request->input('menu_description'),
            $request->input('list_products'),
        );

        /** @var EditMenuService $service */
        $service = resolve(EditMenuService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return redirect()->back()->with('alert', 'Menu Update Failed');
        }
        return redirect()->route('owner.withBusiness.menu.index', ['business_id' => request()->route('business_id')]);
    }

    public function deleteMenu (Request $request){
        $input = new DeleteMenuRequest(
            $request->menu_id
        );

        /** @var DeleteMenuService $service */
        $service = resolve(DeleteMenuService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return redirect()->back()->with('alert', 'Menu Delete Failed');
        }
        return redirect()->route('owner.withBusiness.menu.index', ['business_id' => request()->route('business_id')]);
    }

    public function qrcode(Request $request) {
        $input = new GetMenuRequest($request->menu_id);

        /** @var GetMenuService $service */
        $service = resolve(GetMenuService::class);

        $menu =  $service->execute($input);

        /** @var QRCodeService $qrService */
        $qrService = resolve(QRCodeServiceInterface::class);

        $qrCode = $qrService->generateMenuQR($menu->getId());

        return view('KanBan::qrcode.qrcode_menu', compact('menu', 'qrCode'));
    }
}
