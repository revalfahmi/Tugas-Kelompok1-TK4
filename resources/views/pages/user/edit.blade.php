@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Pengguna</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('pengguna.update', $items->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="nama_pengguna" class="form-control-label">Nama Pengguna</label>
                    <input type="text" name="nama_pengguna" value="{{ old('nama_pengguna') ? old('nama_pengguna') : $items->nama_pengguna }}" class="form-control @error('nama_pengguna')
                        is-invalid
                    @enderror" />
                    @error('nama_pengguna')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-control-label">Email Pengguna</label>
                    <input type="email" name="email" value="{{ old('email') ? old('email') : $items->email }}" class="form-control @error('email')
                        is-invalid
                    @enderror" disabled/>
                    @error('email')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-control-label">Password</label>
                    <input type="password" name="password" value="{{ old('password') ? old('password') : $items->password }}" class="form-control @error('password')
                        is-invalid
                    @enderror" />
                    @error('password')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Nama Depan</label>
                    <input type="text" name="nama_depan" value="{{ old('nama_depan') ? old('nama_depan') : $items->nama_depan }}" class="form-control @error('nama_depan')
                        is-invalid
                    @enderror" />
                    @error('nama_depan')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_belakang" class="form-control-label">Nama Belakang</label>
                    <input type="text" name="nama_belakang" value="{{ old('nama_belakang') ? old('nama_belakang') : $items->nama_belakang }}" class="form-control @error('nama_belakang')
                        is-invalid
                    @enderror" />
                    @error('nama_belakang')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_hp" class="form-control-label">No HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp') ? old('no_hp') : $items->no_hp }}" class="form-control @error('no_hp')
                        is-invalid
                    @enderror" />
                    @error('no_hp')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat" class="form-control-label">Alamat</label>
                    <textarea type="text" name="alamat" class="form-control @error('alamat')
                        is-invalid
                    @enderror" />{{ old('alamat') ? old('alamat') : $items->alamat }}</textarea>
                    @error('alamat')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_akses" class="form-control-label">Hak Akses</label>
                    <select name="id_akses" id="id_akses" class="form-control @error('id_akses')
                        is-invalid
                    @enderror">
                        <option value="">Pilih Hak Akses</option>
                        @foreach ($hakAkses as $item)
                            <option value="{{ $item->id ?? '' }}">{{ $item->nama_akses ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Edit Pengguna
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection