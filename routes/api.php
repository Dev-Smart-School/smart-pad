<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class,'signIn'])->name('auth.login');
Route::post('/register', [AuthController::class,'signUp'])->name('auth.register');
Route::post('/daftar', [DataController::class,'storeDaftar'])->name('data.storeDaftar');
Route::group(['middleware' => ['auth:sanctum']], function () {
   Route::get('/daftar', [DataController::class,'getDaftar'])->name('data.getDaftar');
   Route::get('/uudata', [DataController::class,'getUuData'])->name('data.getUuData');
   Route::post('/logout', [AuthController::class,'logout'])->name('auth.logout');
});
