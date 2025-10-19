@extends('master')

@section('title', 'Detail Karyawan')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Detail Karyawan: {{ $employee->nama_lengkap }}</h4>
    </div>
    <div class="card-body">
        
        {{-- Informasi Dasar --}}
        <h5 class="mb-3">Informasi Dasar</h5>
        <div class="row">
            <div class="col-md-6">
                <p class="mb-1"><strong>Nama Lengkap:</strong></p>
                <p class="text-muted">{{ $employee->nama_lengkap }}</p>
            </div>
            <div class="col-md-6">
                <p class="mb-1"><strong>Email:</strong></p>
                <p class="text-muted">{{ $employee->email }}</p>
            </div>
            <div class="col-md-6">
                <p class="mb-1"><strong>Nomor Telepon:</strong></p>
                <p class="text-muted">{{ $employee->nomor_telepon }}</p>
            </div>
            <div class="col-md-6">
                <p class="mb-1"><strong>Tanggal Lahir:</strong></p>
                <p class="text-muted">{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->isoFormat('D MMMM Y') }}</p>
            </div>
        </div>

        <hr>

        {{-- Status & Penempatan --}}
        <h5 class="mb-3">Status & Penempatan</h5>
        <div class="row">
            <div class="col-md-4">
                <p class="mb-1"><strong>Tanggal Masuk:</strong></p>
                <p class="text-muted">{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->isoFormat('D MMMM Y') }}</p>
            </div>
            <div class="col-md-4">
                <p class="mb-1"><strong>Status Karyawan:</strong></p>
                @if (strtolower($employee->status) == 'aktif')
                    <span class="badge bg-success fs-6">Aktif</span>
                @else
                    <span class="badge bg-secondary fs-6">Nonaktif</span>
                @endif
            </div>
            <div class="col-md-4">
                <p class="mb-1"><strong>Jabatan:</strong></p>
                <p class="text-muted">{{ $employee->position->nama_jabatan ?? 'Belum Ditentukan' }}</p>
            </div>
            <div class="col-md-4">
                 <p class="mb-1"><strong>Departemen:</strong></p>
                <p class="text-muted">{{ $employee->department->nama_departemen ?? 'Belum Ditentukan' }}</p>
            </div>
        </div>
        
        <hr>

        {{-- Alamat --}}
        <h5 class="mb-3">Alamat</h5>
        <div class="card bg-light">
            <div class="card-body">
                {{ $employee->alamat }}
            </div>
        </div>
        
    </div>
    <div class="card-footer d-flex justify-content-end gap-2">
        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">
            <i class="bi bi-pencil-square"></i> Edit Data
        </a>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar
        </a>
    </div>
</div>
@endsection