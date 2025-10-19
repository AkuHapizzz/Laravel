@extends('master')
@section('title', 'Edit Data Gaji')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-warning">
                <h4 class="mb-0">Form Edit Gaji Karyawan</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="karyawan_id" class="form-label">Nama Karyawan</label>
                        <select name="karyawan_id" id="karyawan_id" class="form-select @error('karyawan_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Karyawan --</option>
                            @foreach ($employees as $employee)
                                {{-- Menandai karyawan yang sudah terpilih sebelumnya --}}
                                <option value="{{ $employee->id }}" {{ old('karyawan_id', $salary->karyawan_id) == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                        @error('karyawan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="bulan" class="form-label">Bulan</label>
                        <input type="text" name="bulan" id="bulan" class="form-control @error('bulan') is-invalid @enderror" value="{{ old('bulan', $salary->bulan) }}" placeholder="Contoh: Oktober 2025" required>
                        @error('bulan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                            <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control @error('gaji_pokok') is-invalid @enderror" value="{{ old('gaji_pokok', $salary->gaji_pokok) }}" required>
                             @error('gaji_pokok')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tunjangan" class="form-label">Tunjangan</label>
                            <input type="number" name="tunjangan" id="tunjangan" class="form-control @error('tunjangan') is-invalid @enderror" value="{{ old('tunjangan', $salary->tunjangan) }}">
                             @error('tunjangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="potongan" class="form-label">Potongan</label>
                            <input type="number" name="potongan" id="potongan" class="form-control @error('potongan') is-invalid @enderror" value="{{ old('potongan', $salary->potongan) }}">
                             @error('potongan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <p class="text-muted">Total Gaji akan dihitung ulang secara otomatis.</p>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('salaries.index') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection