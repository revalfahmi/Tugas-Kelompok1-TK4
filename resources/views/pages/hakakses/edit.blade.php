@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Hak Akses</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('hak-akses.update', $item->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nama_akses" class="form-control-label">Nama Akses</label>
                <input type="text" name="nama_akses" value="{{ old('nama_akses') ? old('nama_akses') : $item->nama_akses }}" class="form-control @error('nama_akses')
                    is-invalid
                @enderror" />
                @error('nama_akses')
                    <div class="text-muted">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="keterangan" class="form-control-label">Keterangan</label>
                <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') ? old('keterangan') : $item->keterangan }}</textarea>
                @error('keterangan')
                    <div class="text-muted">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">
                    Edit Hak Akses
                </button>
            </div>
        </form>
    </div>
</div>
@endsection