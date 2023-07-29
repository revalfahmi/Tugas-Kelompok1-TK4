@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Pengguna</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('pengguna.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_pengguna" class="form-control-label">Nama Pengguna</label>
                    <input type="text" name="nama_pengguna" value="{{ old('nama_pengguna') }}" class="form-control @error('nama_pengguna')
                        is-invalid
                    @enderror" />
                    @error('nama_pengguna')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-control-label">Email Pengguna</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email')
                        is-invalid
                    @enderror" />
                    @error('email')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-control-label">Password</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password')
                        is-invalid
                    @enderror" />
                    @error('password')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Nama Depan</label>
                    <input type="text" name="nama_depan" value="{{ old('nama_depan') }}" class="form-control @error('nama_depan')
                        is-invalid
                    @enderror" />
                    @error('nama_depan')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_belakang" class="form-control-label">Nama Belakang</label>
                    <input type="text" name="nama_belakang" value="{{ old('nama_belakang') }}" class="form-control @error('nama_belakang')
                        is-invalid
                    @enderror" />
                    @error('nama_belakang')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_hp" class="form-control-label">No HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-control @error('no_hp')
                        is-invalid
                    @enderror" />
                    @error('no_hp')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat" class="form-control-label">Alamat</label>
                    <textarea type="text" name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat')
                        is-invalid
                    @enderror" /></textarea>
                    @error('alamat')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_akses" class="form-control-label">Hak Akses</label>
                    <select name="id_akses" id="id_akses" class="form-control">
                        <option value="">Pilih Hak Akses</option>
                        @foreach ($hakAkses as $item)
                            <option value="{{ $item->id ?? '' }}">{{ $item->nama_akses ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Tambah Pengguna
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection