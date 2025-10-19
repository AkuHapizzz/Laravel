@extends('master')
@section('title', 'Daftar Jabatan')
@section('content')
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Jabatan</h1>
        <a href="{{ route('positions.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Tambah Jabatan
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark text-center align-middle">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Nama Jabatan</th>
                            <th>Gaji Pokok</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($positions as $position)
                            <tr class="align-middle">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $position->nama_jabatan }}</td>
                                <td>Rp {{ number_format($position->gaji_pokok, 2, ',', '.') }}</td>
                                <td class="text-center">
                                    <form action="{{ route('positions.destroy', $position->id) }}" method="POST" class="btn-group">
                                        <a href="{{ route('positions.show', $position->id) }}" class="btn btn-info btn-sm" title="Detail"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin?')"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data jabatan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection