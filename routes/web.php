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

// login/logout proses
Route::get('/login', [authController::class, 'login']);
Route::post('/login', [authController::class, 'cekLogin']);
Route::get('/logout', [authController::class, 'logout']);
// register step
Route::get('/register', [authController::class, 'register1']);
Route::post('/register', [authController::class, 'processStep1']);
Route::get('/register2', [authController::class, 'register2']);
Route::post('/register2', [authController::class, 'processStep2']);
Route::get('/register3', [authController::class, 'register3']);
Route::post('/register3', [authController::class, 'processStep3']);
// reservasi option
Route::get('/reservasi-pesawat', [userController::class, 'reservasi_pesawat'])->middleware('auth:web');
Route::post('/reservasi-pesawat', [userController::class, 'plane_reservations'])->middleware('auth:web');
Route::get('/reservasi-kereta', [userController::class, 'reservasi_kereta'])->middleware('auth:web');
Route::post('/reservasi-kereta', [userController::class, 'train_reservations'])->middleware('auth:web');
Route::get('/reservasi-hotel', [userController::class, 'reservasi_hotel'])->middleware('auth:web');
Route::post('/reservasi-hotel', [userController::class, 'hotel_reservations'])->middleware('auth:web');
Route::get('/my-order', [userController::class, 'myOrder'])->middleware('auth:web');
Route::get('/pembayaran/{id}', [userController::class, 'pembayaran'])->middleware('auth:web');
Route::post('/pembayaran/{id}', [userController::class, 'payment'])->middleware('auth:web');
Route::get('/tiket/{id}', [userController::class, 'tiket'])->middleware('auth:web');
Route::delete('/batal-pesanan/{id}', [userController::class, 'deletePemesanan'])->middleware('auth:web');
Route::delete('/batal-pembayaran/{id}', [userController::class, 'deletePembayaran'])->middleware('auth:web');
Route::get('/profile', [userController::class, 'profile'])->middleware('auth:web');
Route::put('/profile/edit', [userController::class, 'editProfile'])->middleware('auth:web');


Route::get('/konfirmasi-reservasi', [adminController::class, 'konfirmasi_reservasi'])->middleware('auth:admin');
Route::get('/konfirmasi-reservasi/{id}', [adminController::class, 'detail_reservasi'])->middleware('auth:admin');
Route::put('/konfirmasi-reservasi/{id}', [adminController::class, 'confirm_reservation'])->middleware('auth:admin');

Route::get('/daftar-pembayaran', [adminController::class, 'daftar_pembayaran'])->middleware('auth:admin');
Route::get('/detail-pembayaran/{id}', [adminController::class, 'detail_pembayaran'])->middleware('auth:admin');
Route::put('/detail-pembayaran/{id}', [adminController::class, 'update_payment'])->middleware('auth:admin');
Route::get('/data-user', [adminController::class, 'dataUser'])->middleware('auth:admin');
Route::delete('/delete-user/{id}', [adminController::class, 'deleteUser'])->middleware('auth:admin');
Route::get('/data-user/edit/{id}', [adminController::class, 'editUser'])->middleware('auth:admin');
Route::put('/data-user/edit/{id}', [adminController::class, 'updateUser'])->middleware('auth:admin');
