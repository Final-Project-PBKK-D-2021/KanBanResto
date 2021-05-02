<?php


namespace App\Modules\KanBan\Presentation\Controller;


use App\Modules\KanBan\Core\Application\Service\Product\CreateProduct\CreateProductRequest;
use App\Modules\KanBan\Core\Application\Service\Product\CreateProduct\CreateProductService;
use App\Modules\KanBan\Core\Application\Service\Product\DeleteProduct\DeleteProductRequest;
use App\Modules\KanBan\Core\Application\Service\Product\DeleteProduct\DeleteProductService;
use App\Modules\KanBan\Core\Application\Service\Product\EditProduct\EditProductRequest;
use App\Modules\KanBan\Core\Application\Service\Product\EditProduct\EditProductService;
use App\Modules\KanBan\Core\Application\Service\Product\GetProduct\GetProductRequest;
use App\Modules\KanBan\Core\Application\Service\Product\GetProduct\GetProductService;
use App\Modules\KanBan\Core\Application\Service\Product\ListProduct\ListProductService;
use App\Modules\Shared\Mechanism\UnitOfWork;
use Illuminate\Http\Request;
use Throwable;

class ProductController
{
    private UnitOfWork $unit_of_work;

    /**
     * ProductController constructor.
     * @param UnitOfWork $unit_of_work
     */
    public function __construct(UnitOfWork $unit_of_work)
    {
        $this->unit_of_work = $unit_of_work;
    }

    public function showCreateProductForm()
    {
        return view('KanBan::product.create_product_form');
    }

    public function createProduct(Request $request)
    {
        $request->validate(
            [
                'product_name' => 'required|max:255',
                'product_price' => 'required',
                'product_description' => 'required',
                'product_badge' => 'nullable'
            ]
        );

        $input = new CreateProductRequest(
            $request->input('product_name'),
            $request->input('product_price'),
            $request->input('product_description'),
            $request->input('product_badge')
        );

        /** @var CreateProductService $service */
        $service = resolve(CreateProductService::class);
        $this->unit_of_work->begin();

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            $this->unit_of_work->rollback();
            return redirect()->back()->with('alert', 'Product Creation Failed');
        }
        $this->unit_of_work->commit();
        return redirect()->route('product.index');
    }

    public function listProduct(){
        /** @var ListProductService $service */
        $service = resolve(ListProductService::class);

        $products =  $service->execute();

        return view('KanBan::product.product_list', compact('products'));
    }

    public function showEditProductForm(int $product_id){
        $input = new GetProductRequest($product_id);

        /** @var GetProductService $service */
        $service = resolve(GetProductService::class);

        $product =  $service->execute($input);

        return view('KanBan::product.edit_product_form', compact('product'));
    }

    public function editProduct (int $product_id, Request $request){
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
        $this->unit_of_work->begin();

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            $this->unit_of_work->rollback();
            return redirect()->back()->with('alert', 'Product Update Failed');
        }
        $this->unit_of_work->commit();
        return redirect()->route('product.index');
    }

    public function deleteProduct (int $product_id){
        $input = new DeleteProductRequest(
            $product_id
        );

        /** @var DeleteProductService $service */
        $service = resolve(DeleteProductService::class);
        $this->unit_of_work->begin();

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            $this->unit_of_work->rollback();
            return redirect()->back()->with('alert', 'Product Delete Failed');
        }
        $this->unit_of_work->commit();
        return redirect()->route('product.index');
    }
}
