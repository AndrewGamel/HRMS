<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DepartmentsController;

Route::get('/Departments', [DepartmentsController::class, 'index'])->name('departments.index');
Route::get('/Departments/create', [DepartmentsController::class, 'create'])->name('departments.create');
Route::post('/Departments/store', [DepartmentsController::class, 'store'])->name('departments.store');
Route::get('/Departments/delete/{id}', [DepartmentsController::class, 'destroy'])->name('departments.destroy');
Route::get('/Departments/edit/{id}', [DepartmentsController::class, 'edit'])->name('departments.edit');
Route::post('/Departments/update/{id}', [DepartmentsController::class, 'update'])->name('departments.update');
