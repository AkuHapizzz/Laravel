@extends('master')
@section('title', 'Detail Absensi')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Detail Absensi</h4>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Nama Pegawai:</strong>
                        {{-- Mengambil nama dari relasi 'employee' --}}
                        <p class="mb-0 fs-5">{{ $attendance->employee->nama_lengkap }}</p> 
                    </li>
                    <li class="list-group-item">
                        <strong>Tanggal:</strong>
                        <p class="mb-0">{{ \Carbon\Carbon::parse($attendance->tanggal)->isoFormat('dddd, D MMMM Y') }}</p>
                    </li>
                    <li class="list-group-item">
                        <strong>Waktu Masuk:</strong>
                        <p class="mb-0">{{ $attendance->waktu_masuk }}</p>
                    </li>
                    <li class="list-group-item">
                        <strong>Waktu Keluar:</strong>
                        <p class="mb-0">{{ $attendance->waktu_keluar ?? 'Belum absen keluar' }}</p>
                    </li>
                    <li class="list-group-item">
                        <strong>Status:</strong>
                        <p class="mb-0">{{ $attendance->status }}</p>
                    </li>
                    <li class="list-group-item">
                        <strong>Dicatat Pada:</strong>
                        <p class="mb-0 text-muted">{{ $attendance->created_at->format('d M Y, H:i:s') }}</p>
                    </li>
                </ul>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('attendances.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection