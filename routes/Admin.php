<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin/dashboard')->name('admin.dashboard')->group(function () {
    Route::get('/', [DashBoardController::class, 'index'])->middleware('auth:admin');
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'login')->name('.login');
        Route::post('/login', 'checkLogin')->name('.check');
        Route::post('/logout', 'logout')->name('.logout');
    });
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'register')->name('.register');
        Route::post('/register', 'store')->name('.store');
    });
});

Route::prefix('admin/permission')->name('admin.permission.')
->controller(PermissionController::class)
->middleware('auth:admin')->group(function () {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/edit/{id}','edit')->name('edit');
    Route::post('/update/{id}','update')->name('update');
    Route::delete('/delete/{id}','delete')->name('delete');
});

Route::prefix('admin/role')->name('admin.role.')
->controller(RoleController::class)
->middleware('auth:admin')->group(function () {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/edit/{id}','edit')->name('edit');
    Route::post('/update/{id}','update')->name('update');
    Route::delete('/delete/{id}','delete')->name('delete');
});


Route::prefix('admin/user')->name('admin.user.')
->controller(UserController::class)
->middleware('auth:admin')->group(function () {
    Route::get('/index','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/edit/{id}','edit')->name('edit');
    Route::post('/update/{id}','update')->name('update');
    Route::delete('/delete/{id}','delete')->name('delete');

});
