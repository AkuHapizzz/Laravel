@extends('master')

@section('title', 'Daftar Departemen')

@section('content')

{{-- Tambahkan kode ini untuk menampilkan notifikasi --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Judul Halaman dan Tombol Tambah --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Departemen</h1>
        {{-- Arahkan ke route create untuk department --}}
        <a href="{{ route('departments.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Tambah Departemen
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark text-center align-middle">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Nama Departemen</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($departments as $department)
                            <tr class="align-middle">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $department->nama_departemen }}</td> {{-- PASTIKAN INI ADALAH 'nama_departemen' --}}
                                <td class="text-center">
                                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="btn-group">
                                        <a href="{{ route('departments.show', $department->id) }}" class="btn btn-info btn-sm" title="Detail"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                        
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data departemen.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection