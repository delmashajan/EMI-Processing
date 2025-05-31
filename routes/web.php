<?php

use App\Http\Controllers\Admin\LoanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/admin/loans', [LoanController::class, 'index'])->name('admin.loans');
    Route::get('/admin/emi', [LoanController::class, 'emiForm'])->name('admin.loans.emi');
    Route::post('/admin/emi/process', [LoanController::class, 'processData'])->name('admin.loans.process');
});
