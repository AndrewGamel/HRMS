<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\admin_panal_settingController;





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
        require __DIR__ . '/finance_calenders.php';

        /** بداية  الفروع */
        require __DIR__ . '/branche.php';

        /** بداية  انواع الشفتات */
        require __DIR__ . '/shift_types.php';
        
        /** بداية  المؤهلات */
        require __DIR__ . '/qualification.php';
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
