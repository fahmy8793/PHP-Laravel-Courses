<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\coursesController;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('admin','admin');
Route::view('admin2','admin2');
Route::view('admin3','admin3');
Route::view('home','dashboard.home.index');
Route::view('admin','admin');

Route::resource('category', CategoryController::class);
//Route::resource('user', userController::class);


//Route::get('login', 'userController@index');
//Route::post('post-login', 'userController@postLogin');
//Route::get('registration', 'userController@registration');
//Route::post('post-registration', 'userController@postRegistration');
//Route::get('dashboard', 'userController@dashboard');
//Route::get('logout', 'userController@logout');
//
//Route::get('/login', UserController::class, 'index');
//Route::post('/post-login', UserController::class, 'postLogin');
//Route::get('/registration', UserController::class, 'registration');
//Route::post('/post-registration', UserController::class, 'postRegistration');
//Route::get('/dashboard', UserController::class, 'dashboard');
//Route::get('/logout', UserController::class, 'logout');
//
//

Route::resource('courses', coursesController::class);

//Route::resource('user', \App\Http\Controllers\userController::class);

//Route::resource('category', userController::class);

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

