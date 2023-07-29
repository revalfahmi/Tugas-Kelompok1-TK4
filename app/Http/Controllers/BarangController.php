<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('pages.barang.index', ['barangs' => $barangs]);
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
        dd($barang);
        return view('pages.barang.index', compact('barang'));
    }

    // public function update(Request $request, $id){
    //     $this->validate($request, [
    //         'nama_barang' => 'required|string|max:155',
    //         'keterangan' => 'required',
    //         'satuan' => 'required'
    //     ]);
    //     $barang = Barang::findOrFail($id);
    //     $barang->update([
    //         'nama_barang' => $barang->nama_barang,
    //         'keterangan' => $barang->keterangan,
    //         'satuan' => $barang->satuan,
    //     ]);
    //     if ($barang) {
    //         return redirect()
    //             ->route('barang.index')
    //             ->with([
    //                 'success' => 'Data berhasil diubah'
    //             ]);
    //     } else {
    //         return redirect()
    //             ->back()
    //             ->withInput()
    //             ->with([
    //                 'error' => 'Data gagal diubah'
    //             ]);
    //     }
    // }

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
