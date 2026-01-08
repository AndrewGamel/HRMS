<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Shift_typesController;

Route::get('/Departments', [Shift_typesController::class, 'index'])->name('shift_types.index');
Route::get('/Departments/create', [Shift_typesController::class, 'create'])->name('shift_types.create');
Route::post('/Departments/store', [Shift_typesController::class, 'store'])->name('shift_types.store');
Route::get('/Departments/delete/{id}', [Shift_typesController::class, 'destroy'])->name('shift_types.destroy');
Route::get('/Departments/edit/{id}', [Shift_typesController::class, 'edit'])->name('shift_types.edit');
Route::post('/Departments/update/{id}', [Shift_typesController::class, 'update'])->name('shift_types.update');
