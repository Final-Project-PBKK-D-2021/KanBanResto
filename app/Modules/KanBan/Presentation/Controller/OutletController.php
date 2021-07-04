<?php


namespace App\Modules\KanBan\Presentation\Controller;

use App\Http\Requests\CreateOutletFormRequest;
use App\Http\Requests\EditOutletFormRequest;
use App\Modules\KanBan\Core\Domain\Model\Outlet;
use App\Modules\KanBan\Core\Domain\Repository\OutletRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OutletController
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

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($business_id)
    {
        $outlets = $this->outlet_repository->listOutletByBusinessId($business_id);
        return view('KanBan::outlet.index', compact('outlets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('KanBan::outlet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CreateOutletFormRequest $request, $business_id)
    {
        $outlet = new Outlet();
        $outlet->nama_outlet = $request->input('namaOutlet');
        $outlet->alamat_outlet = $request->input('alamatOutlet');
        $outlet->no_telepon_outlet = $request->input('noTelpOutlet');
        $outlet->business_id = $business_id;

        $this->outlet_repository->storeOutlet($outlet);

        return redirect()->route('owner.withBusiness.outlet.index', ['business_id' => request()->route('business_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(Request $request)
    {
        $outlet = $this->outlet_repository->getOutletByOutletId($request->outlet);
        return view('KanBan::outlet.show', compact('outlet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(Request $request)
    {
        $outlet = $this->outlet_repository->getOutletByOutletId($request->outlet);
        return view('KanBan::outlet.edit', compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(EditOutletFormRequest $request)
    {
        $outlet = $this->outlet_repository->getOutletByOutletId($request->outlet);
        $outlet->nama_outlet = $request->input('namaOutlet');
        $outlet->alamat_outlet = $request->input('alamatOutlet');
        $outlet->no_telepon_outlet = $request->input('noTelpOutlet');

        $this->outlet_repository->storeOutlet($outlet);

        return redirect()->route(
            'owner.withBusiness.outlet.index',
            ['business_id' => request()->route('business_id')]
        )->with('status', 'Data Outlet Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($outlet)
	{
		$this->outlet_repository->deleteOutletById($outlet);
		return redirect()->route(
			'owner.withBusiness.outlet.index',
			['business_id' => request()->route('business_id')]
		)->with('status', 'Outlet Berhasil Dihapus');
	}
}
