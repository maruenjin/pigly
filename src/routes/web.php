<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register/step1', [RegisterController::class, 'create'])->name('register.step1');
Route::post('/register/step1', [RegisterController::class, 'store'])->name('register.store');
Route::get('/register/step2', function () {
    return view('auth.register-step2');
})->middleware('auth');
Route::get('/weight/create', function () {
    return view('weights.create');
});