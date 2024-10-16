<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/loan-application', function () {
    return view('loan_application');
})->name('loan.application');

Route::post('/loan-application', [LoanController::class, 'store'])->name('loan.store');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [LoanController::class, 'index'])->name('dashboard');
    Route::get('/loan/{id}/edit', [LoanController::class, 'edit'])->name('loan.edit');
    Route::post('/loan/{id}', [LoanController::class, 'update'])->name('loan.update');
    Route::delete('/loan/{id}', [LoanController::class, 'destroy'])->name('loan.destroy');
});

Route::get('/loan/{id}/download', [LoanController::class, 'downloadPaysheet'])->name('loan.download');
