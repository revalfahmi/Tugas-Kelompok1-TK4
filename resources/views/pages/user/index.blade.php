@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Pengguna</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <th>#</th>
                                    <th>Nama Pengguna</th>
                                    <th>Nama Depan</th>
                                    <th>Nama Belakang</th>
                                    <th>No Hp</th>
                                    <th>Alamat</th>
                                    <th>Hak Akses</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @forelse ($items as $item)
                                    <?php $no++ ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->nama_pengguna }}</td>
                                        <td>{{ $item->nama_depan }}</td>
                                        <td>{{ $item->nama_belakang }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->hakAkses->nama_akses }}</td>
                                        <td>
                                            <a href="{{ route('pengguna.edit', $item->id) }}" class="href btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('pengguna.destroy', $item->id) }}" method="POST" class="d-inline">
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