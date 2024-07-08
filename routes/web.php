<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReportController;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/dashboard', [DashboardController::class, 'index'])->name('app.dashboard');
Route::resource('categories', CategoryController::class)->names('app.categories');
Route::resource('products', ProductController::class)->names('app.products');
Route::resource('orders', OrderController::class)->names('app.orders');
//Route::resource('users', UserController::class)->names('app.users');
Route::resource('clients', ClientController::class)->names('app.clients');
//Route::get('/reports/orders', [ReportController::class, 'orders'])->name('reports.orders');

require __DIR__.'/auth.php';
