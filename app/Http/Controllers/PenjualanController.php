<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenjualanRequest;
use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Penjualan::with('user', 'barang')->get();

        return view('pages.penjualan.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barang::all();

        return view('pages.penjualan.create')->with([
            'barangs'   => $barangs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenjualanRequest $request)
    {
        $idUser = Auth::user()->id;
        $data = $request->all();
        $cekStock = Barang::where('id', $data['id_barang'])->value('stock');

        if ($cekStock < (int)$data['jumlah_penjualan'])
        {
            return abort(403, 'Stock barang tidak mencukupi');
        }

        Penjualan::create([
            'jumlah_penjualan'  => $data['jumlah_penjualan'],
            'harga_jual'        => $data['harga_jual'],
            'id_user'           => $idUser,
            'id_barang'         => $data['id_barang']
        ]);

        return redirect()->route('penjualan.index');
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
        $items = Penjualan::with('barang')->findOrFail($id);
        $barangs = Barang::all();

        return view('pages.penjualan.edit')->with([
            'items' => $items,
            'barangs' => $barangs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PenjualanRequest $request, $id)
    {
        $item = Penjualan::
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Penjualan::findOrFail($id);
        $item->delete();

        return redirect()->route('penjualan.index');
    }
}
