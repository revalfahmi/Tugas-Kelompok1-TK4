<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**~
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Pembelian::with('user', 'barang')->get();
        return view('pages.pembelian.index')->with(['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('pages.pembelian.create')->with([
            'barangs'   => $barangs
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idUser = Auth::user()->id;
        $this->validate($request,[
            'id_barang' => 'required',
            'jumlah_pembelian' => 'required',
            'harga_beli' => 'required'
        ]);
        $pembelian = new Pembelian;
        $pembelian->id_user = $idUser;
        $pembelian->id_barang = $request->input('id_barang');
        $pembelian->jumlah_pembelian = $request->input('jumlah_pembelian');
        $pembelian->harga_beli = $request->input('harga_beli');
        $pembelian->save();

        $barang = Barang::where('id', $request['id_barang'])->first();
        $barang['stock'] = $barang['stock'] + $request['jumlah_pembelian'];
        $barang->update();

        if ($pembelian) {
            return redirect()
                ->route('pembelian.index')
                ->with([
                    'success' => 'Data berhasil ditambahkan'
                ]);
        } else {
            return redirect()
                ->route('pembelian.create')
                ->with([
                    'error' => 'Data gagal ditambahkan'
                ]);
        }
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
        $items = Pembelian::with('barang')->findOrFail($id);
        $barangs = Barang::all();

        return view('pages.pembelian.edit')->with([
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
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->validate($request, [
            'harga_beli' => 'required'
        ]);
        $item = Pembelian::with('barang')->findOrFail($id);
        $item->update($data);
        if ($item) {
            return redirect()
                ->route('pembelian.index')
                ->with([
                    'success' => 'Data berhasil diubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data gagal diubah'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->delete(); 
        if ($pembelian) {
            return redirect()
                ->route('pembelian.index')
                ->with([
                    'success' => 'Data berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('pembelian.index')
                ->with([
                    'error' => 'Data gagal dihapus'
                ]);
        }
    }
}
