<?php

namespace App\Modules\KanBan\Presentation\Controller\API;

use App\Http\Controllers\Controller;
use App\Modules\KanBan\Core\Application\Service\Outlet\ListOutlet\ListOutletResponse;
use App\Modules\KanBan\Core\Application\Service\Outlet\GetOutlet\GetOutletResponse;
use App\Modules\KanBan\Core\Domain\Model\Outlet;
use App\Modules\KanBan\Core\Domain\Repository\OutletRepositoryInterface;
use Illuminate\Http\Request;
use Throwable;

class OutletController extends Controller
{
    private OutletRepositoryInterface $outlet_repository;

    /**
     * OutletController constructor.
     * @param OutletRepositoryInterface $outlet_repository
     */
    public function __construct(OutletRepositoryInterface $outlet_repository)
    {
        $this->outlet_repository = $outlet_repository;
    }

    public function list_outlet(Request $request)
    {
        try {
            $outlets = $this->outlet_repository->listOutlet();

            $response = [];
            foreach ($outlets as $outlet) {
                $response[] = new ListOutletResponse(
                    $outlet->nama_outlet,
                    $outlet->alamat_outlet,
                    $outlet->no_telepon_outlet,
                    $outlet->business_id
                );
            }
        } catch (Throwable $e) {
            return $this->failedWithMsg(
                $e->getMessage(),
                $e->getCode()
            );
        }

        return $this->successWithData($response);
    }

    public function update_outlet(Request $request)
    {
        try {
            $outlet = $this->outlet_repository->getOutletByOutletId( $request->input('outletID'));
            $outlet->nama_outlet = $request->input('namaOutlet');
            $outlet->alamat_outlet = $request->input('alamatOutlet');
            $outlet->no_telepon_outlet = $request->input('noTelpOutlet');
            $outlet->business_id = $request->input('business_id');

            $this->outlet_repository->storeOutlet($outlet);
        } catch (Throwable $e) {
            return $this->failedWithMsg(
                $e->getMessage(),
                $e->getCode()
            );
        }

        return $this->success();
    }

    public function delete_outlet(Request $request)
    {
        try {
            $this->outlet_repository->deleteOutletById($request->input('outletID'));
        } catch (Throwable $e) {
            return $this->failedWithMsg(
                $e->getMessage(),
                $e->getCode()
            );
        }

        return $this->success();

    }

    public function get_outlet(Request $request)
    {
        try {
            $outlet = $this->outlet_repository->getOutletByOutletId( $request->input('outletID'));

            $response = [];
            $response[] = new GetOutletResponse(
                $outlet->id,
                $outlet->nama_outlet,
                $outlet->alamat_outlet,
                $outlet->no_telepon_outlet,
                $outlet->business_id
            );
            
           
        } catch (Throwable $e) {
            return $this->failedWithMsg(
                $e->getMessage(),
                $e->getCode()
            );
        }

        return $this->successWithData($response);

    }

    public function create_outlet(Request $request)
    {
        try {
            $outlet = new Outlet();
            $outlet->nama_outlet = $request->input('namaOutlet');
            $outlet->alamat_outlet = $request->input('alamatOutlet');
            $outlet->no_telepon_outlet = $request->input('noTelpOutlet');
            $outlet->business_id = $request->input('business_id');

            $this->outlet_repository->storeOutlet($outlet);
        } catch (Throwable $e) {
            return $this->failedWithMsg(
                $e->getMessage(),
                $e->getCode()
            );
        }

        return $this->success();
    }
}