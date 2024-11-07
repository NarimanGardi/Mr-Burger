<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ThemeSettingController;


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

Route::redirect('/', 'login');

Route::group(['middleware' => ['auth', 'isActive']], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('clients', ClientController::class);
    // Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    // Route::get('/reports', [DashboardController::class, 'reports'])->name('reports');
    Route::get('/default-theme', [ThemeSettingController::class, 'defaultTheme'])->name('default-theme');
    Route::get('/dark-theme', [ThemeSettingController::class, 'darkTheme'])->name('dark-theme');
    Route::get('/light-theme', [ThemeSettingController::class, 'lightTheme'])->name('light-theme');
});
require __DIR__ . '/auth.php';
