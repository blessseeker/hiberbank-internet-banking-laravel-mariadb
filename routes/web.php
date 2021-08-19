<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Register Cek Nomor Rekening
Route::post('/register/ceknorek', [App\Http\Controllers\Auth\RegisterController::class, 'cekNomorRekening']);

// Transfer
Route::get('/transfer', [App\Http\Controllers\TransferController::class, 'index']);
Route::post('/transfer/ceknorek', [App\Http\Controllers\TransferController::class, 'cekNomorRekening']);
Route::post('/transfer', [App\Http\Controllers\TransferController::class, 'kirimTransfer']);
Route::get('/transfer/success', [App\Http\Controllers\TransferController::class, 'success']);

// Mutasi
Route::get('/mutasi', [App\Http\Controllers\Api\MutationController::class, 'index']);
Route::get('/mutasi/list/{customer_id}/{dari}/{sampai}', [App\Http\Controllers\Api\MutationController::class, 'show']);
