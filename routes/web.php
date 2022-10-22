<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CommandController;

use Illuminate\Http\Resources\Json\ResourceCollection;

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

Route::get('/', [BikeController::class, 'index']);
Route::resource('/bikes', BikeController::class);
Route::resource('/commands', CommandController::class);
Route::get('/commands/{id}/create', [CommandController::class, 'create'])->name('command.create');

Route::get('/login', [UsersController::class, 'login'])->name('users.login');
Route::post('/auth', [UsersController::class, 'auth'])->name('users.auth');
Route::post('/logout', [UsersController::class, 'logout'])->name('users.logout');
Route::get('/register', [UsersController::class, 'create'])->name('users.register');
Route::post('/register', [UsersController::class, 'register'])->name('users.register');
Route::get('/user/{id}/profile', [UsersController::class, 'show'])->name('users.profile');
