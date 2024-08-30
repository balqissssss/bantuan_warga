<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\wargacontroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\bantuanController;
use App\Http\Controllers\LoginController;
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
    return view('dashboard',[
        "title"=>"Dashboard"
    ]);
});
route::resource('warga',wargacontroller::class)->middleware('auth');
Route::resource('pengguna',UserController::class)->except('destroy','create','show','update','edit')->middleware('auth');
Route::resource('bantuan', bantuanController::class)->middleware('auth');
Route::get('login',[LoginController::class,'loginView'])->name('login');
Route::post('login',[LoginController::class,'authenticate']);
Route::post('logout',[LoginController::class,'logout'])->middleware('auth');