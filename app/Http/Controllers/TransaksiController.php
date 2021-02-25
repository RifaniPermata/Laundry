<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Outlet;
use App\Models\Member;
use App\Models\Paket;

class TransaksiController extends Controller
{

    private $kodeInvoice;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin:admin,kasir');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::orderBy('status','ASC')->where('status','<>','selesai')->paginate(10);
        return view('main.transaksi.index',compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlets = Outlet::get();
        $members = Member::orderBy('nama')->get();
        $pakets = Paket::get();
        return view('main.transaksi.add-transaksi', compact('outlets', 'members','pakets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->transaksiValidation($request);
        $this->createInvoice();
        $paket = Paket::where('id', $request->paket_id)->first();
        $biaya = $paket->biaya + ((int) $request->diskon * $paket->biaya / 100) - ((int) $request->pajak * $paket->biaya / 100);
        Transaksi::create([
            'outlet_id' => (int) $request->outlet_id,
            'member_id' => (int) $request->member_id,
            'paket_id' => (int) $request->paket_id,
            'user_id' => auth()->user()->id,
            'kode_invoice' => $this->kodeInvoice,
            'batas_waktu' => now(),
            'tgl_bayar' => now(),
            'biaya_tambahan' => (int) $request->biaya_tambahan,
            'diskon' => (int) $request->diskon,
            'total' => $biaya,
            'pajak' => (int) $request->pajak,
            'status' => $request->status,
            'dibayar' => $request->dibayar,
        ]);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi baru berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        $members = Member::orderBy('nama')->get();
        $outlets = Outlet::all();
        $pakets = Paket::all();
        return view('main.transaksi.edit', compact('transaksi', 'members', 'outlets','pakets'));
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
        $this->transaksiValidation($request);
        $paket = Paket::where('id', $request->paket_id)->first();
        $biaya = $paket->biaya + ((int) $request->diskon * $paket->biaya / 100) - ((int) $request->pajak * $paket->biaya / 100);
        Transaksi::where('id', $id)->update([
            'paket_id' => (int) $request->paket_id,
            'batas_waktu' => now(),
            'tgl_bayar' => now(),
            'biaya_tambahan' => (int)$request->biaya_tambahan,
            'diskon' => (int) $request->diskon,
            'total' => $biaya,
            'pajak' => (int)$request->pajak,
            'status' => $request->status,
            'dibayar' => $request->dibayar,
        ]);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaksi::destroy($id);
        return redirect()->route('transaksi.index');
    }

    private function transaksiValidation($request)
    {
        $validation = $request->validate([
            'outlet_id' => ['required'],
            'member_id' => ['required'],
            'paket_id' => ['required'],
            'biaya_tambahan' => ['integer'],
            'diskon' => ['integer'],
            'pajak' => ['integer'],
            'status' => ['required','string'],
            'dibayar' => ['required','string'],
        ]);
    }

    private function createInvoice()
    {
        $this->kodeInvoice .= \Carbon\Carbon::now()->format('m');
        $this->kodeInvoice .= "/";
        $this->kodeInvoice .= \Carbon\Carbon::now()->format('y');
        $this->kodeInvoice .= "/";
        $this->kodeInvoice .= auth()->user()->kode;
        $this->kodeInvoice .= "/";
        $this->kodeInvoice .= Transaksi::count() + 1;
    }

        public function trash()
    {
        $transaksis = Transaksi::onlyTrashed()->paginate(10);
        return view('main.transaksi.trash', compact('transaksis'));
    }

    public function forceDelete($id)
    {
        $transaksi = Transaksi::withTrashed()->where('id', $id);

        $transaksi->forceDelete();
        return redirect()->route('transaksi.trash');
    }
    public function forceDeleteAll()
    {
        $transaksis = Transaksi::onlyTrashed()->get();
        if (!$transaksis->first->id) {
            return redirect()->route('transaksi.trash')->with('error', 'Tidak ada data dalam sampah');
        }
        foreach ($transaksis as $transaksi) {
            $transaksi->where('id', $transaksi->id)->forceDelete();
        }
        return redirect()->route('transaksi.trash');
    }

    public function restore($id)
    {
        Transaksi::withTrashed()->where('id', $id)->restore();
        return redirect()->route('transaksi.trash')->with('restore', 'Data berhasil dipulihkan');
    }
}
