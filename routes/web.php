<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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

Route::resource('companies', CompanyController::class)->only(['index', 'show']);

Route::resource('tasks', TaskController::class);
Route::get('categories/{category:id}/tasks', [TaskController::class, 'allFromCategory'])
  ->name('categories.tasks');

Route::resource('projects', ProjectController::class)->only(['index', 'show']);




Route::resource('companies.reviews', \App\Http\Controllers\ReviewController::class)
->names([
  'create' => 'companies.reviews.create',
  'store' => 'companies.reviews.store',
  'index' => 'companies.reviews.index',
  'destroy' => 'companies.reviews.delete',
]);

Route::get('account/customer', function (){
  return view('account.customer');
})->name('account.customer');

Route::get('account/customer/tasks', function (){
  return view('account.tasks');
})->name('account.tasks');

Route::get('account/customer/executor', function (){
  return view('account.executor');
})->name('account.executor');

Route::get('account/customer/orders', function (){
  return view('account.orders');
})->name('account.orders');
