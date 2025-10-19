@extends('master')
@section('title', 'Detail Gaji')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Detail Gaji Karyawan</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Nama Karyawan</strong></div>
                    <div class="col-md-8">: {{ $salary->employee->nama_lengkap }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Periode Gaji</strong></div>
                    <div class="col-md-8">: {{ $salary->bulan }}</div>
                </div>
                <hr>
                <div class="row mb-2">
                    <div class="col-md-4">Gaji Pokok</div>
                    <div class="col-md-8">: Rp {{ number_format($salary->gaji_pokok, 2, ',', '.') }}</div>
                </div>
                 <div class="row mb-2">
                    <div class="col-md-4">Tunjangan</div>
                    <div class="col-md-8">: Rp {{ number_format($salary->tunjangan, 2, ',', '.') }}</div>
                </div>
                 <div class="row mb-2">
                    <div class="col-md-4">Potongan</div>
                    <div class="col-md-8">: Rp {{ number_format($salary->potongan, 2, ',', '.') }}</div>
                </div>
                <hr>
                <div class="row fw-bold fs-5">
                    <div class="col-md-4">Total Gaji Diterima</div>
                    <div class="col-md-8">: Rp {{ number_format($salary->total_gaji, 2, ',', '.') }}</div>
                </div>
                 <hr>
                <div class="row text-muted small mt-4">
                    <div class="col-md-6"><strong>Dibuat Pada:</strong> {{ $salary->created_at->format('d M Y, H:i') }}</div>
                    <div class="col-md-6"><strong>Diperbarui Pada:</strong> {{ $salary->updated_at->format('d M Y, H:i') }}</div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('salaries.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection