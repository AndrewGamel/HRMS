<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\admin_panal_settingController;


Route::get('/genralsettings', [admin_panal_settingController::class, 'index'])->name('admin_panal_settings.index');
Route::get('/genralsettings/edit', [admin_panal_settingController::class, 'edit'])->name('admin_panal_settings.edit');
Route::post('/genralsettings/update', [admin_panal_settingController::class, 'update'])->name('admin_panal_settings.update');
