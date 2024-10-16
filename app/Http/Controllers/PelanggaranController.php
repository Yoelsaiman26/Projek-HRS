<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Employee_record;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    // Menampilkan daftar pelanggaran
    public function index()
    {
        $records = Employee_record::with('employee')->get();
        $employees = Employee::all(); // Pastikan variabel ini diambil
        return view('pelanggaran.index', compact('records', 'employees')); // Kirim variabel ke view

    }

    // Menampilkan form untuk membuat pelanggaran baru
    public function create()
    {
        return view('Pelanggaran.create');
    }

    // Menyimpan pelanggaran baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'id_number' => 'required',
            'offense_type' => 'required',
            'offense_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $pelanggaran = new Employee_record();
        $pelanggaran->id_number = $request->id_number;
        $pelanggaran->offense_type = $request->offense_type;
        $pelanggaran->offense_date = $request->offense_date;
        $pelanggaran->description = $request->description;
        $pelanggaran->save();

        return redirect()->route('pelanggaran.index')->with('success', 'Pelanggaran berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit pelanggaran yang ada
    public function edit($id)
    {
        $pelanggaran = Employee_record::findOrFail($id);
        $tampilkan = Employee::all();
        return view('Pelanggaran.edit', compact('pelanggaran', 'tampilkan'));
    }

    // Mengupdate data pelanggaran yang ada di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_number' => 'required',
            'offense_type' => 'required',
            'offense_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $pelanggaran = Employee_record::findOrFail($id);
        $pelanggaran->id_number = $request->id_number;
        $pelanggaran->offense_type = $request->offense_type;
        $pelanggaran->offense_date = $request->offense_date;
        $pelanggaran->description = $request->description;
        $pelanggaran->save();

        return redirect()->route('pelanggaran.index')->with('success', 'Pelanggaran berhasil diperbarui!');
    }

    // Menghapus pelanggaran dari database
    public function destroy($id)
    {
        $pelanggaran = Employee_record::findOrFail($id);
        $pelanggaran->delete();
        return redirect()->route('pelanggaran.index')->with('success', 'Pelanggaran berhasil dihapus!');
    }
}
