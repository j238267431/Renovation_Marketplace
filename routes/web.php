<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();
    Route::get('/', function () {
        echo 'it works';
    });

Route::get('/developers', [\App\Http\Controllers\DevelopersController::class, 'index'])
    ->name('developers');

Route::get('/create', function (){
    return view('order.users.create');
});

Route::get('/customers', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customers');
Route::get('/customers/{id}', [\App\Http\Controllers\CustomerController::class, 'view']);
Route::resource('orders', \App\Http\Controllers\Customers\Orders\OrderController::class);
