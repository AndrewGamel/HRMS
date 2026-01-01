<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\admin_panal_settingController;
use App\Http\Controllers\Admin\Finance_calendersController;

use App\Http\Controllers\Admin\BranchController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// if user have been auth
define('PAGINATION_COUNTER', 11);
Route::group(
    ['prefix' => 'admin', 'middleware' => 'auth:admin'],
    function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
        /** بداية الضبط العام */
        Route::get('/genralsettings', [admin_panal_settingController::class, 'index'])->name('admin_panal_settings.index');
        Route::get('/genralsettings/edit', [admin_panal_settingController::class, 'edit'])->name('admin_panal_settings.edit');
        Route::post('/genralsettings/update', [admin_panal_settingController::class, 'update'])->name('admin_panal_settings.update');

        /** بداية تكويد السنة المالية */
        Route::get('/finance_calenders/delete/{id}', [Finance_calendersController::class, 'destroy'])->name('finance_calenders.delete');
        Route::get('/finance_calenders/edit/{id}', [Finance_calendersController::class, 'edit'])->name('finance_calenders.edit');
        Route::post('/finance_calenders/update', [Finance_calendersController::class, 'update'])->name('finance_calenders.update');
        Route::get('/finance_calenders/do_open/{id}', [Finance_calendersController::class, 'do_open'])->name('finance_calenders.do_open');
        Route::post('/finance_calenders/show_year_month', [Finance_calendersController::class, 'show_year_month'])->name('finance_calenders.show_year_month');
        Route::resource('/finance_calenders', Finance_calendersController::class);

        /** بداية  الفروع */
        Route::get('/branches', [BranchController::class, 'index'])->name('branches.index');
        Route::get('/branches/create', [BranchController::class, 'create'])->name('branches.create');
        Route::post('/branches/store', [BranchController::class, 'store'])->name('branches.store');
         Route::get('/branches/delete/{id}', [BranchController::class, 'destroy'])->name('branches.delete');
        Route::get('/branches/edit/{id}', [BranchController::class, 'edit'])->name('branches.edit');
        Route::post('/branches/update', [BranchController::class, 'update'])->name('branches.update');
    }
);

//if user haven't been auth
Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'guest', 'as' => 'admin.'],
    function () {
        Route::get('/login', [LoginController::class, 'showLoginView'])->name('showLogin');
        Route::post("login", [LoginController::class, 'login'])->name('login');
    }
);

Route::fallback(function () {
    return redirect()->route('admin.dashboard');
});
