<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\CompanyController as AccountCompanyController;

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

Route::middleware('auth')->resource('tasks', TaskController::class);
Route::middleware('auth')->resource('company', AccountCompanyController::class);

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

Route::middleware('auth')->prefix('account')->group(function(){
  Route::get('/', [\App\Http\Controllers\Account\AccountController::class, 'index']
  )->name('account');
  Route::get('/tasks', [\App\Http\Controllers\Account\TaskController::class, 'tasks']
  )->name('account.tasks');
  Route::get('/executor', [\App\Http\Controllers\Account\ExecutorController::class, 'companies'])
    ->name('account.executor');
  Route::get('/orders', [\App\Http\Controllers\Account\OrderController::class, 'orders']
  )->name('account.orders');
});
