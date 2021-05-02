<?php


namespace App\Modules\KanBan\Presentation\Controller;

use Illuminate\Http\Request;
use App\Modules\KanBan\Core\Domain\Model\Outlet;

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
    public function store(Request $request)
    {
        //return $request;
        $request->validate([
            'namaOutlet' => 'required',
            'alamatOutlet' => 'required',
            'noTelpOutlet' => 'required'
        ]);
        
        Outlet::create([
            'nama_outlet' => $request->input('namaOutlet'),
            'alamat_outlet' => $request->input('alamatOutlet'),
            'no_telepon_outlet' => $request->input('noTelpOutlet')
        ]);

        return redirect('/outlet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        return view('KanBan::outlet.show', compact('outlet'));;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlet $outlet)
    {
        return view('KanBan::outlet.edit', compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
        $request->validate([
            'namaOutlet' => 'required',
            'alamatOutlet' => 'required',
            'noTelpOutlet' => 'required'
        ]);

        Outlet::where('id', $outlet->id)
                ->update([
                    'nama_outlet' => $request->input('namaOutlet'),
                    'alamat_outlet' => $request->input('alamatOutlet'),
                    'no_telepon_outlet' => $request->input('noTelpOutlet')
                ]);
        
        return redirect('/outlet')->with('status', 'Data Outlet Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        Outlet::destroy($outlet->id);
        return redirect('/outlet')->with('status', 'Outlet Berhasil Dihapus');
    }
}
