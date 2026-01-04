<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Finance_calendersController;

        Route::get('/finance_calenders/delete/{id}', [Finance_calendersController::class, 'destroy'])->name('finance_calenders.delete');
        Route::get('/finance_calenders/edit/{id}', [Finance_calendersController::class, 'edit'])->name('finance_calenders.edit');
        Route::post('/finance_calenders/update', [Finance_calendersController::class, 'update'])->name('finance_calenders.update');
        Route::get('/finance_calenders/do_open/{id}', [Finance_calendersController::class, 'do_open'])->name('finance_calenders.do_open');
        Route::post('/finance_calenders/show_year_month', [Finance_calendersController::class, 'show_year_month'])->name('finance_calenders.show_year_month');
        Route::resource('/finance_calenders', Finance_calendersController::class);
