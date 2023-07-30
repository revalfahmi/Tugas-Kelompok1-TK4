@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title inline-block">Data Pembelian Barang</h4>
            </div>
            <div class="card-body--">
                <div class="table-stats order-table ov-h">
                    <table id="tableItem" class="table">
                        <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th>Pengguna</th>
                                <th>Pembelian</th>
                                <th>Jumlah Pembelian</th>
                                <th>Harga Beli</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td class="serial">{{$loop->iteration}}</th>
                                <td>{{$item->user->nama_pengguna}}</td>
                                <td>{{$item->barang->nama_barang}}</td>
                                <td>{{$item->jumlah_pembelian}}</td>
                                <td>{{$item->harga_beli}}</td>
                                <td class="text-center">
                                    <a class="href btn btn-primary btn-sm"
                                        href="{{ route('pembelian.edit', $item->id) }}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('pembelian.destroy', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <td colspan="6" class="text-center">Tidak ada data yang tersedia</td>
                            @endforelse
                        </tbody>
                    </table>
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection