@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
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
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Penjualan</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <th>#</th>
                                    <th>Jumlah Penjualan</th>
                                    <th>Harga Jual</th>
                                    <th>User</th>
                                    <th>Barang</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @forelse ($items as $item)
                                    <?php $no++ ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->jumlah_penjualan }}</td>
                                        <td>{{ $item->harga_jual }}</td>
                                        <td>{{ $item->user->nama_pengguna }}</td>
                                        <td>{{ $item->barang->nama_barang }}</td>
                                        <td>
                                            <a href="{{ route('penjualan.edit', $item->id) }}" class="href btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('penjualan.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Data not found.
                                            </td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection