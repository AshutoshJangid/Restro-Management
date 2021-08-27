<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[homeController::class,'index']);
Route::get('/redirect',[homeController::class,'redirects']);
Route::post('/addcart/{id}',[homeController::class,'addcart']);
Route::get('/showcart/{id}',[homeController::class,'showcart']);
Route::get('/removecart/{id}',[homeController::class,'removecart']);
Route::post('/order',[homeController::class,'order']);


Route::get('/users',[AdminController::class,'users']);
Route::get('/foodmenu',[AdminController::class,'foodmenu']);
Route::post('/uploadfood',[AdminController::class,'uploadfood']);
Route::get('/deleteuser/{id}',[AdminController::class,'deleteuser']);
Route::get('/deletefood/{id}',[AdminController::class,'deletefood']);
Route::get('/editfood/{id}',[AdminController::class,'editfood']);
Route::post('/updatefood/{id}',[AdminController::class,'updatefood']);
Route::post('/reservation',[AdminController::class,'reservation']);
Route::get('/adminreservation',[AdminController::class,'adminreservation']);
Route::get('/viewchef',[AdminController::class,'viewchef']);
Route::post('/addchef',[AdminController::class,'addchef']);
Route::get('/deletechef/{id}',[AdminController::class,'deletechef']);
Route::get('/editchef/{id}',[AdminController::class,'editchef']);
Route::post('/updatechef/{id}',[AdminController::class,'updatechef']);
Route::get('/showorders',[AdminController::class,'showorders']);
Route::get('/complete/{id}',[AdminController::class,'complete']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
