<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('users')->middleware(['hasRole:admin,hr'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/show/{userId}', [UserController::class, 'show'])->name('user.show');
    Route::get('/edit/{userId}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/edit', [UserController::class, 'update'])->name('user.update');
    Route::delete('/edit', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::middleware('auth')->prefix('book')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('book.index');
    Route::get('/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/store', [BookController::class, 'store'])->name('book.store');
    Route::get('/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::patch('/{book}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/{book}', [BookController::class, 'destroy'])->name('book.destroy');
});



require __DIR__.'/auth.php';
