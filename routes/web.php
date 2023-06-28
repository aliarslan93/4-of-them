<?php

use App\Http\Middleware\RoyalAuth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'loginIndex'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'loginAction'])->name('logged');

Route::middleware([RoyalAuth::class])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logoutAction'])->name('logout');
    Route::prefix('author')->group(function () {
        Route::get('/list', [App\Http\Controllers\AuthorController::class, 'index'])->name('author.list');
        Route::get('/detail/{id?}', [App\Http\Controllers\AuthorController::class, 'show'])->name('author.detail');
        Route::post('/destroy/{id?}', [App\Http\Controllers\AuthorController::class, 'destroy'])->name('author.destroy');
    });
    Route::prefix('book')->group(function () {
        Route::get('/create', [App\Http\Controllers\BookController::class, 'create'])->name('book.create');
        Route::post('/create', [App\Http\Controllers\BookController::class, 'store'])->name('book.store');
        Route::get('/destroy/{id?}', [App\Http\Controllers\BookController::class, 'destroy'])->name('book.destroy');
    });
});
