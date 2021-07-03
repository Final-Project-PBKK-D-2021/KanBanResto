<?php

namespace App\Modules\KanBan\Presentation\Controller;

use App\Modules\KanBan\Core\Application\Service\Menu\GetMenu\GetMenuRequest;
use App\Modules\KanBan\Core\Application\Service\Menu\GetMenu\GetMenuService;
use App\Modules\KanBan\Core\Application\Service\Product\ListProduct\ListProductService;
use App\Modules\KanBan\Core\Application\Service\Menu\ListMenu\ListMenuService;
use App\Modules\KanBan\Core\Domain\Model\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DetailMenuController
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */

    public function show(Request $request)
    {
        $input = new GetMenuRequest($request->menu_id);

        /** @var GetMenuService $service */
        $service = resolve(GetMenuService::class);

        $menu = Menu::where('id', $request->menu_id)->first();
        //dd($menu->products());

        return view('KanBan::detailmenu.show', compact('menu'));
    }

}
