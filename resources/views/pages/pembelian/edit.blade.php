@extends('layouts.default')
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Ubah Harga Jual Pembelian</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('pembelian.update', $items->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="jumlah_pembelian" class="form-control-label">Jumlah Pembelian</label>
                    <input type="number" name="jumlah_pembelian" value="{{ old('jumlah_pembelian') ? old('jumlah_pembelian') : $items->jumlah_pembelian }}" class="form-control @error('jumlah_pembelian')
                        is-invalid
                    @enderror" disabled />
                    @error('jumlah_pembelian')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga_beli" class="form-control-label">Harga Beli</label>
                    <input type="number" name="harga_beli" value="{{ old('harga_beli') ? old('harga_beli') : $items->harga_beli }}" class="form-control @error('harga_beli')
                        is-invalid
                    @enderror" />
                    @error('harga_beli')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_barang" class="form-control-label">Barang</label>
                    <select disabled name="id_barang" id="id_barang" class="form-control">
                        <option value="">Pilih Barang</option>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->id }}" {{ $barang->id == $items->id_barang ? 'selected' : '' }}>{{ $barang->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Ubah Harga 
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection