<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $barangs = Barang::all();
        return view('pages.barang.index', ['barangs' => $barangs]);
    }
    
    public function create()
    {
        return view('pages.barang.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_barang' => 'required',
            'keterangan' => 'required',
            'satuan' => 'required',
        ]);
        $barang = new Barang;
        $barang->nama_barang = $request->input('nama_barang');
        $barang->keterangan = $request->input('keterangan');
        $barang->satuan = $request->input('satuan');
        $barang->stock = $request->input('stock');
        $barang->save();
        if ($barang) {
            return redirect()
                ->route('barang.index')
                ->with([
                    'success' => 'Data berhasil ditambahkan'
                ]);
        } else {
            return redirect()
                ->route('barang.index')
                ->with([
                    'error' => 'Data gagal ditambahkan'
                ]);
        }
    }

    public function edit($id){
        $barang = Barang::findOrFail($id);
        return view('pages.barang.edit', compact('barang'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'nama_barang' => 'required|string|max:155',
            'keterangan' => 'required',
            'satuan' => 'required',
            'stock' => 'required'
        ]);
        $barang = Barang::findOrFail($id);
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'keterangan' => $request->keterangan,
            'satuan' => $request->satuan,
            'stock' => $request->stock
        ]);
        if ($barang) {
            return redirect()
                ->route('barang.index')
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

    public function destroy($id){
        $barang = Barang::find($id);
        $barang->delete(); 
        if ($barang) {
            return redirect()
                ->route('barang.index')
                ->with([
                    'success' => 'Data berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('barang.index')
                ->with([
                    'error' => 'Data gagal dihapus'
                ]);
        }
    }
}
