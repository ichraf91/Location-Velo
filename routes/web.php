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

//BaladeController Routes
Route::get('/balades', [BaladeController::class, 'index'])->name('balades.index');
Route::get('/balades/create', [BaladeController::class, 'create'])->name('balades.create');
Route::post('/balades', [BaladeController::class, 'store'])->name('balades.store');
Route::get('/balades/{id}', [BaladeController::class, 'show'])->name('balades.show');
Route::get('/balades/{id}/edit', [BaladeController::class, 'edit'])->name('balades.edit');
Route::put('/balades/{id}', [BaladeController::class, 'update'])->name('balades.update');
Route::delete('/balades/{id}', [BaladeController::class, 'destroy'])->name('balades.destroy');


//CategorieBaladeController Routes
Route::get('/categorie_balades', [CategorieBaladeController::class, 'index'])->name('categorie_balades.index');
Route::get('/categorie_balades/create', [CategorieBaladeController::class, 'create'])->name('categorie_balades.create');
Route::post('/categorie_balades', [CategorieBaladeController::class, 'store'])->name('categorie_balades.store');
Route::get('/categorie_balades/{id}', [CategorieBaladeController::class, 'show'])->name('categorie_balades.show');
Route::get('/categorie_balades/{id}/edit', [CategorieBaladeController::class, 'edit'])->name('categorie_balades.edit');
Route::put('/categorie_balades/{id}', [CategorieBaladeController::class, 'update'])->name('categorie_balades.update');
Route::delete('/categorie_balades/{id}', [CategorieBaladeController::class, 'destroy'])->name('categorie_balades.destroy');

