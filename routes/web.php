<?php

use App\Http\Controllers\Backend\ModuleController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function (){
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::group(['prefix' => 'backend', 'as' => 'backend.'], function (){
        Route::resource('/module', ModuleController::class);
        Route::resource('/permission', PermissionController::class);
        Route::resource('/role', RoleController::class);
        Route::resource('/user', UserController::class);
    });
});


require __DIR__ . '/auth.php';
