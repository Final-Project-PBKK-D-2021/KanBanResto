<?php


namespace App\Modules\KanBan\Presentation\Controller\API;


use App\Http\Controllers\Controller;
use App\Modules\KanBan\Core\Application\Service\Business\CreateBusiness\CreateBusinessRequest;
use App\Modules\KanBan\Core\Application\Service\Business\CreateBusiness\CreateBusinessService;
use App\Modules\KanBan\Core\Application\Service\Business\DeleteBusiness\DeleteBusinessRequest;
use App\Modules\KanBan\Core\Application\Service\Business\DeleteBusiness\DeleteBusinessService;
use App\Modules\KanBan\Core\Application\Service\Business\EditBusiness\EditBusinessRequest;
use App\Modules\KanBan\Core\Application\Service\Business\EditBusiness\EditBusinessService;
use App\Modules\KanBan\Core\Application\Service\Business\GetBusiness\GetBusinessRequest;
use App\Modules\KanBan\Core\Application\Service\Business\GetBusiness\GetBusinessService;
use App\Modules\KanBan\Core\Application\Service\Business\ListBusiness\ListBusinessService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class BusinessController extends Controller
{
    public function createBusiness(Request $request): JsonResponse
    {
        $input = new CreateBusinessRequest(
            $request->input('name'),
            $request->input('description'),
            $request->input('since'),
            $request->user()->name,
            $request->user()->owner_id,
        );

        /** @var CreateBusinessService $service */
        $service = resolve(CreateBusinessService::class);

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

    public function updateBusiness(Request $request): JsonResponse
    {
        $input = new EditBusinessRequest(
            $request->input('business_id'),
            $request->input('name'),
            $request->input('description'),
            $request->input('since'),
            $request->user()->name
        );

        /** @var EditBusinessService $service */
        $service = resolve(EditBusinessService::class);

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

    public function listBusiness(Request $request): JsonResponse
    {
        /** @var ListBusinessService $service */
        $service = resolve(ListBusinessService::class);

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

    public function getBusiness(Request $request): JsonResponse
    {
        $input = new GetBusinessRequest(
            $request->input('business_id')
        );

        /** @var GetBusinessService $service */
        $service = resolve(GetBusinessService::class);

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

    public function deleteBusiness(Request $request): JsonResponse
    {
        $input = new DeleteBusinessRequest(
            $request->input('business_id')
        );

        /** @var DeleteBusinessService $service */
        $service = resolve(DeleteBusinessService::class);

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
