<?php

use App\Http\Controllers\user\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::get('user/profile',[ProfileController::class,'index'])->name('user.profile');
    Route::get('user/profile',[ProfileController::class,'show'])->name('show.profile');
    Route::get('user/Edit/{id}',[ProfileController::class,'edit'])->name('edit.profile');
    Route::post('user/Update/{id}',[ProfileController::class,'update'])->name('update.profile');
});

