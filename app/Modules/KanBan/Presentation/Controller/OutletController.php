<?php


namespace App\Modules\KanBan\Presentation\Controller;

use App\Http\Requests\CreateOutletFormRequest;
use App\Http\Requests\EditOutletFormRequest;
use App\Modules\KanBan\Core\Domain\Model\Outlet;
use App\Modules\KanBan\Presentation\Controller\OutletRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OutletController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlets = Outlet::all();
        return view('KanBan::outlet.index', compact('outlets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('KanBan::outlet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOutletFormRequest $request, $business_id)
    {

        Outlet::create([
            'nama_outlet' => $request->input('namaOutlet'),
            'alamat_outlet' => $request->input('alamatOutlet'),
            'no_telepon_outlet' => $request->input('noTelpOutlet'),
            'business_id'=>$business_id
        ]);

        return redirect()->route('owner.withBusiness.outlet.index' ,  ['business_id' => request()->route('business_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $outlet = Outlet::where('id', $request->outlet)->first();
        return view('KanBan::outlet.show', compact('outlet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
        $outlet = Outlet::where('id', $request->outlet)->first();
        return view('KanBan::outlet.edit', compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditOutletFormRequest $request)
    {

        $outlet = Outlet::where('id', $request->outlet)
        ->update([
            'nama_outlet' => $request->input('namaOutlet'),
            'alamat_outlet' => $request->input('alamatOutlet'),
            'no_telepon_outlet' => $request->input('noTelpOutlet'),
            'business_id'=>$request->business_id
        ]);

        return redirect()->route('owner.withBusiness.outlet.index' ,['business_id' => request()->route('business_id')])->with('status', 'Data Outlet Berhasil Diubah');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Outlet::where('id', $request->outlet)->delete();
        return redirect()->route('owner.withBusiness.outlet.index' ,['business_id' => request()->route('business_id')])->with('status', 'Outlet Berhasil Dihapus');
    }
}
