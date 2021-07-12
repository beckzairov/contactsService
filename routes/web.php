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

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'store']);

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'store']);

Route::post('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/favorites', [App\Http\Controllers\FavoritesController::class, 'index'])->name('favorites.index');
Route::post('/favorites/{contact}', [App\Http\Controllers\FavoritesController::class, 'store']);
Route::resource('contacts', App\Http\Controllers\ContactsController::class);

Route::put('/phones/{id}', [App\Http\Controllers\PhoneController::class, 'update'])->name('phones.update');
Route::post('/phones/{id}', [App\Http\Controllers\PhoneController::class, 'store'])->name('phones.store');
Route::delete('/phones/{id}', [App\Http\Controllers\PhoneController::class, 'destroy'])->name('phones.destroy');
