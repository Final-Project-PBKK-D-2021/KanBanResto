<?php


namespace App\Modules\KanBan\Presentation\Controller;


use App\Http\Requests\ProductFormRequest;
use App\Modules\KanBan\Core\Application\Service\Product\CreateProduct\CreateProductRequest;
use App\Modules\KanBan\Core\Application\Service\Product\CreateProduct\CreateProductService;
use App\Modules\KanBan\Core\Application\Service\Product\DeleteProduct\DeleteProductRequest;
use App\Modules\KanBan\Core\Application\Service\Product\DeleteProduct\DeleteProductService;
use App\Modules\KanBan\Core\Application\Service\Product\EditProduct\EditProductRequest;
use App\Modules\KanBan\Core\Application\Service\Product\EditProduct\EditProductService;
use App\Modules\KanBan\Core\Application\Service\Product\GetProduct\GetProductRequest;
use App\Modules\KanBan\Core\Application\Service\Product\GetProduct\GetProductService;
use App\Modules\KanBan\Core\Application\Service\Product\ListProduct\ListProductService;
use Illuminate\Http\Request;
use Throwable;

class ProductController
{
    public function showCreateProductForm()
    {
        return view('KanBan::product.create');
    }

    public function createProduct(ProductFormRequest $request, $business_id)
    {
        $input = new CreateProductRequest(
            $request->input('product_name'),
            $request->input('product_price'),
            $request->input('product_description'),
            $request->input('product_badge'),
            $business_id
        );

        /** @var CreateProductService $service */
        $service = resolve(CreateProductService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return redirect()->back()->with('alert', 'Product Creation Failed');
        }
        return redirect()->route(
            'owner.withBusiness.product.index',
            ['business_id' => request()->route('business_id')]
        );
    }

    public function listProduct($business_id)
    {
        /** @var ListProductService $service */
        $service = resolve(ListProductService::class);

        $products = $service->execute($business_id);

        return view('KanBan::product.index', compact('products'));
    }

    public function showEditProductForm(int $business_id, int $product_id)
	{
		$input = new GetProductRequest($product_id);

		/** @var GetProductService $service */
		$service = resolve(GetProductService::class);

		$product = $service->execute($input);

		return view('KanBan::product.edit', compact('product'));
	}

	public function editProduct(int $business_id, int $product_id, Request $request)
	{
		$request->validate(
			[
				'product_name' => 'required|max:255',
				'product_price' => 'required',
				'product_description' => 'required',
				'product_badge' => 'nullable'
			]
		);

		$input = new EditProductRequest(
            $product_id,
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
			return redirect()->back()->with('alert', 'Product Update Failed');
		}
		return redirect()->route(
			'owner.withBusiness.product.index',
			['business_id' => request()->route('business_id')]
		);
	}

	public function deleteProduct(int $business_id, int $product_id)
	{
		$input = new DeleteProductRequest(
			$product_id
		);

		/** @var DeleteProductService $service */
		$service = resolve(DeleteProductService::class);

		try {
			$service->execute($input);
		} catch (Throwable $e) {
            return redirect()->back()->with('alert', 'Product Delete Failed');
        }
		return redirect()->route(
			'owner.withBusiness.product.index',
			['business_id' => request()->route('business_id')]
		);
    }
}
