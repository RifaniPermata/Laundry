<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Outlet;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pakets = Paket::paginate(10);
        return view('main.paket.index',compact('pakets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlets = Outlet::all();
        return view('main.paket.add-paket', compact('outlets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->paketValidation($request);
        Paket::create([
            'outlet_id' => (int) $request->outlet_id,
            'jenis' => $request->jenis,
            'nama_paket' => $request->nama_paket,
            'keterangan' => $request->keterangan,
        ]);
        
        return redirect()->route('paket.index')->with('success', 'Paket baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paket = Paket::find($id);
        $outlets = Outlet::all();
        return view('main.paket.edit', compact('paket','outlets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->paketValidation($request);
        Paket::where('id',$id)->update([
            'outlet_id' => (int) $request->outlet_id,
            'jenis' => $request->jenis,
            'nama_paket' => $request->nama_paket,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('paket.index')->with('update', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paket::destroy($id);
        return redirect()->route('paket.index');
    }

    private function paketValidation($request)
    {
        $validation = $request->validate([
            'outlet_id' => ['required','integer'],
            'jenis' => ['required','string'],
            'nama_paket' => ['required','string'],
            'keterangan' => ['nullable','string'],
        ]);
    }
}
