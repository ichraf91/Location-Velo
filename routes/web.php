<?php

use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\CategorieReclamationController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
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
//
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [UsersController::class, 'login'])->name('users.login');

Route::resource('/events', EventsController::class);
Route::resource('/participations', ParticipationController::class);
Route::post('/participations/pdf/{eventId}/{userId}', [ParticipationController::class, 'generatePDF'])->name('participations.pdf');

Route::get('/login', [UsersController::class, 'login'])->name('users.login');
Route::post('/auth', [UsersController::class, 'auth'])->name('users.auth');
//Route::post('/logout', [UsersController::class, 'logout'])->name('users.logout');
Route::get('/logout', [UsersController::class, 'logout'])->name('users.logout');
Route::get('/register', [UsersController::class, 'create'])->name('users.register');
Route::post('/register', [UsersController::class, 'register'])->name('users.register');
Route::get('/user/{id}/profile', [UsersController::class, 'show'])->name('users.profile');

Route::resource('/categorie', CategorieReclamationController::class);

Route::resource('/reclamation', ReclamationController::class);