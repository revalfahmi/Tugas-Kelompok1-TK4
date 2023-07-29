@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Penjualan</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('penjualan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jumlah_penjualan" class="form-control-label">Jumlah Penjualan</label>
                    <input type="number" name="jumlah_penjualan" value="{{ old('jumlah_penjualan') }}" class="form-control @error('jumlah_penjualan')
                        is-invalid
                    @enderror" />
                    @error('jumlah_penjualan')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga_jual" class="form-control-label">Harga Jual</label>
                    <input type="number" name="harga_jual" value="{{ old('harga_jual') }}" class="form-control @error('harga_jual')
                        is-invalid
                    @enderror" />
                    @error('harga_jual')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_barang" class="form-control-label">Barang</label>
                    <select name="id_barang" id="id_barang" class="form-control">
                        <option value="">Pilih Barang</option>
                        @foreach ($barangs as $item)
                            <option value="{{ $item->id ?? '' }}">{{ $item->nama_barang ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Tambah Penjualan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection