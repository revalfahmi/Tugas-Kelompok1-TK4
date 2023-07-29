@extends('layouts.default')
@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="box-title inline-block">Data Barang</h4>
      </div>
      <div class="card-body--">
        <div class="table-stats order-table ov-h">
          <table id="tableItem" class="table">
            <thead>
              <tr>
                <th class="serial">#</th>
                <th>Nama Barang</th>
                <th>Keterangan</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($barangs as $barang)
              <tr>
                <td class="serial">{{$loop->iteration}}</th>
                <td>{{$barang->nama_barang}}</td>
                <td>{{$barang->keterangan}}</td>
                <td>{{$barang->satuan}}</td>
                <td>{{$barang->stock}}</td>
                <td class="text-center">
                  <a class="href btn btn-primary btn-sm" href="{{ route('barang.edit', $barang->id) }}">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @empty
              <td colspan="4" class="text-center">Tidak ada data yang tersedia</td>
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