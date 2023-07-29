@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Barang</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('barang.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_barang" class="form-control-label">Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" class="form-control @error('nama_barang')
                        is-invalid
                    @enderror" />
                @error('nama_barang')
                <div class="text-muted">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="keterangan" class="form-control-label">Keterangan</label>
                <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"></textarea>
                @error('keterangan')
                <div class="text-muted">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="satuan" class="form-control-label">Satuan</label>
                <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror"></textarea>
                @error('satuan')
                <div class="text-muted">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="stock" class="form-control-label">Stok</label>
                <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"></textarea>
                @error('stock')
                <div class="text-muted">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">
                    Tambah Barang
                </button>
            </div>
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
        </form>
    </div>
</div>
@endsection