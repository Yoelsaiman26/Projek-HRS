<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\FamilyData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $familyData = FamilyData::all();
        return view('HRS.tampildata', compact('employees', 'familyData'));
    }

    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->id_number = $request->id_number;
        $employee->full_name = $request->full_name;
        $employee->nickname = $request->nickname;
        $employee->contract_date = $request->contract_date;
        $employee->work_date = $request->work_date;
        $employee->status = $request->status;
        $employee->position = $request->position;
        $employee->nuptk = $request->nuptk;
        $employee->gender = $request->gender;
        $employee->place_birth = $request->place_birth;
        $employee->birth_date = $request->birth_date;
        $employee->religion = $request->religion;
        $employee->email = $request->email;
        $employee->hobby = $request->hobby;
        $employee->marital_status = $request->marital_status;
        $employee->residence_address = $request->residence_address;
        $employee->phone = $request->phone;
        $employee->address_emergency = $request->address_emergency;
        $employee->phone_emergency = $request->phone_emergency;
        $employee->blood_type = $request->blood_type;
        $employee->last_education = $request->last_education;
        $employee->agency = $request->agency;
        $employee->graduation_year = $request->graduation_year;
        $employee->competency_training_place = $request->competency_training_place;
        $employee->organizational_experience = $request->organizational_experience;
        $employee->save();

        $familyData = new FamilyData();
        $familyData->id_number = $request->id_number;
        $familyData->mate_name = $request->mate_name;
        $familyData->child_name = $request->child_name;
        $familyData->wedding_date = $request->wedding_date;
        $familyData->wedding_certificate_number = $request->wedding_certificate_number;
        $familyData->save();

        return redirect()->back()->with('success', 'Data keluarga berhasil ditambahkan!');
    }

    public function edit($id_number)
    {
        $employee = Employee::where('id_number', $id_number)->first();
        if (!$employee) {
            return redirect()->route('karyawan.index')->with('error', 'Data karyawan tidak ditemukan.');
        }

        $familyData = FamilyData::where('id_number', $id_number)->first();
        return view('HRS.editdata', compact('employee', 'familyData'));
    }

    public function update(Request $request, $id_number)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'contract_date' => 'required|date',
            'work_date' => 'required|date',
            'status' => 'required|string',
            'position' => 'required|string|max:255',
            'nuptk' => 'required|string|max:255',
            'gender' => 'required|string',
            'place_birth' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string',
            'email' => 'required|email',
            'hobby' => 'required|string|max:255',
            'marital_status' => 'required|string',
            'residence_address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address_emergency' => 'required|string|max:255',
            'phone_emergency' => 'required|string|max:15',
            'blood_type' => 'required|string|max:5',
            'last_education' => 'required|string|max:255',
            'agency' => 'required|string|max:255',
            'graduation_year' => 'required|integer',
            'competency_training_place' => 'required|string|max:255',
            'organizational_experience' => 'required|string|max:255',
            'mate_name' => 'nullable|string|max:255',
            'child_name' => 'nullable|string|max:255',
            'wedding_date' => 'nullable|date',
            'wedding_certificate_number' => 'nullable|string|max:255',
            'password' => 'nullable|min:8',
        ]);

        $employee = Employee::where('id_number', $id_number)->first();
        if (!$employee) {
            return redirect()->route('karyawan.index')->with('error', 'Data karyawan tidak ditemukan.');
        }

        $employee->update($request->except('password'));

        $familyData = FamilyData::where('id_number', $id_number)->first();
        if ($request->marital_status === 'menikah') {
            if ($familyData) {
                $familyData->update($request->only('mate_name', 'child_name', 'wedding_date', 'wedding_certificate_number'));
            } else {
                FamilyData::create([
                    'id_number' => $id_number,
                    'mate_name' => $request->mate_name,
                    'child_name' => $request->child_name,
                    'wedding_date' => $request->wedding_date,
                    'wedding_certificate_number' => $request->wedding_certificate_number,
                ]);
            }
        } else {
            if ($familyData) {
                $familyData->delete();
            }
        }

        if ($request->filled('password')) {
            $user = User::where('email', $employee->email)->first();
            if ($user) {
                $user->update(['password' => Hash::make($request->password)]);
            }
        }

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui!');
    }

    public function destroy($id_number)
    {
        $employee = Employee::where('id_number', $id_number)->first();
        if (!$employee) {
            return redirect()->route('karyawan.index')->with('error', 'Data karyawan tidak ditemukan.');
        }

        FamilyData::where('id_number', $id_number)->delete();
        $employee->delete();

        $user = User::where('email', $employee->email)->first();
        if ($user) {
            $user->delete();
        }

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus!');
    }

    public function archivedIndex()
    {
        $archivedEmployees = Employee::where('archived', true)->with('familyData')->get();
        return view('HRS.archivedindex', compact('archivedEmployees'));
    }

    public function archive($id_number)
    {
        // Cari karyawan berdasarkan id_number
        $employee = Employee::where('id_number', $id_number)->first();
        dd($employee);  // Menampilkan data yang ditemukan

        // Jika tidak ditemukan, kembalikan pesan error
        if (!$employee) {
            return redirect()->route('karyawan.index')->with('error', 'Data karyawan tidak ditemukan.');
        }

        // Ubah status karyawan menjadi diarsipkan (archived = true)
        $employee->archived = true;
        $employee->save();

        // Update data keluarga terkait karyawan juga diarsipkan
        FamilyData::where('id_number', $id_number)->update(['archived' => true]);

        // Redirect ke halaman karyawan dengan pesan sukses
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diarsipkan.');
    }


    public function restore($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->archived = false;
        $employee->save();

        FamilyData::where('id_number', $employee->id_number)->update(['archived' => false]);

        return redirect()->route('karyawan.archivedIndex')->with('success', 'Data karyawan berhasil dipulihkan.');
    }
}
