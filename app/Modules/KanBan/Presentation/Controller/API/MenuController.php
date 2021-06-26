<?php

namespace App\Modules\KanBan\Presentation\Controller\API;

use App\Http\Controllers\Controller;
use App\Modules\KanBan\Core\Application\Service\Menu\CreateMenu\CreateMenuRequest;
use App\Modules\KanBan\Core\Application\Service\Menu\CreateMenu\CreateMenuService;
use App\Modules\KanBan\Core\Application\Service\Menu\DeleteMenu\DeleteMenuRequest;
use App\Modules\KanBan\Core\Application\Service\Menu\DeleteMenu\DeleteMenuService;
use App\Modules\KanBan\Core\Application\Service\Menu\EditMenu\EditMenuRequest;
use App\Modules\KanBan\Core\Application\Service\Menu\EditMenu\EditMenuService;
use App\Modules\KanBan\Core\Application\Service\Menu\GetMenu\GetMenuRequest;
use App\Modules\KanBan\Core\Application\Service\Menu\GetMenu\GetMenuService;
use App\Modules\KanBan\Core\Application\Service\Menu\ListMenu\ListMenuService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function createMenu(Request $request): JsonResponse
    {
        $input = new CreateMenuRequest(
            $request->input('menu_name'),
            $request->input('menu_description'),
            $request->business_id,
            $request->products
        );

        /** @var CreateMenuService $service */
        $service = resolve(CreateMenuService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return $this->failedWithMsg(
                $e->getMessage(),
                $e->getCode()
            );
        }
        return $this->success();
    }

    public function editMenu(Request $request): JsonResponse
    {
        $input = new EditMenuRequest(
            $request->input('menu_id'),
            $request->input('menu_name'),
            $request->input('menu_description'),
            $request->products
        );

        /** @var EditMenuService $service */
        $service = resolve(EditMenuService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return $this->failedWithMsg(
                $e->getMessage(),
                $e->getCode()
            );
        }
        return $this->success();
    }

    public function listMenu(): JsonResponse
    {
        /** @var ListMenuService $service */
        $service = resolve(ListMenuService::class);

        try {
            $response = $service->execute();
        } catch (Throwable $e) {
            return $this->failedWithMsg(
                $e->getMessage(),
                $e->getCode()
            );
        }

        return $this->successWithData($response);
    }

    public function getMenu(Request $request): JsonResponse
    {
        $input = new GetMenuRequest(
            $request->input('menu_id')
        );

        /** @var GetMenuService $service */
        $service = resolve(GetMenuService::class);

        try {
            $response = $service->execute($input);
        } catch (Throwable $e) {
            return $this->failedWithMsg(
                $e->getMessage(),
                $e->getCode()
            );
        }
        return $this->successWithData($response);
    }

    public function deleteMenu(Request $request): JsonResponse
    {
        $input = new DeleteMenuRequest(
            $request->input('menu_id')
        );

        /** @var DeleteMenuService $service */
        $service = resolve(DeleteMenuService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return $this->failedWithMsg(
                $e->getMessage(),
                $e->getCode()
            );
        }
        return $this->success();
    }
}
