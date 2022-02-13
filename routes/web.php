<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('index')->middleware('guest');
Route::get('/signUp',  [SignupController::class, 'index'])->middleware('guest');
Route::post('/signUp/signup',  [SignupController::class, 'signUp'])->middleware('guest');

Route::get('/login',  [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/login',  [LoginController::class, 'login']);

Route::get('/home', [HomeController::class, 'index'])->middleware('auth');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/ebook/{id}', [HomeController::class, 'ebook'])->middleware('auth');
Route::get('/rent/{id}/{ebook_id}', [HomeController::class, 'rent'])->middleware('auth');

Route::get('/cart/{id}', [HomeController::class, 'cart'])->middleware('auth');
Route::get('/deleteCart/{order_id}', [HomeController::class, 'deleteCart'])->middleware('auth');
Route::get('/submitCart/{id}', [HomeController::class, 'submitCart'])->middleware('auth');
Route::get('/success', [HomeController::class, 'success'])->middleware('auth');

Route::get('/profile/{id}',  [LoginController::class, 'profile'])->middleware('auth');
Route::post('/profile/edit',  [LoginController::class, 'edit'])->middleware('auth');


Route::get('/accountMaintenance',  [LoginController::class, 'accMain'])->middleware('admin');
Route::get('/updateRole/{id}',  [LoginController::class, 'updateRoleIndex'])->middleware('admin');
Route::post('/updateRole/update/{id}',  [LoginController::class, 'updateRole'])->middleware('admin');
Route::get('/delete/{id}',  [LoginController::class, 'deleteAccount'])->middleware('admin');
