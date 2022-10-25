<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\BaladeController;
use App\Http\Controllers\BaladeAdminController;
use App\Http\Controllers\CategorieBaladeController;


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
Route::get('/balades/{id}', [BaladeController::class, 'show'])->name('balades.show');

//BaladeAdminController Routes
Route::get('/baladesadmin', [BaladeAdminController::class, 'index'])->name('baladesadmin.index');
Route::get('/baladesadmin/{id}', [BaladeAdminController::class, 'show'])->name('baladesadmin.show');
Route::get('/baladesadmin/{id}/edit', [BaladeAdminController::class, 'edit'])->name('baladesadmin.edit');
Route::put('/baladesadmin/{id}', [BaladeAdminController::class, 'update'])->name('baladesadmin.update');
Route::get('/baladesadmin/create', [BaladeAdminController::class, 'create'])->name('baladesadmin.create');
Route::post('/baladesadmin', [BaladeAdminController::class, 'store'])->name('baladesadmin.store');
Route::delete('/baladesadmin/{id}', [BaladeAdminController::class, 'destroy'])->name('baladesadmin.destroy');

//CategorieBaladeController Routes
Route::get('/categorie_balades', [CategorieBaladeController::class, 'index'])->name('categorie_balades.index');
Route::get('/categorie_balades/create', [CategorieBaladeController::class, 'create'])->name('categorie_balades.create');
Route::post('/categorie_balades', [CategorieBaladeController::class, 'store'])->name('categorie_balades.store');
Route::get('/categorie_balades/{id}', [CategorieBaladeController::class, 'show'])->name('categorie_balades.show');
Route::get('/balades_by_categorie_balade/{id}', [CategorieBaladeController::class, 'findBaladesbyCategorieBaladeId'])->name('balades.show');
Route::get('/categorie_balades/{id}/edit', [CategorieBaladeController::class, 'edit'])->name('categorie_balades.edit');
Route::put('/categorie_balades/{id}', [CategorieBaladeController::class, 'update'])->name('categorie_balades.update');
Route::delete('/categorie_balades/{id}', [CategorieBaladeController::class, 'destroy'])->name('categorie_balades.destroy');

