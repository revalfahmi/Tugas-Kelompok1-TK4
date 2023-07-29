@extends('layouts.default')
@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title inline-block" id="createModalLabel">Formulir Tambah Barang</h5>
          </div>
          <form action="{{ route('barang.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan nama barang">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control" placeholder="Masukkan keterangan barang">
              </div>
              <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" class="form-control" placeholder="Masukkan satuan barang">
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title inline-block" id="editModalLabel">Formulir Ubah Barang</h5>
          </div>
          <form action="" method="POST" id="editForm">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="modal-body" id="modalEditBody">
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                  placeholder="Masukkan keterangan barang">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control"
                  placeholder="Masukkan keterangan barang">
              </div>
              <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Masukkan satuan barang">
              </div>
              <button type="submit" class="btn btn-primary">Proses</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h4 class="box-title inline-block">Data Barang</h4>
        <button type="button" class="btn btn-primary" style="margin-left: 2%" data-toggle="modal"
          data-target="#createModal">
          Tambah Barang
        </button>
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
                <td>
                  {{-- <a href="{{route('pages.barang.detail',['barang'=>$barang->id])}}"> --}}
                    {{$barang->nama_barang}}
                    {{-- </a> --}}
                </td>
                <td>{{$barang->keterangan}}</td>
                <td>{{$barang->satuan}}</td>
                <td>{{$barang->satuan}}</td>
                <td class="text-center">
                  <a 
                    id="editButton" 
                    class="href btn btn-primary btn-sm" 
                    data-toggle="modal"
                    data-target="#editModal"
                    data-attr="{{ route('barang.edit', $barang->id) }}">
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