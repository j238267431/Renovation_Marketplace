<?php

use App\Http\Controllers\Account\CompanyController as AccountCompanyController;
use App\Http\Controllers\Account\ExecutorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AttachmentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\OffersController;
use Laravel\Socialite\Facades\Socialite;


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
Route::middleware('auth')->resource('tasks', TaskController::class)
    ->only('create', 'store', 'update', 'destroy', 'edit');
Route::resource('tasks', TaskController::class)
    ->only('index', 'show');
Route::get('categories/{category:id}/tasks', [TaskController::class, 'allFromCategory'])
    ->name('categories.tasks');
// Route::middleware('auth')->resource('attachments', AttachmentController::class)
//     ->only('store', 'update', 'delete');


Route::resource('reviews', \App\Http\Controllers\ReviewController::class);

/***
 * Аттачи
 */
Route::get("/download/{attachment}", [\App\Http\Controllers\AttachmentController::class, "download"])
    ->name("attachment.download");
Route::middleware('auth')->prefix("attachment")->group(function () {
    Route::delete("/delete/{task}/{attachment}", [\App\Http\Controllers\AttachmentController::class, "delete"])
        ->name("attachment.delete");
});

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
    Route::get('/tasks/{task:id}/show', [\App\Http\Controllers\Account\TaskController::class, 'show'])
        ->name('tasks.show');
    Route::resource('companies', AccountCompanyController::class);
    Route::get(
        '/chat',
        [\App\Http\Controllers\Account\ChatsController::class, 'index']
    )->name('chat');
    Route::get('messages', [\App\Http\Controllers\Account\ChatsController::class, 'fetchMessages']);
    Route::post('messages', [\App\Http\Controllers\Account\ChatsController::class, 'sendMessage']);
    Route::get('confirm/{task:id}/{company:id}', [\App\Http\Controllers\Account\TaskController::class, 'confirmOffer'])
        ->name('confirm.task');
    Route::get('offer/destroy', [\App\Http\Controllers\Account\TaskController::class, 'deleteOffers'])
        ->name('offer.destroy');
    Route::get('/project', [\App\Http\Controllers\Account\OrderController::class, 'ordersFulfilling'])
        ->name('project');
    Route::get('/order/status', [\App\Http\Controllers\Account\OrderController::class, 'changeStatus']);
    Route::get('/order/confirm', [\App\Http\Controllers\Account\OrderController::class, 'orderConfirm']);
    Route::get('/responses', [\App\Http\Controllers\Account\ResponsesController::class, 'index'])
    ->name('responses');
});
Route::middleware('auth')->group(function () {
    Route::get('account/companies/offer/index', [OffersController::class, 'index'])->name('account.companies.offer.index');
    Route::get('account/companies/offer/create', [OffersController::class, 'create'])->name('account.companies.offer.create');
    Route::get('account/companies/offer/{offer:id}/edit', [OffersController::class, 'edit'])->name('account.companies.offer.edit');
    Route::delete('account/companies/offer/destroy', [OffersController::class, 'destroy'])->name('account.companies.offer.destroy');
    Route::post('account/companies/offer/store', [OffersController::class, 'store'])->name('account.companies.offer.store');
    Route::put('account/companies/offer/{offer:id}', [OffersController::class, 'update'])->name('account.companies.offer.update');
});

Route::middleware('auth')->group(function () {
    Route::middleware('created:{id}')->get('tasks/response/{task:id}/create', [TaskController::class, 'taskResponseCreate'])
        ->name('tasks.response.create');
    Route::post('tasks/response/{task:id}/store', [TaskController::class, 'taskResponseStore'])
        ->name('tasks.response.store');
    Route::get('tasks/response/{task:id}/edit', [TaskController::class, 'taskResponseEdit'])
        ->name('tasks.response.edit');
    Route::put('tasks/{task:id}/response/{response:id}', [TaskController::class, 'taskResponseUpdate'])
        ->name('tasks.response.update');
});



Route::group(['middleware' => 'guest'], function () {
    Route::group(['prefix' => 'login'], function () {
        Route::get('{service}', [SocialController::class, 'redirectToProvider'])->name('social.login');
        Route::get('{service}/callback', [SocialController::class, 'handleProviderCallback']);
    });
});
