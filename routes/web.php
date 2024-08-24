<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home.index');
    })->name('home.index');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('category', CategoryController::class);
    Route::resource('author', AuthorController::class);
    Route::resource('publisher', PublisherController::class);
    Route::resource('book', BookController::class);
    Route::resource('transaction', TransactionController::class);
    
    Route::post('/transaction/{id}/return', [TransactionController::class, 'return'])->name('transaction.return');
});
