<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'login'])->name('login.post');
Route::get('/', [AuthController::class, 'dashboard'])->name('index');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['user.auth']], function () {
    Route::prefix('/companies')->group(function ()
    {
        Route::controller(CompanyController::class)->group(function ()
        {
            Route::get('/', 'index')->name('company.index');
            Route::get('/edit/{company}', 'edit')->name('company.edit');
            Route::post('/update', 'update')->name('company.update');

            Route::get('/create', 'create')->name('company.create');
            Route::post('/store', 'store')->name('company.store');
        });
    });

    Route::prefix('/employees')->group(function ()
    {
        Route::controller(EmployeeController::class)->group(function ()
        {
            Route::get('/', 'index')->name('employee.index');
            Route::get('/edit/{employee}', 'edit')->name('employee.edit');
            Route::post('/update', 'update')->name('employee.update');

            Route::get('/create', 'create')->name('employee.create');
            Route::post('/store', 'store')->name('employee.store');
        });
    });
});

