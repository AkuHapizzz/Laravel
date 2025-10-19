@extends('master')

@section('title', 'Detail Departemen')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Detail Departemen</h4>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>ID:</strong> {{ $department->id }}</li>
                    <li class="list-group-item"><strong>Nama Departemen:</strong> {{ $department->name }}</li>
                    <li class="list-group-item"><strong>Dibuat Pada:</strong> {{ $department->created_at->format('d M Y, H:i') }}</li>
                    <li class="list-group-item"><strong>Diperbarui Pada:</strong> {{ $department->updated_at->format('d M Y, H:i') }}</li>
                </ul>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('departments.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection