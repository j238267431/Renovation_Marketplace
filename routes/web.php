<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\HomeController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/developers', [CompaniesController::class, 'index'])
    ->name('developers');

Route::get('/customers', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customers');
Route::get('/customers/{id}', [\App\Http\Controllers\CustomerController::class, 'view']);

Route::resource('tasks', \App\Http\Controllers\Customers\Task\TaskController::class);
Route::resource('companies.reviews', \App\Http\Controllers\FeedbackController::class)
->names([
  'create' => 'companies.reviews.create',
  'store' => 'companies.reviews.store',
  'index' => 'companies.reviews.index',
  'destroy' => 'companies.reviews.delete',
]);
