<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PelanggaranController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


// Data Karyawan
Route::prefix('employees')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('karyawan.index');
    Route::post('/', [EmployeeController::class, 'store'])->name('karyawan.store');
    Route::get('/{id_number}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/{id_number}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/{id_number}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
});
// Data Arsip
Route::get('/archived-employees', [EmployeeController::class, 'archivedIndex'])->name('karyawan.archivedIndex');
Route::put('/karyawan/{id_number}/archive', [EmployeeController::class, 'archive'])->name('karyawan.archive');
Route::post('/employees/{id}/restore', [EmployeeController::class, 'restore'])->name('karyawan.restore');


// Data Pelanggaran
Route::prefix('pelanggaran')->group(function () {
    Route::get('/', [PelanggaranController::class, 'index'])->name('pelanggaran.index');
    Route::get('/create', [PelanggaranController::class, 'create'])->name('pelanggaran.create');
    Route::post('/', [PelanggaranController::class, 'store'])->name('pelanggaran.store');
    Route::get('/{id_number}/edit', [PelanggaranController::class, 'edit'])->name('pelanggaran.edit');
    Route::put('/{id_number}', [PelanggaranController::class, 'update'])->name('pelanggaran.update');
    Route::delete('/{id_number}', [PelanggaranController::class, 'destroy'])->name('pelanggaran.destroy');
});
