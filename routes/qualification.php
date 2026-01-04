<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\qualificationsController;

Route::get('/qualifications', [qualificationsController::class, 'index'])->name('qualifications.index');
Route::get('/qualifications/create', [qualificationsController::class, 'create'])->name('qualifications.create');
Route::post('/qualifications/store', [qualificationsController::class, 'store'])->name('qualifications.store');
Route::get('/qualifications/delete/{id}', [qualificationsController::class, 'destroy'])->name('qualifications.destroy');
Route::get('/qualifications/edit/{id}', [qualificationsController::class, 'edit'])->name('qualifications.edit');
Route::post('/qualifications/update/{id}', [qualificationsController::class, 'update'])->name('qualifications.update');
