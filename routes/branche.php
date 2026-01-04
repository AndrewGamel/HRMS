<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BranchController;

Route::get('/branches', [BranchController::class, 'index'])->name('branches.index');
Route::get('/branches/create', [BranchController::class, 'create'])->name('branches.create');
Route::post('/branches/store', [BranchController::class, 'store'])->name('branches.store');
Route::get('/branches/delete/{id}', [BranchController::class, 'destroy'])->name('branches.destroy');
Route::get('/branches/edit/{id}', [BranchController::class, 'edit'])->name('branches.edit');
Route::post('/branches/update/{id}', [BranchController::class, 'update'])->name('branches.update');