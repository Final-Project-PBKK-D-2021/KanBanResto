<?php

namespace App\Modules\KanBan\Presentation\Controller;

use Illuminate\Http\Request;
use App\Modules\KanBan\Core\Domain\Model\Menu;
use App\Modules\KanBan\Core\Application\Service\Menu\GetMenu\GetMenuRequest;
use App\Modules\KanBan\Core\Application\Service\Menu\GetMenu\GetMenuService;
use App\Modules\KanBan\Core\Application\Service\Menu\ListMenu\ListMenuService;
use App\Modules\KanBan\Core\Application\Service\Product\ListProduct\ListProductService;

class DetailMenuController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $input = new GetMenuRequest($request->menu_id);

        /** @var GetMenuService $service */
        $service = resolve(GetMenuService::class);

        $menu =  $service->execute($input);

        return view('KanBan::detailmenu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
