<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\VeloController;
use App\Http\Controllers\CategoryController;
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
Route::get('/page1',function(){
    return view('this is my first page');

});
Route::get('/page2/{name}',function($name){
    return '<h1> welcome.'.$name.'</h1>';

});
Route::get('/page3/{name}', function ($name) {
    return '<h1> welcome '.$name.' </h1>';
})->where ('name','[A-Za-z]+');

#Route::resource('velos','App\Http\Controllers\VeloController');
#Route::resource('category','App\Http\Controllers\CategoryController');
Route::resource('/velos', VeloController::class);
Route::resource('/category', CategoryController::class);

Route::get('/category/velos/{id}/create', [VeloController::class,'create']);

Route::get('/category/velos/{id}', [VeloController::class,'index']);
Route::get('/category/velos/{id}/edit', [VeloController::class,'edit']);
Route::get('/category/velos/{id}', [VeloController::class,'index']);