<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Shift_typesController;

Route::get('/Shift_types', [Shift_typesController::class, 'index'])->name('shift_types.index');
Route::get('/Shift_types/create', [Shift_typesController::class, 'create'])->name('shift_types.create');
Route::post('/Shift_types/store', [Shift_typesController::class, 'store'])->name('shift_types.store');
Route::get('/Shift_types/delete/{id}', [Shift_typesController::class, 'destroy'])->name('shift_types.destroy');
Route::post('/Shift_types/update/{id}', [Shift_typesController::class, 'update'])->name('shift_types.update');
