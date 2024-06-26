<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\EmployeeController;

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

Route::middleware(['hasRole:admin,hr', 'auth'])->prefix('users')->group(function () {
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

Route::middleware('auth')->prefix('profile')->group(function(){
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/{userId}', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/store', [ProfileController::class,'store'])->name('profile.store');
});

Route::middleware(['auth', 'hasRole:admin'])->prefix('role')->group(function () {
    Route::get('/', [RoleController::class,'index'])->name('role.index');
    Route::post('/store', [RoleController::class, 'store'])->name('role.store');
    Route::post('/delete', [RoleController::class,'delete'])->name('role.delete');

    Route::post('activate', [RoleController::class,'activate'])->name('role.activate');
    Route::post('deactivate', [RoleController::class,'deactivate'])->name('role.deactivate');
});

Route::middleware(['auth', 'hasRole:admin,hr'])->prefix('restaurant')->group(function () {
    Route::get('/', [RestaurantController::class,'index'])->name('restaurant.index');
    Route::post('/store', [RestaurantController::class, 'store'])->name('restaurant.store');
    Route::post('/delete', [RestaurantController::class,'delete'])->name('restaurant.delete');
});

Route::middleware('auth')->prefix('employee')->group(function () {
    Route::post('/addExperience', [EmployeeController::class, 'addExperience'])->name('employee.addExperience');
    Route::post('/removeExperience', [EmployeeController::class, 'removeExperience'])->name('employee.removeExperience');
});


require __DIR__.'/auth.php';
