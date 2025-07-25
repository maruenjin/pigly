<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisterStep2Controller;

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
Route::get('/register/step1', [RegisterController::class, 'create'])->name('register.step1');
Route::post('/register/step1', [RegisterController::class, 'store'])->name('register.store');
Route::get('/register/step2', [RegisterStep2Controller::class, 'create'])->name('register.step2')->middleware('auth');
Route::post('/register/step2', [RegisterStep2Controller::class, 'store'])->name('register.step2.store')->middleware('auth');
Route::get('/weight/create', function () {
    return view('weights.create');
});
Route::get('/weight_logs', function () {
    return '体重管理ページ（ここに一覧を作成予定）';
})->middleware('auth');
