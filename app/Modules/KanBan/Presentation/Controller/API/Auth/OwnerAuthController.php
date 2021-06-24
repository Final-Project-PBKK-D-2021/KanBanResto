<?php


namespace App\Modules\KanBan\Presentation\Controller\API\Auth;

use App\Http\Controllers\Controller;
use App\Modules\KanBan\Core\Application\Service\API\Owner\OwnerLogin\OwnerLoginRequest;
use App\Modules\KanBan\Core\Application\Service\API\Owner\OwnerLogin\OwnerLoginService;
use App\Modules\KanBan\Core\Application\Service\API\Owner\OwnerRegister\OwnerRegisterRequest;
use App\Modules\KanBan\Core\Application\Service\API\Owner\OwnerRegister\OwnerRegisterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;

class OwnerAuthController extends Controller
{
    public function authenticate(Request $request): JsonResponse
    {
        $input = new OwnerLoginRequest(
            $request->input('email'),
            $request->input('password')
        );

        /** @var OwnerLoginService $service */
        $service = resolve(OwnerLoginService::class);

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

    public function register(Request $request): JsonResponse
    {
        $input = new OwnerRegisterRequest(
            $request->input('name'),
            $request->input('email'),
            Hash::make($request->input('password'))
        );

        /** @var OwnerRegisterService $service */
        $service = resolve(OwnerRegisterService::class);

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
