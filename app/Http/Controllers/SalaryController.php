<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('employee')->latest()->paginate(10);
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::orderBy('nama_lengkap')->get();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:20',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        // Hitung total gaji secara otomatis
        $total_gaji = ($validated['gaji_pokok'] + ($validated['tunjangan'] ?? 0)) - ($validated['potongan'] ?? 0);
        
        // Gabungkan total gaji ke data yang akan disimpan
        $dataToStore = array_merge($validated, ['total_gaji' => $total_gaji]);

        Salary::create($dataToStore);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil ditambahkan!');
    }

    public function show(Salary $salary)
    {
        return view('salaries.show', compact('salary'));
    }

    public function edit(Salary $salary)
    {
        $employees = Employee::orderBy('nama_lengkap')->get();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, Salary $salary)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:20',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        // Hitung ulang total gaji
        $total_gaji = ($validated['gaji_pokok'] + ($validated['tunjangan'] ?? 0)) - ($validated['potongan'] ?? 0);
        
        $dataToUpdate = array_merge($validated, ['total_gaji' => $total_gaji]);
        
        $salary->update($dataToUpdate);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil diperbarui!');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil dihapus!');
    }
}