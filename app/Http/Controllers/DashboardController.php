<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $income = Penjualan::where('deleted_at', null)->sum('harga_jual');
        $sales = Penjualan::count();
        $pie = [
            'salesupto10'       => Penjualan::where('jumlah_penjualan', '>', 10)->count(),
            'buyOverBudget'     => Pembelian::where('harga_beli', '>', 1000000)->count(),
            'stockIsRunningLow' => Barang::where('stock', '<', 5)->count()
        ];
        return view('pages.dashboard')->with([
            'income'    => $income,
            'sales'     => $sales,
            'pie'       => $pie
        ]);
    }
}
