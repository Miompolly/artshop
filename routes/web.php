<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/checkout', 'App\Http\Controllers\stripeController@checkout')->name('checkout');
Route::post('/session', 'App\Http\Controllers\stripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\stripeController@success')->name('success');



Route::post('/signup', [RegisterController::class, 'register']);


