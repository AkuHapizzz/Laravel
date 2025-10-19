@extends('master')
@section('title', 'Edit Data Absensi')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-warning">
                <h4 class="mb-0">Form Edit Absensi</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
                    @csrf
                    @method('PUT') {{-- Metode PUT untuk update --}}

                    <div class="mb-3">
                        <label for="employee_id" class="form-label">Nama Pegawai</label>
                        <select name="employee_id" id="employee_id" class="form-select @error('employee_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Pegawai --</option>
                            @foreach ($employees as $employee)
                                {{-- Menandai pegawai yang sudah terpilih --}}
                                <option value="{{ $employee->id }}" {{ old('employee_id', $attendance->employee_id) == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                        @error('employee_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $attendance->tanggal) }}" required>
                            @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                            <input type="time" name="waktu_masuk" id="waktu_masuk" class="form-control @error('waktu_masuk') is-invalid @enderror" value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}" required>
                            @error('waktu_masuk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                         <div class="col-md-4 mb-3">
                            <label for="waktu_keluar" class="form-label">Waktu Keluar (Opsional)</label>
                            <input type="time" name="waktu_keluar" id="waktu_keluar" class="form-control @error('waktu_keluar') is-invalid @enderror" value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}">
                            @error('waktu_keluar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                            @php
                                $statuses = ['Hadir', 'Izin', 'Sakit', 'Alpha'];
                            @endphp
                            @foreach ($statuses as $status)
                                {{-- Menandai status yang sudah terpilih --}}
                                <option value="{{ $status }}" {{ old('status', $attendance->status) == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                         @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('attendances.index') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection