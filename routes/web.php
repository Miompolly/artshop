<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/checkout', 'App\Http\Controllers\stripeController@checkout')->name('checkout');
    Route::post('/session', 'App\Http\Controllers\stripeController@session')->name('session');
    Route::get('/success', 'App\Http\Controllers\stripeController@success')->name('success');

});

require __DIR__.'/auth.php';

Route::get('/cart', function () {
    return view('cart');
});

Route::post('save-products', [ProductsController::class, 'save']);
Route::get('readData', [ProductsController::class, 'readData']);
Route::get('viewTra', [ProductsController::class, 'viewTra']);

Route::get('orderData', [ProductsController::class, 'orderData']);
Route::get('/', [ProductsController::class, 'read']);
Route::get('edit/{id}', [ProductsController::class, 'edit']);
Route::put('update', [ProductsController::class, 'update']);
Route::delete('delete', [ProductsController::class, 'delete']);
