<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // MENAMPILKAN SEMUA DATA
    public function index()
    {
        $departments = Department::latest()->paginate(10); // Ambil data & paginasi
        return view('departments.index', compact('departments'));
    }

    // MENAMPILKAN FORM TAMBAH DATA
    public function create()
    {
        return view('departments.create');
    }

    // MENYIMPAN DATA BARU
    public function store(Request $request)
    {
        $request->validate([
            // UBAH 'name' MENJADI 'nama_departemen' di validasi
            'nama_departemen' => 'required|string|max:255|unique:departments,nama_departemen',
        ]);

        Department::create([
            // UBAH 'name' MENJADI 'nama_departemen' saat create
            'nama_departemen' => $request->nama_departemen, // Ambil dari input 'nama_departemen'
        ]);

        return redirect()->route('departments.index')->with('success', 'Departemen baru berhasil ditambahkan!');
    }

    // MENAMPILKAN DETAIL SATU DATA
    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    // MENAMPILKAN FORM EDIT DATA
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    // MEMPERBARUI DATA
    public function update(Request $request, Department $department)
    {
        $request->validate([
            // UBAH 'name' MENJADI 'nama_departemen' di validasi
            'nama_departemen' => 'required|string|max:255|unique:departments,nama_departemen,' . $department->id,
        ]);

        $department->update([
            // UBAH 'name' MENJADI 'nama_departemen' saat update
            'nama_departemen' => $request->nama_departemen, // Ambil dari input 'nama_departemen'
        ]);

        return redirect()->route('departments.index')->with('success', 'Data departemen berhasil diperbarui!');
    }

    // MENGHAPUS DATA
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Data departemen berhasil dihapus!');
    }
}