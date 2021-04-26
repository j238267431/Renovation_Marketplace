<?php

use App\Http\Controllers\Account\CompanyController as AccountCompanyController;
use App\Http\Controllers\Account\ExecutorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\OffersController;

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

/**
 * Компании
 */
Route::resource('companies', CompanyController::class)->only(['index', 'show']);
Route::get('categories/{category:id}/companies', [CompanyController::class, 'allFromCategory'])
    ->name('categories.companies');
Route::prefix('companies')->name('companies.')->group(function () {

    Route::get('/active', [CompanyController::class, 'activeIndex'])
        ->name('active');
    Route::get('/{company:id}/projects', [ProjectController::class, 'showAllProjectsOfOneCompany'])
        ->name('companyProjects');
    Route::get('/{company:id}/reviews', [ReviewController::class, 'allFromCompany'])
        ->name('reviews');

});

/**
 * Проекты
 */
Route::resource('projects', ProjectController::class)->only(['index', 'show']);

/**
 * Заявки
 */
Route::resource('tasks', TaskController::class);
Route::get('categories/{category:id}/tasks', [TaskController::class, 'allFromCategory'])
    ->name('categories.tasks');


Route::resource('reviews', \App\Http\Controllers\ReviewController::class);


/**
 * Личный кабинет
 */
Route::prefix('account')->name('account.')->middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\Account\AccountController::class, 'index'])
        ->name('index');
    Route::get('/tasks', [\App\Http\Controllers\Account\TaskController::class, 'tasks'])
        ->name('tasks');
    Route::get('/executor', [ExecutorController::class, 'companies'])
        ->name('executor');
    Route::get('/orders', [\App\Http\Controllers\Account\OrderController::class, 'orders'])
        ->name('orders');
    Route::resource('companies', AccountCompanyController::class);
    });
Route::middleware('auth')->group(function (){
    Route::get('account/companies/offer/index', [OffersController::class, 'index'])->name('account.companies.offer.index');
    Route::get('account/companies/offer/create', [OffersController::class, 'create'])->name('account.companies.offer.create');
    Route::get('account/companies/offer/{offer:id}/edit', [OffersController::class, 'edit'])->name('account.companies.offer.edit');
    Route::delete('account/companies/offer/destroy', [OffersController::class, 'destroy'])->name('account.companies.offer.destroy');
    Route::post('account/companies/offer/store', [OffersController::class, 'store'])->name('account.companies.offer.store');
    Route::put('account/companies/offer/{offer:id}', [OffersController::class, 'update'])->name('account.companies.offer.update');
});
