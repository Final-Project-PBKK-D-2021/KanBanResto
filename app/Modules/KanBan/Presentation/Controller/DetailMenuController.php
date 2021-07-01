<?php

namespace App\Modules\KanBan\Presentation\Controller;

use App\Modules\KanBan\Core\Application\Service\Menu\GetMenu\GetMenuRequest;
use App\Modules\KanBan\Core\Application\Service\Menu\GetMenu\GetMenuService;
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

        $menu =  $service->execute($input);

        return view('KanBan::detailmenu.show', compact('menu'));
    }
}
