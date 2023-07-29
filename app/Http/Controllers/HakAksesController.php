<?php

namespace App\Http\Controllers;

use App\Http\Requests\HakAksesRequest;
use App\Models\HakAkses;
use Illuminate\Http\Request;

class HakAksesController extends Controller
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
        $items = HakAkses::all();

        return view('pages.hakakses.index')->with([
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
        return view('pages.hakakses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HakAksesRequest $request)
    {
        $data = $request->all();
        
        HakAkses::create($data);
        return redirect()->route('hak-akses.index');
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
        $item = HakAkses::findOrFail($id);

        return view('pages.hakakses.edit')->with([
            'item'  => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HakAksesRequest $request, $id)
    {
        $data = $request->all();

        $item = HakAkses::findOrFail($id);
        $item->update($data);

        return redirect()->route('hak-akses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = HakAkses::findOrFail($id);
        $item->delete();

        return redirect()->route('hak-akses.index');
    }
}
