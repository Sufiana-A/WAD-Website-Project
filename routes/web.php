<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');

});

Route::get('/konfirmasi-reservasi', [adminController::class, 'konfirmasi_reservasi'])->middleware('auth:admin');
Route::get('/konfirmasi-reservasi/{id}', [adminController::class, 'detail_reservasi'])->middleware('auth:admin');
Route::put('/konfirmasi-reservasi/{id}', [adminController::class, 'confirm_reservation'])->middleware('auth:admin');
