@extends('master')
@section('title', 'Daftar Absensi')
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Daftar Absensi</h1>
        <a href="{{ route('attendances.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i> Catat Absensi</a>
    </div>
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark text-center align-middle">
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Tanggal</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($attendances as $attendance)
                        <tr class="align-middle">
                            <td class="text-center">{{ $loop->iteration + $attendances->firstItem() - 1 }}</td>
                            <td>{{ $attendance->employee->nama_lengkap }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}</td>
                            <td class="text-center">{{ $attendance->waktu_masuk }}</td>
                            <td class="text-center">{{ $attendance->waktu_keluar ?? '-' }}</td>
                            <td class="text-center">{{ $attendance->status }}</td>
                            <td class="text-center">
                                <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" class="btn-group">
                                    <a href="{{ route('attendances.show', $attendance->id) }}" class="btn btn-info btn-sm" title="Detail"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')" title="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data absensi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $attendances->links() }}
            </div>
        </div>
    </div>
@endsection