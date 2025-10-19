@extends('master')
@section('title', 'Detail Jabatan')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white"><h4 class="mb-0">Detail Jabatan</h4></div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>ID:</strong> {{ $position->id }}</li>
                    <li class="list-group-item"><strong>Nama Jabatan:</strong> {{ $position->nama_jabatan }}</li>
                    <li class="list-group-item"><strong>Gaji Pokok:</strong> Rp {{ number_format($position->gaji_pokok, 2, ',', '.') }}</li>
                    <li class="list-group-item"><strong>Dibuat Pada:</strong> {{ $position->created_at->format('d M Y, H:i') }}</li>
                    <li class="list-group-item"><strong>Diperbarui Pada:</strong> {{ $position->updated_at->format('d M Y, H:i') }}</li>
                </ul>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('positions.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection