<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\InventarisController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
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

Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

Route::group([
    'middleware' => ['auth'],
    'namespace'  => 'App\Http\Controllers\admin',
    'prefix'     => '/',
], function () {
    // routeDahboard
    Route::get('/', [AdminController::class, 'index'])->name('home');
    
    // routeUser
    Route::resource('user', UserController::class)->only(['index', 'update', 'edit', 'store', 'destroy', 'create'])->names([
        'index' => 'user',
        'update'  => 'user.update',
        'edit' => 'user.edit',
        'store' => 'user.store',
        'destroy' => 'user.destroy',
        'create' => 'user.create'
    ]);
    // endRoute

    // routeInventaris
    Route::resource('inventaris', InventarisController::class)->only(['index', 'update', 'edit', 'store', 'destroy', 'create'])->names([
        'index' => 'inventaris'
    ]);
    // endRoute

    // routeCategory
    Route::resource('category', CategoryController::class)->only(['index', 'update', 'edit', 'store', 'destroy', 'create'])->names([
        'index' => 'category',
    ]);
    // endRoute
});