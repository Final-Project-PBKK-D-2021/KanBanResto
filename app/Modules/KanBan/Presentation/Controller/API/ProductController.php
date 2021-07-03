<?php

namespace App\Modules\KanBan\Presentation\Controller\API;

use App\Http\Controllers\Controller;
use App\Modules\KanBan\Core\Application\Service\Product\CreateProduct\CreateProductRequest;
use App\Modules\KanBan\Core\Application\Service\Product\CreateProduct\CreateProductService;
use App\Modules\KanBan\Core\Application\Service\Product\DeleteProduct\DeleteProductRequest;
use App\Modules\KanBan\Core\Application\Service\Product\DeleteProduct\DeleteProductService;
use App\Modules\KanBan\Core\Application\Service\Product\EditProduct\EditProductRequest;
use App\Modules\KanBan\Core\Application\Service\Product\EditProduct\EditProductService;
use App\Modules\KanBan\Core\Application\Service\Product\GetProduct\GetProductRequest;
use App\Modules\KanBan\Core\Application\Service\Product\GetProduct\GetProductService;
use App\Modules\KanBan\Core\Application\Service\Product\ListProduct\ListProductService;
// use App\Modules\KanBan\Core\Application\Service\Product\ListProduct\ListProductResponse;
use App\Modules\KanBan\Core\Application\Service\Product\GetProduct\GetProductResponse;
use App\Modules\KanBan\Core\Domain\Model\Product;
use App\Modules\KanBan\Core\Domain\Repository\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Throwable;

class ProductController extends Controller
{
    public function createProduct(Request $request): JsonResponse
    {
        $input = new CreateProductRequest(
            $request->input('product_name'),
            $request->input('product_price'),
            $request->input('product_description'),
            $request->input('product_badge'),
            $request->input('Product_id')
        );

        /** @var CreateProductService $service */
        $service = resolve(CreateProductService::class);

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

    public function updateProduct(Request $request): JsonResponse
    {
        $input = new EditProductRequest(
            $request->input('product_id'),
            $request->input('product_name'),
            $request->input('product_price'),
            $request->input('product_description'),
            $request->input('product_badge')
        );

        /** @var EditProductService $service */
        $service = resolve(EditProductService::class);

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

    public function listProduct(Request $request): JsonResponse
    {
        /** @var ListProductService $service */
        $service = resolve(ListProductService::class);

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

    public function getProduct(Request $request): JsonResponse
    {
        $input = new GetProductRequest(
            $request->input('product_id')
        );

        /** @var GetProductService $service */
        $service = resolve(GetProductService::class);

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

    public function deleteProduct(Request $request): JsonResponse
    {
        $input = new DeleteProductRequest(
            $request->input('product_id')
        );

        /** @var DeleteProductService $service */
        $service = resolve(DeleteProductService::class);

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