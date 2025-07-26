<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisterStep2Controller;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\WeightTargetController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/weight_logs', [WeightLogController::class, 'index'])
    ->name('weight_logs.index')
    ->middleware('auth');
Route::get('/weight_logs/{id}/edit', [WeightLogController::class, 'edit'])
    ->name('weight_logs.edit')
    ->middleware('auth');
Route::post('/weight_logs/{id}/update', [WeightLogController::class, 'update'])
    ->name('weight_logs.update')
    ->middleware('auth');
Route::get('/weight_target/edit', [WeightTargetController::class, 'edit'])
    ->name('weight_target.edit')
    ->middleware('auth');

Route::post('/weight_target/update', [WeightTargetController::class, 'update'])
    ->name('weight_target.update')
    ->middleware('auth');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/weights', [WeightLogController::class, 'index'])
    ->name('weight.index')
    ->middleware('auth');

Route::get('/weight_logs/search', [App\Http\Controllers\WeightLogController::class, 'search'])
    ->name('weight_logs.search')
    ->middleware('auth');

Route::post('/weight_logs', [App\Http\Controllers\WeightLogController::class, 'store'])
    ->name('weight_logs.store')
    ->middleware('auth');

Route::post('/weight_logs/{id}/delete', [WeightLogController::class, 'destroy'])
    ->name('weight_logs.delete')
    ->middleware('auth');









