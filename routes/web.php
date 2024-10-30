<?php

use App\Http\Controllers\Backend\AuthController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;
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

/*Backend Routes*/
Route::get('dashboard/index',[DashboardController::class,'index'])->name('dashboard.index')->middleware('admin');

/*User*/
Route::group(['prefix' => 'user'], function(){
    Route::get('index',[UserController::class,'index'])->name('user.index')->middleware('admin');
    // Thêm nhân viên
    Route::get('create',[UserController::class,'create'])->name('user.create')->middleware('admin');
});

Route::get('admin',[AuthController::class,'index'])->name('auth.admin')->middleware(LoginMiddleware::class);
Route::get('logout',[AuthController::class,'logout'])->name('auth.logout');
Route::post('login',[AuthController::class,'login'])->name('auth.login');